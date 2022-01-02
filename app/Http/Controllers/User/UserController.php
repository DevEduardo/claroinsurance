<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function users($numberItem = 10)
    {
        $users = $this->userService->all($numberItem);
        return view('users.index', compact('users', 'numberItem'));
    }

    public function user(User $user)
    {
        return view('users.update', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        try {
            $this->userService->update($request, $user);
            return redirect("users");
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(User $user)
    {
        try {
            $user->delete();
            return redirect("users");
        } catch (Exception $e) {
            throw $e;
        }
    }
}
