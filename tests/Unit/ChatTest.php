<?php
/**
 * Created by PhpStorm.
 * User: kilian
 * Date: 2019-04-22
 * Time: 13:45
 */

namespace Tests\Unit;


use App\Chat;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ChatTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_message_by_id()
    {
        $header = [];
        factory(User::class, 5)->create();
        $this->artisan('passport:install');
        $user = factory(User::class)->create();
        $token = $user->createToken('TestToken')->accessToken;
        $header['Authorization'] = 'Bearer '.$token;
        factory(Chat::class)->create();
        $this->json('get','api/chat/1', [], $header)
            ->assertStatus(200)->assertOk();
    }
}
