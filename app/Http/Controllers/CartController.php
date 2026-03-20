<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    public function __construct(private readonly NotificationService $notificationService) {}

    public function sendCart(CartRequest $cartRequest): JsonResponse
    {
        $this->notificationService->sendOrderNotification(
            $cartRequest->validated('name'),
            $cartRequest->validated('phone'),
            $cartRequest->validated('mail'),
            $cartRequest->validated('items')
        );

        return response()->json(['status' => 'success']);
    }
}
