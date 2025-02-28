<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Brightree;
use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

class Document extends Brightree
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;

	protected array $methods = [
		'DocumentTypesFetchAll' => [],
		'DocumentBatchCreate' => true,
		'DocumentBatchSearch' => true,
		'DocumentPropertyUpdate' => true,
		'DocumentReviewUpdate' => true,
		'DocumentSearch' => true,
		'GenerateDocumentID' => true,
		'StoreDocument' => true
	];

	protected array $specialMethods = [
		'FetchDocumentContent' => ['documentKey']
	];

	public function __construct(object $info)
	{
		$this->info = $info;
		parent::__construct($this->info->username ?? '', $this->info->password ?? '');

		try {
			if (!isset($this->info->config->service['document'])) {
				throw BrightreeException::configError('Document service URL not configured');
			}

			$this->wsdl = $this->info->config->service['document'] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service['document'],
				'location' => $this->info->config->service['document'],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize Document service: ' . $e->getMessage(), 0, $e);
		}
	}

	public function __call(string $name, array $arguments): object
	{
		try {
			if (isset($this->methods[$name])) {
				$params = $this->methods[$name] === true ? ($arguments[0] ?? []) : [];

				if ($this->methods[$name] === true && !is_iterable($params)) {
					throw new BrightreeException(sprintf("Method %s requires an iterable parameter", $name), 1002);
				}

				return $this->apiCall($name, $params);
			}

			if (isset($this->specialMethods[$name])) {
				$params = [];
				foreach ($this->specialMethods[$name] as $index => $paramName) {
					if (!isset($arguments[$index]) && $paramName !== 'documentKey') {
						throw BrightreeException::paramError($name, $paramName);
					}
					$params[$paramName] = $arguments[$index] ?? null;
				}
				return $this->apiCall($name, $params);
			}

			throw new \BadMethodCallException("Method $name does not exist");
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => $name, 'params' => $params ?? $arguments]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error calling $name: " . $e->getMessage(), 0, $e);
		}
	}

	public function FetchDocumentContent(int $key = 12345): object
	{
		try {
			if ($key <= 0) {
				throw new BrightreeException("Invalid document key: $key", 1003);
			}
			return $this->apiCall('FetchDocumentContent', ['documentKey' => $key]);
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, ['method' => 'FetchDocumentContent', 'key' => $key]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error fetching document content: " . $e->getMessage(), 0, $e);
		}
	}
}