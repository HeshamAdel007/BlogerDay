<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Profile::create([
            "user_id"      => 1,
            "nickname"     => "Owner Project",
            "description"  => "CEO Project",
            "about"        => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna",
            "facebook"     => "Hesham.H.Adel",
            "twitter"      => "H_Adel5",
            "instagram"    => "h_adel0",
            "youtube"      => "UCYFIEIwXvPiRyvCMqoCSxfA",
        ]);

    } // End Of Run

} // End Of Seeder
