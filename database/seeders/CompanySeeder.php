<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        Company::insert([
            // ['name' => 'Accra', 'email' => '', 'contact' => '', 'address' => '', 'registry_port' => '', 'gross_tonnage' => '', 'call_sign' => '', 'vessel_number' => '', 'imo_number' => ''],
            ['name' => '', 'email' => '', 'contact' => '', 'address' => '', 'registry_port' => '', 'gross_tonnage' => '', 'call_sign' => '', 'vessel_number' => '', 'imo_number' => ''],
            ['name' => 'Tema'],
            ['name' => 'Takoradi'],
        ]);
    }
}
