<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function create()
    {
        return view('comments.create',[
            'post' => request()->post,
        ]);
    }
}
