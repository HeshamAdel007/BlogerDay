# BlogerDay
> Use Laravel v6.18.37

## Description
![Version](https://img.shields.io/github/v/release/HeshamAdel007/BlogerDay?color=44cc11&label=Release&style=flat-square)
![Downloads](https://img.shields.io/github/downloads/HeshamAdel007/BlogerDay/total?color=44cc11&style=flat-square)
![License](https://img.shields.io/github/license/HeshamAdel007/BlogerDay?color=44cc11&style=flat-square)

#### BlogerDay - Web Projects Build By Laravel Framework 


## Images
- You Can Show More Image In Folder [info_images]
<div>
    <img src ="https://github.com/HeshamAdel007/BlogerDay/blob/master/info_images/img-3.png" width = "350px" height="200px">
    <img src ="https://github.com/HeshamAdel007/BlogerDay/blob/master/info_images/img-5.png" width = "350px" height="200px" align="right">
    <img src ="https://github.com/HeshamAdel007/BlogerDay/blob/master/info_images/img-6.png" width = "350px" height="200px">
    <img src ="https://github.com/HeshamAdel007/BlogerDay/blob/master/info_images/img-4.png" width = "350px" height="200px" align="right">
</div>

<br>


## Installation

### 1. Downloade Project
Run this at the command line:
```bash
git clone git@github.com:HeshamAdel007/BlogerDay.git
```
### 2. Install Laravel
```bash
Composer install
```
- Create a New .env File
- Could Copy From Existing .env.example, Update Relevant Settings (DB_DATABASE, DB_USERNAME,.....)

- Generate App Encryption Key
```bash
php artisan key:generate
```
- Migrate The DataBase
- You Can Use My Data You Will Find In WinRAR File[ database(blogerday) ]
- Open PhpMyAdmin And Make Import To File [ blogerdays.sql ] Will Add Some Data To Tray Project
- Or Can Make Tour Data
```bash
php artisan migrate
```

- Migrate The Sedder
```bash
php artisan db:seed
```

- Use Laratrust For Handle [Roles & Permissions] Inside Application,
You Can Edit This [Roles & Permissions]
```php
// Will Find This Roles & Permissions In [ config/laratrust_seeder.php ]
'owner' => [
    'users'    => 'c,r,u,d',
    'post'     => 'c,r,u,d',
    'category' => 'c,r,u,d',
    'tag'      => 'c,r,u,d',
    'gallery'  => 'c,r,u,d',
    'setting'  => 'r,u',
    'profile'  => 'r,u',
    'contact'  => 'r,d',
],
'super_admin' => [
],
'admin' => [
],
'user' => [
],
```

## 3. Functions
- When Register New User OR Login By Socialite Will Add Role & Create Profile [ User ] For This User
```php
// Will Find This Function In User Model [ app/User.php ]
// Delete Comment After Make Databases Seeders
protected static function boot() {
    parent::boot();
    static::created( function ($user) {
        $user->profile()->create([
             'user_id' => $user->id,
        ]);
        $user->attachRole('user');
        $user->attachPermissions(['read_profile', 'update_profile', 'read_setting']);
    });
} // End Of Boot
```

## 4. Routes
- In This Project I Make 2 Routes
- 1 Particular BackEnd [ DashBoard ] And You Will Find This In Path [routes/backend/web.php]
- 2 Particular ForntEnd [ Users ] And You Will Find This In Path [routes/web.php]
- You Will Find This Routes Configuration In Path [app/Providers/RouteServiceProvider] If You Need Make Any Changes On Route
- I Make No One Can’t Register If You Need Stopped This Change From False To True
```php
// Change This From False To True
Auth::routes(['register' => false, 'verify' => true]);
```

## 5. View Composer
- I Use View Composer To Path Some Data To Speciflc Views Pages
- And Will Find This In Path [app/Providers/AppServiceProvider]
```php
// Example About View Composer
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
```


## 6. Package & Tools Used

- **[AdminLTE ](https://adminlte.io/)** [ v3.0.5 ]

- **[Laratrust ](https://laratrust.santigarcor.me/docs/5.2/)** [ v5.2.9 ]

- **[Laravel Notify ](https://github.com/mckenziearts/laravel-notify)** [ v1.1.2 ]

- **[Intervention Image ](http://image.intervention.io/)** [ v2.5.1 ]



## 7. Connect With Me


[<img src="https://github.com/HeshamAdel007/HeshamAdel007/blob/master/Assets/Linkedin.svg" alt="Linkedin Logo" width="32">](https://in.linkedin.com/in/heshamadel000)  [<img src="https://github.com/HeshamAdel007/HeshamAdel007/blob/master/Assets/Twitter.svg" alt="Twitter Logo" width="32">](https://twitter.com/H_Adel5)  [<img src="https://github.com/HeshamAdel007/HeshamAdel007/blob/master/Assets/Instagram.svg" alt="instagram logo" width="32">](https://www.instagram.com/h_adel0/)  [<img src="https://cdn.svgporn.com/logos/github-icon.svg" alt="Github logo" width="34">](https://github.com/HeshamAdel007) [<img src="https://github.com/HeshamAdel007/HeshamAdel007/blob/master/Assets/fb.svg" alt="Facebook logo" height="32">](https://www.facebook.com/Hesham.H.Adel/) [<img src="https://github.com/HeshamAdel007/HeshamAdel007/blob/master/Assets/Gmail.svg" alt="Gmail logo" height="32">](mailto:heshamadel528@gmail.com)


## 8. License

The Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
