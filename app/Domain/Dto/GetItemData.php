<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;

class GetItemData extends Data
{
    public function __construct(
        public ?array $properties = null,
        public int $per_page = 40,
        public int $page = 1,
    ) {}
}
