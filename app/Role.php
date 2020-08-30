<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{

    public function user() {
        return $this->belongsToMany(User::class, 'user_id');

    } // End Of User

    public function permission() {
        return $this->belongsToMany(Permission::class);

    } // End Of Permission

} // End Of Model
