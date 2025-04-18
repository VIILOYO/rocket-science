<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Option;
use Illuminate\Database\Seeder;

class ItemWithOptionsSeeder extends Seeder
{
    public function run(): void
    {
        foreach (__('items') as $item) {
            /** @var Item $dbItem */
            $dbItem = Item::query()->create([
                'title' => $item['title'],
                'price' => $item['price'],
                'amount' => $item['amount'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $options = array_map(function (array $option) use ($dbItem) {
                $option['item_id'] = $dbItem->id;

                return $option;
            }, $item['options']);
            Option::query()->insert($options);
        }
    }
}
