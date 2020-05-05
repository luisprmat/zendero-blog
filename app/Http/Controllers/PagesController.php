<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $posts = Post::published()->paginate(2);

        return view('welcome', compact('posts'));
    }
}
