<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AuthAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    private static $login;
    private static $password;


    public static function setUpBeforeClass(): void
    {
        $faker = \Faker\Factory::create();
        self::$login = $faker->lastName;
        self::$password = $faker->password;
    }

    public function test_register_user() {
        $response = $this->postJson('/api/auth/register', [
            'login' => self::$login,
            'password' => self::$password,
        ]);

        $response->assertOk()
            ->assertJson([
                'status' => true,
            ]);
    }

    public function test_login_user_correct() {
        $response = $this->postJson('/api/auth/login', [
            'login' => self::$login,
            'password' => self::$password,
        ]);

        $response->assertOk()
            ->assertJson([
                'status' => true,
            ]);

        $response->dumpHeaders();
    }

    public function test_login_user_incorrect_pass() {
        $response = $this->postJson('/api/auth/login', [
            'login' => self::$login,
            'password' => '00000',
        ]);

        $response->assertOk()
            ->assertJson([
                'status' => false,
                'error' => 'Отказ входа!'
            ]);
    }

    public function test_request_not_allowed_because_missed_token() {
        $response = $this->getJson('/api/auth/user');

        $response->assertOk()
            ->assertJson([
                'error' => 'Unauthorized'
            ]);
    }
}
