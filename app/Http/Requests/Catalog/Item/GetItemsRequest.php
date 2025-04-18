<?php

namespace App\Http\Requests\Catalog\Item;

use Illuminate\Foundation\Http\FormRequest;

class GetItemsRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'page' => 'sometimes|int|min:1',
            'per_page' => 'sometimes|int|min:1',
            'properties' => 'sometimes|array',
            'properties.*' => 'required_with:options|array'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
