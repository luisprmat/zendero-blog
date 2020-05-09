<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|min:3']);

        $post = Post::create($request->only('title'));

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->all());

        $post->syncTags($request->tags);

        return redirect()->route('admin.posts.edit', $post)->withFlash('Tu publicación ha sido guardada');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->withFlash('Tu publicación ha sido eliminada');
    }
}
