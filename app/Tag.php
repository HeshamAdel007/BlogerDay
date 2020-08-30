<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class);

    } // End Of Posts

} // End Of Model
