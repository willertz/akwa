<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'note' => 'nullable|string|max:1000',
            'delivery' => 'required|string|max:100',
            'consent' => 'accepted',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|integer',
            'items.*.name' => 'required|string',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.count' => 'required|integer|min:1',
            'website' => 'prohibited',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Укажите ваше ФИО.',
            'phone.required' => 'Укажите номер телефона.',
            'email.required' => 'Укажите адрес электронной почты.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'delivery.required' => 'Выберите способ доставки.',
            'consent.accepted' => 'Необходимо дать согласие на обработку персональных данных.',
            'items.required' => 'Корзина пуста.',
            'items.min' => 'Корзина пуста.',
        ];
    }
}
