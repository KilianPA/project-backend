<?php
/**
 * Created by PhpStorm.
 * UserSeeder: kilian
 * Date: 2019-01-29
 * Time: 16:29
 */

namespace App\Http\Services;


use App\User;
use Faker\Factory;

class UserService
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getById($id) {
        return $this->user::find($id);
    }

    public function create ($request) {
        $request['password'] = bcrypt($request['password']);
        if (isset($data['avatar'])) {
            $this->user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }
        $this->user->create($request);
    }

    public function update ($request) {
        $user = $this->user::find($request['id']);
        $request['password'] = bcrypt($request['password']);
        $user->update($request);
    }

}