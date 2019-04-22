<?php
/**
 * Created by PhpStorm.
 * UserSeeder: kilian
 * Date: 2019-01-29
 * Time: 16:29
 */

namespace App\Http\Services;


use App\Chat;
use App\User;
use Faker\Factory;

class ChatService
{

    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function getById($id) {
        $data = [];
        $data['isSender'] =  $this->chat::where('sender_id', $id)->get();
        $data['isReceiver'] = $this->chat::where('receiver_id', $id)->get();
        return $data;
    }

    public function create ($request) {
        $this->chat->create($request);
    }
}