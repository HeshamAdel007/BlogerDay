<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $table = 'settings';

    protected $guarded = [];

    protected $appends = ['logo_path'];

    public function getLogoPathAttribute()
    {
       return asset(Storage::url('images/logo/' . $this->logo));

    } // End Of Get Image Path

} // End Of Model
