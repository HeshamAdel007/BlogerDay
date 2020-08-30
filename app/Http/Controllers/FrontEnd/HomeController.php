<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\Category;
use App\Tag;
use App\Photo;
use App\User;
use App\comment;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::with('category:id,name,slug', 'photo:id,image')
                ->where([
                    ['status', '=', 'published'],
                    ['deleted_at', '=', Null],
                ])
                ->withCount('comments')
                ->get();

        $viedo_post    = $posts->sortByDesc('created_at')->take(6);
        $featur_post   = $posts->sortByDesc('created_at');
        $category_post = Category::with('postWithImage:id,title,slug,status')->get();
        $latest_post   = $posts->sortByDesc('created_at');

        return view('pages.front-end.home',
                compact('posts', 'viedo_post', 'featur_post', 'category_post','latest_post'));

    } // End Of Index

    public function post($id, $slug)
    {
        $post  =  Post::findOrFail($id);
        // Start View Count
        $postKey = 'post_' . $post->id; // Make A Key

        // Cheack If Post Has A Key Or No
        if (!Session::has($postKey)) {
            $post->increment('view_count');
            Session::put($postKey, 1);
        } else {
            //Every Time Watch Post Add Views +1
            $post->increment('view_count');
            Session::put($postKey, 1);
        }

        $posts =  Post::with('category:id,name,slug', 'tag:id,name', 'photo:id,image', 'comments')->where([
                            ['id', $id],
                            ['slug', $slug],
                            ['status', '=', 'published'],
                            ['deleted_at', '=', Null],
                        ])
                        ->withCount('comments')
                        ->get();
        $nextPost = $post->nextPost(); // Get Next From This Post
        $prevPost = $post->previousPost($id); // Get Previous From This Post

        return view('pages.front-end.single_post', compact('post', 'posts', 'nextPost', 'prevPost'));

    } // End Of Single Post

    public function category($id, $slug)
    {
        $category   = Category::findOrFail($id);
        $categories = Category::with('postWithImage')
                        ->where([
                            ['id', $id],
                            ['slug', $slug],
                        ])->get();

        return view('pages.front-end.category-page', compact('category', 'categories'));

    } // End Of Category Page


    public function contactPage()
    {
        return view('pages.front-end.contact');

    } // End Of Contact Page


     public function search(Request $request)
    {
        $posts = Post::with('category:id,name,slug', 'photo:id,image')
                ->withCount('comments')
                ->where([
                    ['status', '=', 'published'],
                    ['deleted_at', '=', Null],
                ])
                ->when($request->search, function ($query) use ($request){

            return $query->where('title', 'like', '%' . $request->search . '%')
                         ->orWhere('slug', 'like', '%' . $request->search . '%');
        })->latest()->paginate(2);

        return view('pages.front-end.search', compact('posts'));

    }


} // End Of Controller
