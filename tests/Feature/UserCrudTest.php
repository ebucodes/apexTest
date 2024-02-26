<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_admin_can_create_user()
    {
        $admin = User::factory()->create(['roles' => 'admin']);
        $this->actingAs($admin, 'api');

        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
            'roles' => 'user',
        ];

        $response = $this->postJson('/api/users', $userData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => $userData['email']]);
    }

    public function test_user_can_view_own_profile()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson(['email' => $user->email]);
    }

    // Additional tests for update, delete, and error cases can be added
}
