<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = \App\Tag::create([
            "name"  => "BlogerDays",
            "slug"  => "bloger-days",
        ]);

    } // End Of Run

} // End Of Seeder
