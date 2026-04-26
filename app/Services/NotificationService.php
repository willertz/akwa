<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\ConsultationMail;
use App\Mail\MeetingMail;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    private function getManagerEmail(): string
    {
        return (string) config('mail.manager_email', 'manager@akwagarant.ru');
    }

    public function sendOrderNotification(array $data): void
    {
        if (app()->environment('local')) {
            Log::info('DEV: sendOrderNotification (mail skipped)', $data);

            return;
        }
        Mail::to($this->getManagerEmail())->send(new OrderMail($data));
    }

    public function sendMeetingNotification(array $data): void
    {
        if (app()->environment('local')) {
            Log::info('DEV: sendMeetingNotification (mail skipped)', $data);

            return;
        }
        Mail::to($this->getManagerEmail())->send(new MeetingMail($data));
    }

    public function sendConsultationNotification(array $data): void
    {
        if (app()->environment('local')) {
            Log::info('DEV: sendConsultationNotification (mail skipped)', $data);

            return;
        }
        Mail::to($this->getManagerEmail())->send(new ConsultationMail($data));
    }

    /**
     * @deprecated Используйте sendConsultationNotification()
     */
    public function sendContactMessage(string $name, string $phone, string $mail): void
    {
        $this->sendConsultationNotification([
            'name' => $name,
            'phone' => $phone,
            'email' => $mail,
        ]);
    }
}
