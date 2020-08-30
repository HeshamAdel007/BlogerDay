<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public function role() {
        return $this->belongsToMany(Role::class);

    } // End Of Role

    public function user() {
        return $this->belongsToMany(User::class);

    }// End Of User

} // End Of Model
