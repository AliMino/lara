<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function create()
    {
        return view('posts.create',[
            'users' => User::all(),
        ]);
    }
}
