<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
       // $this->middleware('is_ban');
        $this->middleware('auth');
    }

    public function index()
    {
        return view("home");
    }

   
    public function show(User $user)
    {
        //
    }

   
    public function edit(User $user)
    {
        //
    }

   
    public function update(Request $request, User $user)
    {
        //
    }
}
