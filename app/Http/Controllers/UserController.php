<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_ban');
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::user();
        return view('users.show', compact('user'));
    }


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $user->updateUser($request);
        return redirect()->route('users.index');
    }
}
