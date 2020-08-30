<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = \App\Setting::create([
            "name"         => "Bloger Days",
            "email"        => "blogerdays@info.com",
            "description"  => "Bloger Days",
            "about"        => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna",
            "facebook"     => "Hesham.H.Adel",
            "twitter"      => "H_Adel5",
            "instagram"    => "h_adel0",
            "youtube"      => "UCYFIEIwXvPiRyvCMqoCSxfA",
        ]);

    } // End Of Run

} // End Of Seeder
