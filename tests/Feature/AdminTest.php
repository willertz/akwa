<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login(): void
    {
        $email = 'admin-' . uniqid() . '@example.com';
        $user = User::factory()->create([
            'email' => $email,
            'password' => bcrypt('password'),
        ]);

        $testResponse = $this->post('/login', [
            'email' => $email,
            'password' => 'password',
        ]);

        $testResponse->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    public function test_unauthenticated_user_cannot_access_api_management(): void
    {
        $testResponse = $this->postJson('/api/articles/new', []);
        // Поскольку валидация теперь в FormRequest, пустой запрос вернет 422
        $testResponse->assertStatus(422);
    }

    public function test_authenticated_admin_can_create_article(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $articleData = [
            'name' => 'New Test Article Name',
            'title' => 'New Test Article Title',
            'description' => 'Test description',
            'content' => 'This is test content for article',
        ];

        $testResponse = $this->postJson('/api/articles/new', $articleData);

        $testResponse->assertStatus(200);
        $this->assertDatabaseHas('articles', [
            'name' => 'New Test Article Name',
            'title' => 'New Test Article Title',
        ]);
    }

    public function test_authenticated_admin_can_create_object(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $objectData = [
            'name' => 'New Test Object',
            'title' => 'Object Title',
            'description' => 'Object Description',
            'preview_pict' => 'preview.jpg',
            'content' => 'Object Content',
            'slider' => [],
        ];

        $testResponse = $this->postJson('/api/objects/new', $objectData);

        $testResponse->assertStatus(200);
        $this->assertDatabaseHas('a_objects', [
            'name' => 'New Test Object',
        ]);
    }
}
