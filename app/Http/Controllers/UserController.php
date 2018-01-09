<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('back.user.index',compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('back.user.show',compact('user'));
    }
}
