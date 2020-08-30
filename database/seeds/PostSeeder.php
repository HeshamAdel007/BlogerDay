<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = \App\Post::create([
         	"user_id"      => 1,
            "title"        => "Bloger Days",
            "slug"         => "bloger-days",
            "status"       => "published",
            "content"      => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna",
        ]);

    } // End Of Run

} // End Of Seeder
