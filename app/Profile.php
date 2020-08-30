<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{

    protected $table = 'profiles';

    protected $guarded = [];


    protected $appends = ['avatar_path'];

    public function getAvatarPathAttribute()
    {
        return asset(Storage::url('images/avatar/' . $this->avatar));

    } // End Of Get Image Path

    public function user() {

        return $this->belongsTo(User::class, 'user_id');

    } // End Of User

} // End Of Model
