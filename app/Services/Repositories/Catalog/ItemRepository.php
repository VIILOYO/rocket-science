<?php

namespace App\Services\Repositories\Catalog;

use App\Models\Item;
use App\Services\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemRepository extends BaseRepository
{
    public function model(): string
    {
        return Item::class;
    }

    public function getItems(): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->with('options')
            ->paginate(40);
    }
}
