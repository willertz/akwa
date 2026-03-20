<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function sendCart(CartRequest $request): void
    {
        $name = $request->validated('name');
        $phone = $request->validated('phone');
        $mail = $request->validated('mail');
        $items = $request->validated('items');
        $order = '';
        foreach ($items as $item) {
            $order .= '<a href="https://akwagarant.ru/goods/'.$item['id'].'/">'.$item['name'].'</a><br>';
        }
        MessageController::sendOrder($name, $phone, $mail, $order);

    }
}
