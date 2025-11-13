<?php

namespace Nickcheek\Brightree\Service;

use Nickcheek\Brightree\Traits\ApiCall;
use Nickcheek\Brightree\Traits\Custom;
use Nickcheek\Brightree\Exceptions\BrightreeException;

abstract class

BaseService
{
	use ApiCall;
	use Custom;

	public object $info;
	protected string $wsdl;
	protected array $options;
	protected array $methods = [];
	protected array $specialMethods = [];

	public function __construct(object $info)
	{
		$this->info = $info;

		try {
			$serviceName = $this->getServiceName();

			if (!isset($this->info->config->service[$serviceName])) {
				throw BrightreeException::configError(ucfirst($serviceName) . ' service URL not configured');
			}

			$this->wsdl = $this->info->config->service[$serviceName] . '?singleWsdl';
			$this->options = [
				'login' => $this->info->username ?? '',
				'password' => $this->info->password ?? '',
				'uri' => $this->info->config->service[$serviceName],
				'location' => $this->info->config->service[$serviceName],
				'trace' => 1
			];

			if (empty($this->options['login']) || empty($this->options['password'])) {
				throw BrightreeException::authError('Authentication credentials not provided');
			}
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\Throwable $e) {
			throw new BrightreeException('Failed to initialize ' . ucfirst($this->getServiceName()) . ' service: ' . $e->getMessage(), 0, $e);
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
					if (!isset($arguments[$index])) {
						throw BrightreeException::paramError($name, $paramName);
					}
					$params[$paramName] = $arguments[$index];
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

	protected function getServiceName(): string
	{
		$reflection = new \ReflectionClass($this);
		$className = $reflection->getShortName();

		// Handle PHPUnit mock objects (e.g., Mock_Doctor_abc123 -> doctor)
		if (strpos($className, 'Mock_') === 0) {
			$parentClass = $reflection->getParentClass();
			if ($parentClass) {
				$className = $parentClass->getShortName();
			}
		}

		return strtolower($className);
	}
}