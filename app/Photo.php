<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $table = 'photos';

    protected $guarded = [];

    protected $appends = ['photo_path'];

    public function getPhotoPathAttribute()
    {
        return asset(Storage::url('images/post/' . $this->image));

    } // End of Get Photo Path

    public function post() {
       return $this->belongsToMany(Post::class);

    } // End Of Posts

} // End Of Model
