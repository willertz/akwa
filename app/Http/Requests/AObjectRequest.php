<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AObjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'sometimes|required|integer|exists:a_objects,id',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'preview_pict' => 'nullable|string',
            'description' => 'nullable|string',
            'slider' => 'sometimes|array',
            'content' => 'nullable|string',
            'floors' => 'nullable|integer',
            'price_per_sqm' => 'nullable|integer',
            'area' => 'nullable|integer',
            'detail_description' => 'nullable|string',
            'left_image' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*.number' => 'nullable|string',
            'features.*.title' => 'nullable|string',
            'features.*.description' => 'nullable|string',
            'big_description' => 'nullable|string',
        ];
    }
}
