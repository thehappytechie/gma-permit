<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::truncate();
        Location::create(['name' => 'Accra']);
        Location::create(['name' => 'Tema']);
        Location::create(['name' => 'Takoradi']);
    }
}
