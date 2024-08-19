<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function fetchUsers()
    {
        $this->userService->fetchUsers();

        return response()->json(['message' => 'User data fetched and stored successfully.'], 200);
    }

}
