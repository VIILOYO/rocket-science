<?php

namespace App\Repositories\Catalog;

use App\Domain\Dto\GetItemData;
use App\Filters\ItemFilter;
use App\Models\Item;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemRepository extends BaseRepository
{
    public function model(): string
    {
        return Item::class;
    }

    public function getItems(GetItemData $data): LengthAwarePaginator
    {
        $builder = $this->filter(ItemFilter::class, $data->toArray());

        return $builder->with('options')
            ->orderBy('created_at', 'desc')
            ->paginate($data->per_page);
    }
}
