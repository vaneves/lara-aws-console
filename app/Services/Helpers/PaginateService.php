<?php 

namespace App\Services\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginateService
{
    public function execute(array $allItems, int $pageSize, ?callable $formatItem = null): LengthAwarePaginator
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $take = ($currentPage - 1) * $pageSize;
        $paginatedItems = $this->applyFormatInItems(
            array_slice($allItems, $take, $pageSize),
            $formatItem
        );

        return new LengthAwarePaginator(
            items: $paginatedItems,
            total: count($allItems),
            perPage: $pageSize,
            currentPage: $currentPage,
            options: ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    private function applyFormatInItems(array $paginatedItems, ?callable $formatItem = null): array 
    {
        if (! $formatItem) {
            return $paginatedItems;
        }

        return array_map($formatItem, $paginatedItems);
    }
}