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

class UserService
{

    public function __construct(User $user, MusicService $music)
    {
        $this->user = $user;
        $this->music = $music;
    }

    public function getById($id) {
        return $this->user::find($id);
    }

    public function create ($request) {
        $request['password'] = bcrypt($request['password']);
        if (isset($data['avatar'])) {
            $this->user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        $user = $this->user->create($request);

        $this->music->store($user->id, json_encode($request['music']['artist']), 'artist');
        $this->music->store($user->id, json_encode($request['music']['song1']), 'song1');
        $this->music->store($user->id, json_encode($request['music']['song2']), 'song2');
        $this->music->store($user->id, json_encode($request['music']['song3']), 'song3');
    }

    public function update ($request) {
        $user = $this->user::find($request['id']);
        $request['password'] = bcrypt($request['password']);
        $user->update($request);
        $this->music->delete($request['id']);

        $this->music->store($request['id'], json_encode($request['music']['artist']), 'artist');
        $this->music->store($request['id'], json_encode($request['music']['song1']), 'song1');
        $this->music->store($request['id'], json_encode($request['music']['song2']), 'song2');
        $this->music->store($request['id'], json_encode($request['music']['song3']), 'song3');

    }

    public function getManyUsers ($arrayId) {
        $array = [];
        foreach ($arrayId as $id) {
            array_push($array, $this->user::find($id));
        }
        return $array;
    }

}