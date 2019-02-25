<?php
/**
 * Created by PhpStorm.
 * User: kilian
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
        $this->user->name = $request['name'];
        $this->user->password = $request['password'];
        $this->user->email =$request['email'];
        $this->user->save();
    }

}