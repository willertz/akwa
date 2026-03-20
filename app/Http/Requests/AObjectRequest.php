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
        ];
    }
}
