<?php
// tests/Feature/UserControllerTest.php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_users()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        User::factory(3)->create();

        $response = $this->getJson('/api/v1/users');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'success',
                    'message',
                    'data' => [
                        'data' => [
                            '*' => ['id', 'name', 'email']
                        ]
                    ]
                ]);
    }

    public function test_can_create_user()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        $response = $this->postJson('/api/v1/users', $userData);

        $response->assertStatus(201)
                ->assertJson([
                    'success' => true,
                    'message' => 'User created successfully'
                ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com'
        ]);
    }
}