<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * User Event Boot
     * Function Whene Register New User
     * Create Profile
     * User Add Role & Permissions User When Use Fake data Delete Comment
     */
    // protected static function boot() {
    //     parent::boot();
    //     static::created( function ($user) {
    //         $user->profile()->create([
    //             'user_id' => $user->id,
    //         ]);
    //          $user->attachRole('user');
    //          $user->attachPermissions(['read_profile', 'update_profile', 'read_setting']);
    //     });
    // } // End Of Boot

    public function role() {
        return $this->hasOne(Role::class, 'id');

    } // End Of Role

     public function posts() {
        return $this->hasMany('App\Post');

    } // End Of Posts

    public function profile() {
        return $this->hasOne('App\Profile');

    } // End Of Profile


} // End Of Model
