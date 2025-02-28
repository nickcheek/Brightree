<?php

namespace Nickcheek\Brightree\Exceptions;

class BrightreeException extends \Exception
{
	protected $errorData;
	protected $requestData;

	public function __construct(string $message, int $code = 0, \Throwable $previous = null, $errorData = null, $requestData = null)
	{
		parent::__construct($message, $code, $previous);
		$this->errorData = $errorData;
		$this->requestData = $requestData;
	}

	public function getErrorData()
	{
		return $this->errorData;
	}

	public function getRequestData()
	{
		return $this->requestData;
	}

	public static function fromSoapFault(\SoapFault $fault, $requestData = null): self
	{
		return new self(
			$fault->getMessage(),
			$fault->getCode(),
			$fault,
			$fault->detail ?? null,
			$requestData
		);
	}

	public static function fromApiResponse($response, $requestData = null): self
	{
		$message = 'API Error';
		$code = 0;

		if (is_object($response) && isset($response->Error)) {
			$message = $response->Error->Message ?? 'Unknown API error';
			$code = $response->Error->Code ?? 0;
		}

		return new self($message, $code, null, $response, $requestData);
	}

	public static function configError(string $message): self
	{
		return new self('Configuration Error: ' . $message, 1000);
	}

	public static function authError(string $message = 'Authentication failed'): self
	{
		return new self('Authentication Error: ' . $message, 1001);
	}

	public static function paramError(string $method, string $param): self
	{
		return new self("Parameter Error: Required parameter '$param' missing for method '$method'", 1002);
	}
}