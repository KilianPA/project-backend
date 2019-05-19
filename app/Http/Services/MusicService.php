<?php
/**
 * Created by PhpStorm.
 * UserSeeder: kilian
 * Date: 2019-01-29
 * Time: 16:29
 */

namespace App\Http\Services;


use App\Music;
use App\User;
use Faker\Factory;

class MusicService
{

    public function __construct(Music $music)
    {
        $this->music = $music;
    }

    public function store ($id, $data, $type) {
        $array = [];
        $array['user_id'] = $id;
        $array['field'] = $type;
        $array['music_data'] = $data;
        echo $type;
        if ($type == 'artist') {
            $array['genres'] = (json_encode(json_decode($array['music_data'])->genres));
        }
        $this->music->create($array);
    }

    public function findAllByUserId ($id) {
        return $this->music::where('user_id', $id)->get();
    }

    public function delete ($id) {
        $this->music::where('user_id', $id)->delete();
    }
}