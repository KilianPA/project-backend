<?php

namespace App\Http\Controllers;

use App\Http\Services\ChatService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct (ChatService $chatService)
    {
        $this->chatService = $chatService;
    }
    public function get ($id) {
        return $this->chatService->getById($id);
    }
}
