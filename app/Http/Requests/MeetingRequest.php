<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'page' => 'nullable|string|max:500',
            'website' => 'prohibited',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Укажите ваше имя.',
            'phone.required' => 'Укажите номер телефона.',
            'website.prohibited' => 'Ошибка отправки формы.',
        ];
    }
}
