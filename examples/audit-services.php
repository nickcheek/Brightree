<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nickcheek\Brightree\Service\BaseService;

function envOrNull(string $key): ?string
{
	$value = getenv($key);
	return $value === false || $value === '' ? null : $value;
}

function cliOptions(): array
{
	$options = getopt('', [
		'username:',
		'password:',
		'service::'
	]);

	return [
		'username' => $options['username'] ?? envOrNull('BRIGHTREE_USERNAME'),
		'password' => $options['password'] ?? envOrNull('BRIGHTREE_PASSWORD'),
		'service' => $options['service'] ?? null,
	];
}

function printUsage(): void
{
	echo "Usage:\n";
	echo "  php examples/audit-services.php --username=USER --password=PASS [--service=salesorder]\n\n";
	echo "Environment variables:\n";
	echo "  BRIGHTREE_USERNAME\n";
	echo "  BRIGHTREE_PASSWORD\n";
}

function baseContext(string $username, string $password)
{
	$auth = base64_encode($username . ':' . $password);

	return stream_context_create([
		'http' => [
			'method' => 'GET',
			'header' => "Authorization: Basic {$auth}\r\nUser-Agent: BrightreeServiceAudit/1.0\r\n",
			'ignore_errors' => true,
			'timeout' => 20,
		],
		'https' => [
			'method' => 'GET',
			'header' => "Authorization: Basic {$auth}\r\nUser-Agent: BrightreeServiceAudit/1.0\r\n",
			'ignore_errors' => true,
			'timeout' => 20,
		],
	]);
}

function fetchUrl(string $url, string $username, string $password): array
{
	$context = baseContext($username, $password);
	$body = @file_get_contents($url, false, $context);
	$headers = $http_response_header ?? [];
	$statusLine = $headers[0] ?? 'HTTP/0 000 Unknown';
	preg_match('/HTTP\/\S+\s+(\d+)/', $statusLine, $matches);
	$status = isset($matches[1]) ? (int) $matches[1] : 0;

	return [
		'url' => $url,
		'status' => $status,
		'status_line' => $statusLine,
		'headers' => $headers,
		'body' => is_string($body) ? $body : '',
	];
}

function looksLikeWsdl(string $body): bool
{
	$prefix = strtolower(substr(ltrim($body), 0, 512));
	return str_contains($prefix, 'wsdl:definitions') || str_contains($prefix, '<definitions') || str_contains($body, '<wsdl:definitions');
}

function findWorkingWsdl(string $serviceUrl, string $username, string $password): array
{
	$candidates = [
		$serviceUrl . '?singleWsdl',
		$serviceUrl . '?wsdl',
		$serviceUrl,
	];

	$attempts = [];

	foreach ($candidates as $candidate) {
		$result = fetchUrl($candidate, $username, $password);
		$attempts[] = [
			'url' => $candidate,
			'status' => $result['status'],
			'status_line' => $result['status_line'],
			'is_wsdl' => looksLikeWsdl($result['body']),
		];

		if ($result['status'] === 200 && looksLikeWsdl($result['body'])) {
			$result['attempts'] = $attempts;
			return $result;
		}
	}

	return [
		'url' => null,
		'status' => 0,
		'status_line' => 'No working WSDL candidate',
		'headers' => [],
		'body' => '',
		'attempts' => $attempts,
	];
}

function wsdlOperationsFromXml(string $xml): array
{
	$dom = new DOMDocument();
	$loaded = @$dom->loadXML($xml);
	if (!$loaded) {
		return [];
	}

	$xpath = new DOMXPath($dom);
	$xpath->registerNamespace('wsdl', 'http://schemas.xmlsoap.org/wsdl/');
	$names = [];

	foreach ($xpath->query('//wsdl:portType/wsdl:operation/@name | //wsdl:binding/wsdl:operation/@name') as $attribute) {
		$names[] = trim($attribute->nodeValue);
	}

	$names = array_values(array_unique(array_filter($names)));
	sort($names);

	return $names;
}

function serviceClasses(): array
{
	return [
		'document' => \Nickcheek\Brightree\Service\Document::class,
		'patient' => \Nickcheek\Brightree\Service\Patient::class,
		'documentation' => \Nickcheek\Brightree\Service\Documentation::class,
		'custom' => \Nickcheek\Brightree\Service\CustomField::class,
		'insurance' => \Nickcheek\Brightree\Service\Insurance::class,
		'reference' => \Nickcheek\Brightree\Service\Reference::class,
		'doctor' => \Nickcheek\Brightree\Service\Doctor::class,
		'inventory' => \Nickcheek\Brightree\Service\Inventory::class,
		'pickup' => \Nickcheek\Brightree\Service\Pickup::class,
		'salesorder' => \Nickcheek\Brightree\Service\SalesOrder::class,
		'invoice' => \Nickcheek\Brightree\Service\Invoice::class,
		'security' => \Nickcheek\Brightree\Service\Security::class,
		'pricing' => \Nickcheek\Brightree\Service\Pricing::class,
	];
}

function wrapperMethods(string $serviceClass): array
{
	$dummyInfo = (object) [
		'username' => 'audit-user',
		'password' => 'audit-pass',
		'config' => require __DIR__ . '/../src/Config/config.php',
	];

	$service = new $serviceClass($dummyInfo);
	$reflection = new ReflectionClass($serviceClass);
	$methods = [];

	foreach (['methods', 'specialMethods'] as $propertyName) {
		$property = $reflection->getProperty($propertyName);
		$property->setAccessible(true);
		$methods = array_merge($methods, array_keys($property->getValue($service)));
	}

	foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
		if ($method->getDeclaringClass()->getName() !== $serviceClass) {
			continue;
		}
		if ($method->isConstructor() || $method->isDestructor() || $method->isStatic()) {
			continue;
		}

		$methods[] = $method->getName();
	}

	$methods = array_values(array_unique(array_filter($methods, function (string $name) {
		return $name !== '__call';
	})));
	sort($methods);

	return $methods;
}

function compareMethods(array $wrapperMethods, array $wsdlMethods): array
{
	$wrapperSet = array_fill_keys($wrapperMethods, true);
	$wsdlSet = array_fill_keys($wsdlMethods, true);

	$missingInWsdl = array_values(array_diff(array_keys($wrapperSet), array_keys($wsdlSet)));
	$missingInWrapper = array_values(array_diff(array_keys($wsdlSet), array_keys($wrapperSet)));
	sort($missingInWsdl);
	sort($missingInWrapper);

	return [
		'missing_in_wsdl' => $missingInWsdl,
		'missing_in_wrapper' => $missingInWrapper,
	];
}

$options = cliOptions();

if ($options['username'] === null || $options['password'] === null) {
	printUsage();
	exit(1);
}

$config = require __DIR__ . '/../src/Config/config.php';
$serviceMap = serviceClasses();
$filter = $options['service'] !== null ? strtolower((string) $options['service']) : null;
$summary = [];

foreach ($config->service as $serviceName => $serviceUrl) {
	if ($filter !== null && $filter !== $serviceName) {
		continue;
	}

	$serviceClass = $serviceMap[$serviceName] ?? null;
	echo "=== {$serviceName} ===\n";
	echo "Configured URL: {$serviceUrl}\n";

	if ($serviceClass === null) {
		echo "No matching PHP service class found.\n\n";
		$summary[$serviceName] = ['status' => 'no-class'];
		continue;
	}

	$wsdl = findWorkingWsdl($serviceUrl, $options['username'], $options['password']);
	foreach ($wsdl['attempts'] as $attempt) {
		$flag = $attempt['is_wsdl'] ? 'WSDL' : 'not-wsdl';
		echo "Attempt: {$attempt['url']} -> {$attempt['status_line']} [{$flag}]\n";
	}

	if ($wsdl['url'] === null) {
		echo "Result: no working WSDL found\n\n";
		$summary[$serviceName] = ['status' => 'no-wsdl'];
		continue;
	}

	$liveOperations = wsdlOperationsFromXml($wsdl['body']);
	$wrapperOps = wrapperMethods($serviceClass);
	$diff = compareMethods($wrapperOps, $liveOperations);

	echo "Working WSDL: {$wsdl['url']}\n";
	echo "Live operations: " . count($liveOperations) . "\n";
	echo "Wrapper methods: " . count($wrapperOps) . "\n";

	if ($diff['missing_in_wsdl'] === [] && $diff['missing_in_wrapper'] === []) {
		echo "Method comparison: aligned\n\n";
		$summary[$serviceName] = ['status' => 'aligned'];
		continue;
	}

	if ($diff['missing_in_wsdl'] !== []) {
		echo "Methods in wrapper but not in WSDL:\n";
		foreach ($diff['missing_in_wsdl'] as $name) {
			echo "  - {$name}\n";
		}
	}

	if ($diff['missing_in_wrapper'] !== []) {
		echo "Methods in WSDL but not in wrapper:\n";
		foreach ($diff['missing_in_wrapper'] as $name) {
			echo "  - {$name}\n";
		}
	}

	echo "\n";
	$summary[$serviceName] = [
		'status' => 'mismatch',
		'missing_in_wsdl' => count($diff['missing_in_wsdl']),
		'missing_in_wrapper' => count($diff['missing_in_wrapper']),
	];
}

echo "=== summary ===\n";
foreach ($summary as $serviceName => $result) {
	echo "{$serviceName}: {$result['status']}\n";
}
