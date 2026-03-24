<?php

namespace Nickcheek\Brightree\Search;

use Nickcheek\Brightree\Exceptions\BrightreeException;
use Nickcheek\Brightree\Service\BaseService;

abstract class AbstractSearchBuilder
{
	protected BaseService $service;
	protected string $operation;
	protected array $searchRequest = [];
	protected array $sortRequest = [];
	protected int $pageSize = 10;
	protected int $page = 1;
	protected string $searchKey = 'searchRequest';
	protected string $sortKey = 'sortRequest';

	public function __construct(BaseService $service, string $operation)
	{
		$this->service = $service;
		$this->operation = $operation;
	}

	public function where(string $field, $value): self
	{
		$field = $this->resolveFieldName($field);
		$this->searchRequest[$field] = $this->normalizeFieldValue($field, $value);

		return $this;
	}

	public function whereMany(array $criteria): self
	{
		foreach ($criteria as $field => $value) {
			$this->where((string) $field, $value);
		}

		return $this;
	}

	public function sortBy(string $field, string $order = 'Ascending'): self
	{
		$this->sortRequest[] = [
			'SortField' => $field,
			'SortOrder' => $order
		];

		return $this;
	}

	public function pageSize(int $pageSize): self
	{
		if ($pageSize <= 0) {
			throw new BrightreeException('PageSize must be greater than 0', 1003);
		}

		$this->pageSize = $pageSize;

		return $this;
	}

	public function page(int $page): self
	{
		if ($page <= 0) {
			throw new BrightreeException('Page must be greater than 0', 1003);
		}

		$this->page = $page;

		return $this;
	}

	public function get(): object
	{
		try {
			return $this->service->apiCall($this->operation, $this->toArray());
		} catch (BrightreeException $e) {
			throw $e;
		} catch (\SoapFault $e) {
			throw BrightreeException::fromSoapFault($e, [
				'method' => $this->operation,
				'payload' => $this->toArray()
			]);
		} catch (\Throwable $e) {
			throw new BrightreeException("Error executing {$this->operation}: " . $e->getMessage(), 0, $e);
		}
	}

	public function __invoke(): object
	{
		return $this->get();
	}

	public function toArray(): array
	{
		return [
			$this->searchKey => $this->searchRequest,
			$this->sortKey => $this->sortRequest,
			'pageSize' => $this->pageSize,
			'page' => $this->page
		];
	}

	protected function resolveFieldName(string $field): string
	{
		$aliases = $this->fieldAliases();
		$key = strtolower($field);

		return $aliases[$key] ?? $field;
	}

	protected function normalizeFieldValue(string $field, $value)
	{
		return $value;
	}

	protected function lookup(?int $id = null, ?string $value = null): array
	{
		if ($id === null && ($value === null || trim($value) === '')) {
			throw new BrightreeException('Lookup requires an ID or Value', 1003);
		}

		return [
			'ID' => $id,
			'Value' => $value !== null ? trim($value) : null
		];
	}

	protected function fieldAliases(): array
	{
		return [];
	}
}
