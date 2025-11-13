<?php

namespace Nickcheek\Brightree\Helpers;

class ArrayHelper
{
	private array $search = [];
	private array $sort = [];
	private array $pages = ['page' => 1];
	private array $pageSize = ['pageSize' => 10];

	public function search(array $search): self
	{
		$this->search = $search;
		return $this;
	}

	public function sort(?array $sort = null): self
	{
		$this->sort = $sort ?? ['SortParams' => []];
		return $this;
	}

	public function pageSize(int $pageSize = 10): self
	{
		$this->pageSize = ['pageSize' => $pageSize];
		return $this;
	}

	public function pages(int $pages = 1): self
	{
		$this->pages = ['page' => $pages];
		return $this;
	}

	public function build(): array
	{
		// Ensure sort always has SortParams if not explicitly set
		if (empty($this->sort)) {
			$this->sort = ['SortParams' => []];
		}

		return array_merge(
			$this->search,
			$this->sort,
			$this->pages,
			$this->pageSize
		);
	}
}