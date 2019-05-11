<?php
/**
 * Created by PhpStorm.
 * UserSeeder: kilian
 * Date: 2019-01-29
 * Time: 16:29
 */

namespace App\Http\Services;


use App\Chat;
use App\Match;
use App\User;
use DemeterChain\C;
use Faker\Factory;

class MatchService
{

    public function __construct(Match $match, ChatService $chat)
    {
        $this->match = $match;
        $this->chatService = $chat;
    }

    public function getById($id) {
    }

    public function create ($request) {
        $this->match->create($request);
        $this->chatService->create($request);
    }
}