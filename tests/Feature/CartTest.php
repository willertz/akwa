<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;
    public function test_cart_page_is_accessible(): void
    {
        $testResponse = $this->get('/cart');
        $testResponse->assertStatus(200);
        $testResponse->assertSee('Корзина');
    }

    public function test_order_submission_validates_input(): void
    {
        $testResponse = $this->postJson('/api/send-cart', []);
        $testResponse->assertStatus(422);
        $testResponse->assertJsonValidationErrors(['name', 'phone', 'mail', 'items']);
    }

    public function test_successful_order_submission_sends_email(): void
    {
        Mail::fake();

        $orderData = [
            'name' => 'Test User',
            'phone' => '+79001112233',
            'mail' => 'test@example.com',
            'items' => [
                [
                    'id' => 1,
                    'name' => 'Test Product',
                    'price' => 1000,
                    'count' => 2,
                ],
            ],
        ];

        $testResponse = $this->postJson('/api/send-cart', $orderData);

        $testResponse->assertStatus(200);

        Mail::assertSent(\App\Mail\OrderMail::class, static fn(\App\Mail\OrderMail $mail): bool => $mail->hasTo('timofeev@akwagarant.ru'));
    }
}
