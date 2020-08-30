<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use App\Comment;
use App\Contact;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    } // End Of construct

    public function index()
    {
        $admin     = User::count();
        $posts     = Post::count();
        $tags      = Tag::count();
        $category  = Category::count();
        $comment   = Comment::count();
        $message   = Contact::count();
        return view('pages.back-end.dashboard', compact('admin','posts','tags', 'category','comment', 'message'));

    } // End Of Index

} // End Of Controller

