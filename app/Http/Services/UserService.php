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

    public function getMatchedUsers ($id) {
        $users = [];
        $currentUser = $this->user::find($id)->first();
        $genresUser = json_decode($this->music->music::where('user_id', $id)->first()->genres);
        $orientaions = json_decode($this->user::find($id)->orientation);
        foreach ($orientaions as $orientation) {
            array_push($users, $this->user::where('gender', $orientation)->take(20)->get());
        }
        $usersFinal = [];
        foreach ($users[0] as $user) {
            $genres = json_decode($this->music->music::where('user_id', $user->id)->first()->genres);
            $result = array_intersect($genresUser, $genres);
            if ($result) {
                array_push($usersFinal, $user);
            }

        }
        return $usersFinal;
        $usersFinal1 = [];
//        foreach ($usersFinal as $user) {
//            $json = file_get_contents('https://fr.distance24.org/route.json?stops=' . $currentUser->city . '|' . $user->city);
//            $distance = json_decode($json)->distances[0];
//               if ($distance < 80) {
//                   array_push($usersFinal1, $user);
//               }
//        }
    }
}