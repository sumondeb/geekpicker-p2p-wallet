<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class ApiUserControllerTest extends TestCase
{
    public function test_login_validation()
    {
        $this->json('POST', 'api/login')
            ->assertInvalid([
                'email' => 'The email field is required.',
                'password' => 'The password field is required.',
            ]);
    }

    public function test_login_invalid_email_password()
    {
        $user = User::factory()->create(['password' => bcrypt('123456')]);
        $this->json('POST', 'api/login', ['email' => $user->email, 'password' => 'abcxyz'])->assertStatus(401);
    }

    public function test_login_successful()
    {
        $user = User::factory()->create(['password' => bcrypt('123456')]);
        $response = $this->json('POST', 'api/login', ['email' => $user->email, 'password' => '123456']);
        $response->assertStatus(200);
        $this->assertArrayHasKey('token', $response->json()['data']);

        $this->assertAuthenticated();
    }

    public function test_user_profile_must_be_for_authenticated_user()
    {
        $this->json('GET', 'api/user-profile')->assertStatus(401);
    }

    public function test_user_profile_return_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $this->json('GET', 'api/user-profile')
            ->assertStatus(200)
            ->assertJson([
                "success" => true,
                "data" => $user->toArray(),
                "message" => "User Profile",
            ]);
    }

    public function test_logout_successful()
    {
        $user = User::factory()->create(['password' => bcrypt('123456')]);
        $response = $this->json('POST', 'api/login', ['email' => $user->email, 'password' => '123456']);
        $response->assertStatus(200);
        $token = $response->json()['data']['token'];

        $this->json('POST', 'api/logout', [], ['Authorization' => 'Bearer '.$token])->assertStatus(200);
    }
}
