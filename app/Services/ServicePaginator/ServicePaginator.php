<?php

namespace App\Services\ServicePaginator;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ServicePaginator
{
    private $perPage;
    private $pages;
    private $option;

    public function __construct($perPage, $pages, $option)
    {
        $this->perPage = $perPage;
        $this->pages = $pages;
        $this->option = $option;
    }

    public function paginate($item)
    {
        $page = $this->pages ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $item instanceof Collection ? $item : Collection::make($item);

        return new LengthAwarePaginator(
            $items->forPage($page, $this->perPage),
            $items->count(),
            $this->perPage,
            $page,
            $this->option
        );
    }
}
