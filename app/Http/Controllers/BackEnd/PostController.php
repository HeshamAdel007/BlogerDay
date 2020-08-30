<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Photo;
use App\User;
use App\Profile;
use Auth;

class PostController extends Controller
{

    public function __construct() {

        $this->middleware(['permission:read_post'])->only('index', 'show');
        $this->middleware(['permission:create_post'])->only('store');
        $this->middleware(['permission:update_post'])->only('update', 'edit');
        $this->middleware(['permission:delete_post'])->only('destroy', 'trash','harddelete', 'restore');

    } // End Of Construct


    public function index()
    {
        $posts = Post::with('user:id,name', 'category:id,name')->withOut('profile')->latest()->paginate(25);
        return view('pages.back-end.post.index', compact('posts'));

    } // End Of Index

    public function create()
    {
        // Call Category & Tag & Photo By View Composers In AppServiceProvider
        return view('pages.back-end.post.create');

    } // End Of Create


    public function store(PostRequest $request)
    {

        $post            = new Post;
        $post->user_id   = Auth::id();
        $post->title     = $request->title;
        $post->slug      = Str::slug($request->title, '-');
        $post->content   = $request->content;
        $post->status    = $request->status;
        $post->save();

        // Add Multi Category & Tags
        $post->category()->sync($request->categories);
        $post->tag()->sync($request->tags);

        // Post Images
        if ($request->photo) {

            // Get All Directory In Storge/public
            $directories = Storage::directories('public');

            // Check If File images is Exists Or No
            if (Arr::has($directories, 'images') === false) {
                // If File images is Not Exists Make A New One
                $createDirectory = Storage::makeDirectory('public/images');
                // Get All Directory In Storge/public/images
                $directory = Storage::directories('public/images');
                // Check If File post is Exists Or No
                if (Arr::has($directory, 'post') === false) {
                    // If File post is Not Exists Make A New One
                    $createDirectory = Storage::makeDirectory('public/images/post');

                    // Add New Image
                    $photo = new Photo;
                    $image = $request->photo;
                    $fakeName = time() . '-' . Str::random(10) . '-' . $image->getClientOriginalName(); // Image Name
                    Image::make($image)
                        ->resize(1024, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(storage_path('app/public/images/post/' . $fakeName));

                    $photo->image = $fakeName;
                    $photo->save();
                    // Make Sync Between Post & Image
                    $post->photo()->sync($photo);

                } // End Of If Check File post is Exists Or No

            } // End Of If Check File images is Exists Or No

        } else {
            // Choose Image From
            $post->photo()->sync($request->imgs);

        } // End If
        // End Of Post Images

        notify()->preset('post-create');
        return redirect()->Route('post.index');


    } // End Of Store

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('pages.back-end.post.edit', compact('post'));

    } // End Of Edit

    public function update(PostRequest $request, $id)
    {

        $post           = Post::findOrFail($id);
        $post->title    = $request->title;
        $post->slug     = Str::slug($request->title, '-');
        $post->content  = $request->content;
        $post->status   = $request->status;
        $post->save();

        // Add Multi Category & Tags
        $post->category()->sync($request->categories);
        $post->tag()->sync($request->tags);

         if ($request->photo) {

            // Add New Image

            $photo = new Photo;
            $image = $request->photo;
            $fakeName = time() . '-' . Str::random(10) . '-' . $image->getClientOriginalName(); // Image Name
            Image::make($image)
                ->resize(1024, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/images/post/' . $fakeName));

            $photo->image = $fakeName;
            $photo->save();
            // Make Sync Between Post & Image
            $post->photo()->sync($photo);

        } elseif($request->imgs) {
            // Choose Image From
            $post->photo()->sync($request->imgs);

        } // End If
        // End Of Post Images

        notify()->preset('post-update');
        return redirect()->Route('post.index');

    } // End Of Update

    public function destroy($id)
    {
        // used soft delete
        $post = Post::findOrFail($id);
        $post->delete();
        notify()->preset('post-delete');
        return redirect()->back();

    } // End O Destroy

    public function trash()
    {
        // function move post soft delete to trashed
        $posts = Post::onlyTrashed()->paginate(25);;
        return view('pages.back-end.post.trash',compact('posts'));

    } // End Of Trash


    public function restore($id)
    {
        // function back any post in trash to posts
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        notify()->preset('post-restore');
        return redirect()->Route('post.index');

    } // End Of Restore

     /**
     * Remove the specified resource from storage.
    */
    public function harddelete($id)
    {
        // function hared delete (normal delete)
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        notify()->preset('post-delete');
        return redirect()->Route('post.trash');

    } // End Of Hard Delete

} // End Of Controller
