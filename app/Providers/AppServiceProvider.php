<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use App\Tag;
use App\Photo;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
        Schema::enableForeignKeyConstraints();


        // Use In Back-End

        // Make Categories Through In Page [Post => Create, Edit]
        View::composer(['pages.back-end.post.create', 'pages.back-end.post.edit'], function ($view) {
            $view->with('categories', Category::all());
        });

        // Make Tags Through In Pages [Post => Create, Edit]
        View::composer(['pages.back-end.post.create', 'pages.back-end.post.edit'], function ($view) {
            $view->with('tags', Tag::all());
        });

        // Make Tags Through In Pages [Post => Create, Edit]
        View::composer(['pages.back-end.post.create', 'pages.back-end.post.edit'], function ($view) {
            $view->with('photos', Photo::all());
        });

        // Make Setting Through In [ Layouts & SideBar ]
        View::composer([
            'layouts.adminPanel',
            'layouts.app',
            'layouts.appAuth',
            'layouts.back-end.sidebar',
            'layouts.front-end.footer'], function ($view) {
            $view->with('settings', DB::table('settings')
                                        ->select('name', 'email', 'about', 'logo', 'facebook', 'twitter', 'instagram', 'youtube')
                                        ->get());
        });

        // Topheader
        View::composer('layouts.front-end.topheader', function ($view) {
            $view->with('posts', Post::where([
                            ['status', '=', 'published'],
                            ['deleted_at', '=', Null],
                        ])->get());
        });

         // NavBar Link
        View::composer('layouts.front-end.navbar', function ($view) {
            $view->with('categories', Category::with('childrenRecursive')->whereNull('parent_id')->get());
        });

        // Post Trend Use In Pages [ Home & Sidebar ]
        View::composer([
                'layouts.front-end.parts-sidebar.most-views',
                'pages.front-end.home',
                'pages.front-end.category-page',
                'layouts.front-end.search'
            ], function ($view) {
            $view->with('post_trend', Post::with('category:id,name,slug', 'photo:id,image')->where([
                    ['status', '=', 'published'],
                    ['deleted_at', '=', Null],
                ])->withCount('comments')
                ->orderByDesc('view_count')
                ->get());
        });


    } // End Of Boot

} // End Of Provider
