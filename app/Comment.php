<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);

    } // End Of User

    public function post()
    {
        return $this->hasOne(Post::class);

    } // End Of Post

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');

    } // End Of Replies

} // End Of Model
