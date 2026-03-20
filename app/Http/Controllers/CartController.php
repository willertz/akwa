<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function sendCart(CartRequest $cartRequest): void
    {
        $name = $cartRequest->validated('name');
        $phone = $cartRequest->validated('phone');
        $mail = $cartRequest->validated('mail');
        $items = $cartRequest->validated('items');
        $order = '';
        foreach ($items as $item) {
            $order .= '<a href="https://akwagarant.ru/goods/'.$item['id'].'/">'.$item['name'].'</a><br>';
        }
        MessageController::sendOrder($name, $phone, $mail, $order);

    }
}
