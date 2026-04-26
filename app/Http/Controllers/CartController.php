<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function __construct(private readonly NotificationService $notificationService) {}

    public function sendCart(CartRequest $cartRequest): JsonResponse
    {
        $validated = $cartRequest->validated();

        $total = 0;
        foreach ($validated['items'] as $item) {
            $total += $item['price'] * $item['count'];
        }

        $deliveryPrice = str_contains($validated['delivery'], '500') ? 500 : 0;
        $total += $deliveryPrice;

        $data = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'city' => $validated['city'] ?? '',
            'address' => $validated['address'] ?? '',
            'note' => $validated['note'] ?? '',
            'delivery' => $validated['delivery'],
            'items' => $validated['items'],
            'total' => $total,
        ];

        try {
            $this->notificationService->sendOrderNotification($data);
        } catch (\Throwable $e) {
            Log::error('Order notification failed: '.$e->getMessage(), ['data' => $data]);
        }

        Log::info('New order received', $data);

        return response()->json(['status' => 'success']);
    }
}
