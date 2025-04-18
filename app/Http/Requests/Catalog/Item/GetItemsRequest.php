<?php

namespace App\Http\Requests\Catalog\Item;

use Illuminate\Foundation\Http\FormRequest;

class GetItemsRequest extends FormRequest
{
    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
