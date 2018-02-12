<?php

namespace App\Services\ServicePaginator;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ServicePaginator
{
    private $items;
    private $perPage;
    private $pages;
    private $option;

    public function __construct($items, $perPage, $pages, $option)
    {
        $this->items = $items;
        $this->perPage = $perPage;
        $this->pages = $pages;
        $this->option = $option;
    }

    public function paginate()
    {
        $page = $this->pages ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $this->items instanceof Collection ? $this->items : Collection::make($this->items);

        return new LengthAwarePaginator(
            $items->forPage($page, $this->perPage),
            $items->count(),
            $this->perPage,
            $page,
            $this->option
        );
    }
}
