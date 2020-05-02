<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();

    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);

        $post = Post::create([
            'title' => $request->title,
            'url' => Str::slug($request->title)
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, Request $request)
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
        $post->title = $request->title;
        $post->url = Str::slug($request->title);
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->published_at;
        $post->category_id = $request->category;
        $post->save();

        $post->tags()->sync($request->tags);

        return back()->withFlash('Tu publicación ha sido guardada');
    }
}
