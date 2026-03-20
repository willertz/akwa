<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'sometimes|required|integer|exists:items,id',
            'art' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'nullable|string|max:255',
            'priority' => 'nullable|integer',
            'price_usd' => 'nullable|string|max:255',
            'price_eur' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'cat_url' => 'nullable|string',
            'majorId' => 'nullable|integer',
            'parent_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            'preview' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'unit' => 'nullable|string|max:50',
        ];
    }
}
