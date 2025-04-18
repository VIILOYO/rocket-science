<?php

namespace App\Services\Catalog;

use App\Domain\Dto\GetItemData;
use App\Repositories\Catalog\ItemRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemService
{
    public function __construct(
        private readonly ItemRepository $itemRepository
    ) {}

    public function getItems(GetItemData $data): LengthAwarePaginator
    {
        return $this->itemRepository->getItems($data);
    }
}
