<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        // validación
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'excerpt' => 'required',
            'tags' => 'required'
        ]);
        // return Post::create($request->all());
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->published_at;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->attach($request->tags);

        return back()->withFlash('Tu publicación ha sido creada');
    }
}
