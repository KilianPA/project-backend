
<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{

    public function __construct(\App\Http\Services\MusicService $musicService)
    {
        $this->musicService = $musicService;
    }

    public function run()
    {
        $json = file_get_contents("./database/seeds/music.json");
        $json = json_decode($json);
        for ($i = 1; $i <= 50; $i++) {
            print_r(json_encode($json[$i]));
            $this->musicService->store($i, json_encode($json[$i]), 'artist');
        }
    }
}
