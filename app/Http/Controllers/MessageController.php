<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public static function sendMessage(string $name, string $phone, string $mail): void
    {
        $data = [
            'phone' => $phone,
            'name' => $name,
            'mail' => $mail,
        ];
        Mail::to('timofeev@akwagarant.ru')->send(new \App\Mail\OrderMail($data));
    }

    public static function sendOrder(string $name, string $phone, string $mail, string $order): void
    {
        $data = [
            'phone' => $phone,
            'name' => $name,
            'mail' => $mail,
            'order' => $order,
        ];
        Mail::to('timofeev@akwagarant.ru')->send(new OrderMail($data));
    }
}
