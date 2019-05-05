<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Services\MusicService;
use App\Http\Services\UserService;
use App\Music;
use App\User;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function __construct (MusicService $music)
    {
        $this->musicService = $music;
    }

    public function index ($id) {
        return $this->musicService->findAllByUserId($id);
    }
}
