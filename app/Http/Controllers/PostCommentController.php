<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        //add a given comment to the post

        //validate
        request()->validate([
            'body' => 'required'
        ]);

        //post_id is assigned automatically
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back();
    }
}
