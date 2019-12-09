<?php

namespace Nickcheek\Brightree\Helpers;

class arrayHelper
{
    /**
     * @var array
     */
    protected array $arr;

    /**
     * @var array|null
     */
    protected ?array $sort;

    /**
     * @var array
     */
    protected array $pages;

    /**
     * @var array
     */
    protected array $search;

    /**
     * @var array
     */
    protected array $pageSize;

    /**
     * arrayHelper constructor.
     */
    public function __construct()
    {
        $this->pages = [];
        $this->pageSize = [];
        $this->sort = [];
    }

    /**
     * Search portion of the array
     *
     * @param $search
     * @return object
     */
    public function search($search): object
    {
        $this->search = $search;
        return $this;
    }

    /**
     * Sort Version.  If null we'll add "SortParams" but sometimes
     * it's supposed to be SortRequest so we have to allow that because
     * wtf brightree???
     *
     * @param null $sort
     * @return object
     */
    public function sort($sort=null): object
    {
        if($sort == null) {
            $this->sort = ['SortParams' => []];
            return $this;
        } else {
            $this->sort = $sort;
            return $this;
        }
    }

    /**
     * Builds out the array allowing for blank methods so
     * you don't have to chain things you don't need to.
     *
     * @return array
     */
    public function build(): array
    {
        $this->pages = $this->pages ?? ['page' => 1];
        $this->pageSize = $this->pageSize ?? ['pageSize' => 10];
        $this->sort = $this->sort ?? ['SortParams' => []];

        $this->arr = array_merge($this->search,$this->sort, $this->pages,$this->pageSize);
        return $this->arr;
    }

    /**
     * Get the pageSize you'd like, defaults to 10
     *
     * @param int $pageSize
     * @return object
     */
    public function pageSize($pageSize=10): object
    {
        $this->pageSize = ['pageSize' => $pageSize];
        return $this;
    }

    /**
     * Get the number of pages you want to return
     *
     * @param int $pages
     * @return object
     */
    public function pages($pages=1): object
    {
        $this->pages = ['page' => $pages];
        return $this;
    }
}
