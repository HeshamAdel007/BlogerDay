<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_post')->insert([
            'post_id'      => 1,
            'category_id'  => 1,

        ]);

         DB::table('post_tag')->insert([
            'post_id'  => 1,
            'tag_id'   => 1,

        ]);

    } // End Of Run

} // End Of Seeder
