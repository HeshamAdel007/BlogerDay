<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');

    } // End OF children

    public function childrenRecursive()
    {
       return $this->children()->with('childrenRecursive');

    } // End OF childrenRecursive

    // With & Where Use In Front End Page[ Home ]
    public function post() {
        return $this->belongsToMany(Post::class);

    } // End Of Posts

    public function postWithImage() {
        return $this->belongsToMany(Post::class)
                ->withCount('comments')
                ->with('photo:id,image')
                ->where([
                    ['status', '=', 'published'],
                    ['deleted_at', '=', Null],
                ]);

    } // End Of Get Post With Image


} // End Of Model
