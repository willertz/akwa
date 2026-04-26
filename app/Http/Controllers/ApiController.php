<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Http\Requests\MessageRequest;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ApiController extends Controller
{
    public function __construct(private readonly NotificationService $notificationService) {}

    /**
     * Форма "Получить консультацию"
     */
    public function sendMessage(MessageRequest $messageRequest): RedirectResponse|JsonResponse
    {
        $name = (string) ($messageRequest->validated('name') ?: 'Не указано');
        $phone = (string) ($messageRequest->validated('phone') ?: 'Не указано');
        $mail = (string) ($messageRequest->validated('mail') ?: 'Не указано');
        $method = (string) ($messageRequest->validated('method') ?: '');

        $this->notificationService->sendConsultationNotification([
            'name' => $name,
            'phone' => $phone,
            'email' => $mail,
            'method' => $method,
        ]);

        if ($messageRequest->expectsJson()) {
            return response()->json(['status' => 'success']);
        }

        return redirect('/');
    }

    /**
     * Форма "Запишитесь на встречу с нами"
     */
    public function sendMeeting(MeetingRequest $meetingRequest): JsonResponse
    {
        $this->notificationService->sendMeetingNotification([
            'name' => $meetingRequest->validated('name'),
            'phone' => $meetingRequest->validated('phone'),
            'page' => $meetingRequest->validated('page') ?? '',
        ]);

        return response()->json(['status' => 'success']);
    }
}
