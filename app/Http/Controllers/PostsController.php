<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all(),
        ]);
    }

    public function updateForm($post_id)
    {
        #
    }

    public function createForm()
    {
        return view('posts.create');
    }

    public function update()
    {
        #
    }

    public function create(Request $request)
    {
        $post = new Post;

        $post->title = $request->input('title');
        $post->details = $request->input('details');

        $post->save();
        return redirect('posts/index');
    }
}
