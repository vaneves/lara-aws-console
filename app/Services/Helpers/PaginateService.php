<?php 

namespace App\Services\Helpers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginateService
{
    public function __construct(
        private readonly Request $request
    ) {}

    public function execute(array $allItems, int $pageSize, ?callable $formatItem = null): LengthAwarePaginator
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $take = ($currentPage - 1) * $pageSize;
        $paginatedItems = $this->applyFormatInItems(
            array_slice($allItems, $take, $pageSize),
            $formatItem
        );
        $paginator = new LengthAwarePaginator(
            items: $paginatedItems,
            total: count($allItems),
            perPage: $pageSize,
            currentPage: $currentPage,
            options: ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        
        return $paginator
            ->onEachSide(0)
            ->appends($this->request->query());
    }

    private function applyFormatInItems(array $paginatedItems, ?callable $formatItem = null): array 
    {
        if (! $formatItem) {
            return $paginatedItems;
        }

        return array_map($formatItem, $paginatedItems);
    }
}