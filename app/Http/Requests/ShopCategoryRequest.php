<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'sometimes|required|integer|exists:shop_categories,id',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'preview' => 'nullable|string',
            'description' => 'nullable|string',
            'parent_id' => 'sometimes|required|integer',
            'papent_id' => 'sometimes|integer', // Исправляем опечатку в запросе если она есть
            'priority' => 'nullable|integer',
            'slug' => 'nullable|string|max:255',
        ];
    }
}
