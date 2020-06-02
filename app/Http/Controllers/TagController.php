<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('pages.home', [
            'title' => "Publicaciones con la etiqueta '{$tag->name}'",
            'posts' => $tag->posts()->published()->paginate()
        ]);
    }

}
