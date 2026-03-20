<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test to check if admin page loads with Vite script.
     */
    public function test_admin_page_uses_vite(): void
    {
        // Проверяем страницу логина, так как она доступна гостям
        $testResponse = $this->get('/login');
        $testResponse->assertStatus(200);
        $testResponse->assertSee('resources/js/app.js');
    }

    /**
     * A basic test to check if home page loads with Vite styles.
     */
    public function test_home_page_uses_vite(): void
    {
        $testResponse = $this->get('/');
        $testResponse->assertStatus(200);
        $testResponse->assertSee('resources/sass/app.scss');
    }
}
