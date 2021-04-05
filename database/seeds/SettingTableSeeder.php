<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([

            'name' => 'BlogDev',
            'copyright' => 'Copyright © 2021 All rights reserved ',
            'phone_no' => '08102320829',


        ]);
    }
}
