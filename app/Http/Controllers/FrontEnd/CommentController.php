<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\post;
use App\User;

class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {
        $comment        = new Comment;
        $comment->name  = $request->name;
        $comment->email = $request->email;
        $comment->body  = $request->body;

        $comment->user()->associate($request->user());

        $post = Post::findOrFail($request->get('post_id'));
        $post->comments()->save($comment);
        return back();

    } // End Of Store Comment

    public function replyStore(CommentRequest $request)
    {
        $reply        = new Comment();
        $reply->name  = $request->name;
        $reply->email = $request->email;
        $reply->body  = $request->body;

        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);
        return back();

    } // End Of Store Reply



} // End Of Controller
