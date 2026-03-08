<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public static function sendMessage($name,$phone,$mail) {
        $data = [
            'phone' => $phone,
            'name' => $name,
            'mail' => $mail,
        ];
        Mail::send(['html' => 'mail'], $data, function($message)
        {
            $message->to('timofeev@akwagarant.ru', 'Аквагарант')->subject('Новая заявка на сайте Аквагарант!');
            $message->from('admin@vipseptic.ru','Support Akwagarant');
        });
    }

    public static function sendOrder($name,$phone, $mail,$order) {
        $data = [
            'phone' => $phone,
            'name' => $name,
            'mail' => $mail,
            'order' => $order
        ];
        Mail::send(['html' => 'order'], $data, function($message)
        {
            $message->to('timofeev@akwagarant.ru', 'Аквагарант')->subject('Новый заказ на сайте Аквагарант!');
            $message->from('rsitnikov75@gmail.com','Support Akwagarant');
        });
    }
}
