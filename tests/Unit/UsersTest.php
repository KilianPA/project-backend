<?php
/**
 * Created by PhpStorm.
 * User: kilian
 * Date: 2019-04-22
 * Time: 13:45
 */

namespace Tests\Unit;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user_with_model()
    {
        $table = 'users';
        $user = factory(User::class)->create([
            'password' => 'secret'
        ]);
        $this->assertDatabaseHas($table, ['email' => $user->email]);
    }
    public function test_login_success () {
        $user = factory(User::class)->create([
            'password' => bcrypt('secret')
        ]);
        $this->artisan('passport:install');
        $body = [
            'email' => $user->email,
            'password' => 'secret'
        ];

        $this->json('POST','api/login',$body)
            ->assertStatus(200)
            ->assertJsonStructure(['access_token']);

    }

    public function test_login_failed () {
        $user = factory(User::class)->create([
            'password' => bcrypt('secret')
        ]);
        $this->artisan('passport:install');
        $body = [
            'email' => $user->email,
            'password' => 'BONJOUR'
        ];

        $this->json('POST','api/login',$body)
            ->assertStatus(401);
    }

    public function test_access_to_route_with_token () {
        $header = [];
        $this->artisan('passport:install');
        $user = factory(User::class)->create();
        $token = $user->createToken('TestToken')->accessToken;
        $header['Authorization'] = 'Bearer '.$token;
        $this->json('get','api/users', [], $header)
            ->assertStatus(200);
    }

    public function test_access_to_route_without_token () {
        $header = [];
        $this->json('get','api/users', [], $header)
            ->assertStatus(401);
    }


}
