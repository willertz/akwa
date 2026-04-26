<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\ConsultationMail;
use App\Mail\MeetingMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailFormsTest extends TestCase
{
    use RefreshDatabase;

    // ==== Форма "Запишитесь на встречу" ====

    public function test_meeting_form_requires_name(): void
    {
        $response = $this->postJson('/api/send-meeting', ['phone' => '+79001112233']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }

    public function test_meeting_form_requires_phone(): void
    {
        $response = $this->postJson('/api/send-meeting', ['name' => 'Иван']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['phone']);
    }

    public function test_meeting_form_sends_email(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/send-meeting', [
            'name' => 'Иван Иванов',
            'phone' => '+79001112233',
            'page' => 'http://localhost/internet-magazin/goods/test-product',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

        Mail::assertSent(MeetingMail::class, function (MeetingMail $mail): bool {
            return $mail->hasTo(config('mail.manager_email'))
                && $mail->data['name'] === 'Иван Иванов'
                && $mail->data['phone'] === '+79001112233';
        });
    }

    public function test_meeting_form_sends_email_without_page(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/send-meeting', [
            'name' => 'Мария',
            'phone' => '+79009998877',
        ]);

        $response->assertStatus(200);
        Mail::assertSent(MeetingMail::class);
    }

    public function test_meeting_mail_has_correct_subject(): void
    {
        Mail::fake();

        $this->postJson('/api/send-meeting', [
            'name' => 'Тест',
            'phone' => '+79001234567',
        ]);

        Mail::assertSent(MeetingMail::class, function (MeetingMail $mail): bool {
            return str_contains($mail->envelope()->subject, 'встречу');
        });
    }

    // ==== Форма "Получить консультацию" ====

    public function test_consultation_form_sends_email(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/send-mail', [
            'name' => 'Пётр Петров',
            'phone' => '+79001112233',
            'mail' => 'petr@example.com',
            'method' => 'Телефон',
        ]);

        $response->assertStatus(200);

        Mail::assertSent(ConsultationMail::class, function (ConsultationMail $mail): bool {
            return $mail->hasTo(config('mail.manager_email'))
                && $mail->data['name'] === 'Пётр Петров';
        });
    }

    public function test_consultation_form_works_with_empty_fields(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/send-mail', []);
        $response->assertStatus(200);

        Mail::assertSent(ConsultationMail::class, function (ConsultationMail $mail): bool {
            return $mail->data['name'] === 'Не указано';
        });
    }

    public function test_consultation_mail_has_correct_subject(): void
    {
        Mail::fake();

        $this->postJson('/api/send-mail', ['name' => 'Тест', 'phone' => '+7900']);

        Mail::assertSent(ConsultationMail::class, function (ConsultationMail $mail): bool {
            return str_contains($mail->envelope()->subject, 'консультацию');
        });
    }
}
