<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function updateForm($comment_id)
    {
        return view('comments.update', [
            'comment' => Comment::where('id', $comment_id)->first(),
        ]);
    }

    public function addForm($post_id)
    {
        return view('comments.add', [
            'post' => Post::where('id', $post_id)->first(),
        ]);
    }

    public function update(Request $request, $comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();

        $comment->details = $request->input('details');

        $comment->save();
        return redirect('posts/view/'.$comment->post_id);
    }

    public function add(Request $request, $post_id)
    {
        $comment = new Comment;

        $comment->post_id = $post_id;
        $comment->details = $request->input('details');

        $comment->save();
        return redirect('posts/view/'.$post_id);
    }

    public function delete(Request $request)
    {
        $comment = Comment::where('id', $request->input('id'))->first();
        Comment::destroy($comment->id);
        return redirect('posts/view/'.$comment->post_id);
    }

    public function deleteMultipleFrom(Request $request, $post_id)
    {
        Comment::destroy($request->input('ids'));
        return redirect('posts/view/'.$post_id);
    }
}
