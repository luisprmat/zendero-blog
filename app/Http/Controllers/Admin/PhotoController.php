<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'photo' => 'image|max:1024'
        ]);

        $post->photos()->create([
            'url' => $request->file('photo')->store('posts', 'public'),
        ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return back()->withFlash('Foto eliminada');
    }
}
