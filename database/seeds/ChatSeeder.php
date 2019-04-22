<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 25; $i++) {
            $sender = rand(2, 50);
            $receiver = rand(2, 50);
            DB::table('chats')->insert([
                'sender_id' => $sender,
                'receiver_id' => $receiver,
            ]);
        }
    }
}
