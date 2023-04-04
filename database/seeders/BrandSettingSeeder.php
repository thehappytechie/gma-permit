<?php

namespace Database\Seeders;

use App\Models\BrandSetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = new BrandSetting;
        $settings->site_name = 'App Name';
        $settings->alert_email = 'atoagustyn@gmail.com';
        $settings->save();
    }
}
