<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name'              => 'Hesham Adel',
            'email'             => 'hesham@adel.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('0123456789'),
        ]);

        $user->attachRole('owner');
        $rol_str = ['users', 'post', 'category', 'tag', 'gallery',];
        $perm_str = ['create', 'read', 'update', 'delete'];
        foreach ($rol_str as $rol) {
            foreach ($perm_str as $perm) {
                $user->attachPermissions([
                    $perm . '_' . $rol,
                ]);
            };
        };
        $user->attachPermissions([
            'read_setting',
            'update_setting',
            'read_profile',
            'update_profile',
            'read_contact',
            'delete_contact',
        ]);

    } // End Of Run

} // End Of Seeder
