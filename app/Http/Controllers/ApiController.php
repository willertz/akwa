<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ApiController extends Controller
{
    public function __construct(private readonly NotificationService $notificationService) {}

    /**
     * @deprecated Используйте именованные маршруты API.
     */
    public function sendMessage(MessageRequest $messageRequest): RedirectResponse|JsonResponse
    {
        $name = (string) ($messageRequest->validated('name') ?: 'Не указано');
        $phone = (string) ($messageRequest->validated('phone') ?: 'Не указано');
        $mail = (string) ($messageRequest->validated('mail') ?: 'Не указано');

        $this->notificationService->sendContactMessage($name, $phone, $mail);

        if ($messageRequest->expectsJson()) {
            return response()->json(['status' => 'success']);
        }

        return redirect('/');
    }
}
