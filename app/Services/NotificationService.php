<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    private const string RECIPIENT = 'timofeev@akwagarant.ru';

    public function sendContactMessage(string $name, string $phone, string $mail): void
    {
        $data = [
            'name' => $name,
            'phone' => $phone,
            'mail' => $mail,
        ];

        Mail::to(self::RECIPIENT)->send(new OrderMail($data));
    }

    public function sendOrderNotification(string $name, string $phone, string $mail, array $items): void
    {
        $orderHtml = $this->formatOrderItems($items);

        $data = [
            'name' => $name,
            'phone' => $phone,
            'mail' => $mail,
            'order' => $orderHtml,
        ];

        Mail::to(self::RECIPIENT)->send(new OrderMail($data));
    }

    private function formatOrderItems(array $items): string
    {
        $orderHtml = '';
        foreach ($items as $item) {
            $url = url('/goods/'.($item['id'] ?? ''));
            $name = $item['name'] ?? 'Unknown Item';
            $orderHtml .= "<a href=\"{$url}\">{$name}</a><br>";
        }

        return $orderHtml;
    }
}
