<?php

use App\Setting;
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
        Setting::truncate();

        Setting::create([
            'system_name' => "World News",
            'favicon' => "favicon.jpg",
            'front_logo' => "front_logo.jpg",
            'admin_logo' => "admin_logo.jpg"
        ]);
    }
}
