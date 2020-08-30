<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id')->withCount('posts');

    } // End Of User

    public function category()
    {
      return $this->belongsToMany(Category::class);

    } // End Of Category

    public function tag()
    {
        return $this->belongsToMany(Tag::class);

    } // End Of Tag

     public function photo() {
       return $this->belongsToMany(Photo::class);

    } // End Of Post

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('parent_id', '=', Null)->orderByDesc('created_at');

    } // End Of Post Comments


    public function previousPost(int $id){
        // Get previous Post
        $postID =  Post::where([
                        ['status', '=', 'published'],
                        ['deleted_at', '=', Null],
                    ])->orderBy('id','asc')->first();

        if ($postID->id == $id) {
            return Post::with('photo:id,image')
                    ->where([
                        ['id', $id],
                        ['status', '=', 'published'],
                        ['deleted_at', '=', Null],
                    ])
                    ->withCount('comments')
                    ->orderBy('id','asc')
                    ->firstOrFail();
        } else {
            return Post::with('photo:id,image')
                    ->where([
                        ['id', --$id],
                        ['status', '=', 'published'],
                        ['deleted_at', '=', Null],
                    ])
                    ->withCount('comments')
                    ->orderBy('id','asc')
                    ->firstOrFail();
        }

    } // End Of PreviousPost

    public function nextPost(){
        // Get Next Post
        $postID =  Post::where([
                        ['status', '=', 'published'],
                        ['deleted_at', '=', Null],
                    ])->latest()->first();

        if ($this->id != $postID->id) {
            return Post::with('photo:id,image')
                    ->where([
                        ['id', ++$this->id],
                        ['status', '=', 'published'],
                        ['deleted_at', '=', Null],
                    ])
                    ->withCount('comments')
                    ->orderBy('id','asc')
                    ->firstOrFail();
        } else {
            return Post::with('photo:id,image')
                    ->where([
                        ['id', $this->id],
                        ['status', '=', 'published'],
                        ['deleted_at', '=', Null],
                    ])
                    ->withCount('comments')
                    ->orderBy('id','asc')
                    ->firstOrFail();
        }

    } // End Of NextPost


} // End Of Model
