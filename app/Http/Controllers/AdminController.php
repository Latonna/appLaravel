<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }
    public function ban(User $user)
    {
        if ($user) {

            if ($user->ban()) {
                return redirect()->route('admin.index')->with('success', 'User ban Successfully..');
            }
            return redirect()->route('admin.index')->with('warning', 'Not enough rights or the user is already banned');
        }
    }

    public function revoke(User $user)
    {
        if ($user) {
            if ($user->unban()) {
                return redirect()->route('admin.index')->with('success', 'User revoke Successfully.');
            }
            return redirect()->route('admin.index')->with('warning', 'Not enough rights or the user is already unbanned');
        }
    }

    public function makeAdmin(User $user)
    {
        if ($user) {
            if ($user->makeAdmin()) {
                return redirect()->route('admin.index')->with('success', 'The user has received administrator rights');
            }
            return redirect()->route('admin.index')->with('warning', 'The user is already an administrator');
        }
    }
}
