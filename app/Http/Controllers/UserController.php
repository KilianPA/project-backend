<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct (UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index () {
        return $this->userService->user::all();
    }

    public function get ($id) {
        return $this->userService->getById($id);
    }

    public function store (Request $request) {
        $this->userService->create($request->all());
    }
    public function update (Request $request) {
        $this->userService->update($request->all());
    }

    public function storeAvatar (Request $request) {
        $data = ($request->all());
        var_dump($data['avatar']);
    }

    public function getManyUsers (Request $request) {
        return $this->userService->getManyUsers($request->all());
    }

    public function getMatchedUsers ($id) {
        return $this->userService->getMatchedUsers($id);
    }
}
