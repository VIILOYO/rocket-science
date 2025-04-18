<?php

namespace App\Services\Catalog;

use App\Services\Repositories\Catalog\ItemRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemService
{
    public function __construct(
        private readonly ItemRepository $itemRepository
    ){}

    public function getItems(): LengthAwarePaginator
    {
        return $this->itemRepository->getItems();
    }
}
