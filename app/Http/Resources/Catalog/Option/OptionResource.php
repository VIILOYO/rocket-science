<?php

namespace App\Http\Resources\Catalog\Option;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Option
 */
class OptionResource extends JsonResource
{
    /**
     * @param Request $request
     * @return string[]
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'value' => $this->value,
        ];
    }
}
