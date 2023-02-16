<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all(),
        ]);
    }

    public function view($post_id)
    {
        return view('posts.view', [
            'post' => Post::where('id', $post_id)->first(),
            'comments' => Comment::where('post_id', $post_id)->get(),
        ]);
    }

    public function updateForm($post_id)
    {
        return view('posts.update', [
            'post' => Post::where('id', $post_id)->first(),
        ]);
    }

    public function createForm()
    {
        return view('posts.create');
    }

    public function update(Request $request, $post_id)
    {
        $post = Post::where('id', $post_id)->first();

        $post->title = $request->input('title');
        $post->details = $request->input('details');

        $post->save();
        return redirect('posts/view/'.$post_id);
    }

    public function create(Request $request)
    {
        $post = new Post;

        $post->title = $request->input('title');
        $post->details = $request->input('details');

        $post->save();
        return redirect('posts/index');
    }

    public function delete(Request $request)
    {
        Comment::where('post_id', $request->input('id'))->delete();
        Post::destroy($request->input('id'));
        return redirect('posts/index');
    }
}
