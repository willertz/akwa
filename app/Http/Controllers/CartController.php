<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function sendCart(Request $request) {
        $name = $request->name;
        $phone = $request->phone;
        $mail = $request->mail;
        $items = $request->items;
        $order = "";
        foreach($items as $item) {
            $order .= '<a href="https://akwagarant.ru/goods/' . $item['id'] . '/">' . $item['name'] . '</a><br>';
        }
        MessageController::sendOrder($name, $phone,$mail,$order);

    }

}
