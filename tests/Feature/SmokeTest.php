<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SmokeTest extends TestCase
{
    use RefreshDatabase;

    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    #[Test]
    #[DataProvider('publicUrls')]
    public function test_public_urls_are_accessible(string $url, int $expectedStatus = 200): void
    {
        $testResponse = $this->get($url);

        $testResponse->assertStatus($expectedStatus);
    }

    public static function publicUrls(): array
    {
        return [
            'home' => ['/'],
            'blog' => ['/blog'],
            'objects' => ['/objects'],
            'shop' => ['/internet-magazin'],
            'contacts' => ['/contacts'],
            'price' => ['/price'],
            'cart' => ['/cart'],
            'video' => ['/video'],
            'login' => ['/login'],
            'register' => ['/register', 302],
        ];
    }

    #[Test]
    public function test_api_articles_endpoint_is_accessible(): void
    {
        $testResponse = $this->get('/api/articles');
        $testResponse->assertStatus(200);
    }
}
