<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Mail\OrderMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_cart_page_is_accessible(): void
    {
        $response = $this->get('/basket');
        $response->assertStatus(200);
        $response->assertSee('Корзина');
    }

    public function test_order_submission_requires_name(): void
    {
        $response = $this->postJson('/api/send-cart', $this->validOrderData(['name' => '']));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }

    public function test_order_submission_requires_phone(): void
    {
        $response = $this->postJson('/api/send-cart', $this->validOrderData(['phone' => '']));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['phone']);
    }

    public function test_order_submission_requires_valid_email(): void
    {
        $response = $this->postJson('/api/send-cart', $this->validOrderData(['email' => 'not-an-email']));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }

    public function test_order_submission_requires_consent(): void
    {
        $response = $this->postJson('/api/send-cart', $this->validOrderData(['consent' => false]));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['consent']);
    }

    public function test_order_submission_requires_items(): void
    {
        $response = $this->postJson('/api/send-cart', $this->validOrderData(['items' => []]));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['items']);
    }

    public function test_order_submission_requires_delivery(): void
    {
        $response = $this->postJson('/api/send-cart', $this->validOrderData(['delivery' => '']));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['delivery']);
    }

    public function test_successful_order_sends_email(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/send-cart', $this->validOrderData());
        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

        Mail::assertSent(OrderMail::class, function (OrderMail $mail): bool {
            return $mail->hasTo(config('mail.manager_email'))
                && $mail->data['name'] === 'Иван Иванов'
                && count($mail->data['items']) === 1;
        });
    }

    public function test_successful_order_calculates_total_with_delivery(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/send-cart', $this->validOrderData([
            'delivery' => 'Доставка курьером (500 ₽)',
        ]));
        $response->assertStatus(200);

        Mail::assertSent(OrderMail::class, function (OrderMail $mail): bool {
            // 2000 (товар) + 500 (доставка) = 2500
            return (int) $mail->data['total'] === 2500;
        });
    }

    private function validOrderData(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Иван Иванов',
            'phone' => '+79001112233',
            'email' => 'test@example.com',
            'city' => 'Воронеж',
            'address' => 'ул. Ленина, 1',
            'note' => '',
            'delivery' => 'Самовывоз (бесплатно)',
            'consent' => true,
            'items' => [
                [
                    'id' => 1,
                    'name' => 'Тестовый товар',
                    'price' => 1000,
                    'count' => 2,
                ],
            ],
        ], $overrides);
    }
}
