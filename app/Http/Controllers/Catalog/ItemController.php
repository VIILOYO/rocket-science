<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Item\GetItemsRequest;
use App\Http\Resources\Catalog\Item\ItemResource;
use App\Services\Catalog\ItemService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ItemController extends Controller
{
    public function __construct(
        private readonly ItemService $itemService
    ) {}

    public function list(GetItemsRequest $request): AnonymousResourceCollection
    {
        return ItemResource::collection(
            // ToDo Добавить DTO
            $this->itemService->getItems()
        );
    }
}
