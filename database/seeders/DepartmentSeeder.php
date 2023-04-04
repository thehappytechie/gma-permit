<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'ICT',
            'Administration',
            'Accounts',
            'Audit',
            'Human Resource',
            'Legal',
            'TEC',
            'Planning',
            'Technical',
            'Public Relations',
            'Procurement',
            'Maritime Services'
        ];

        foreach ($departments as $department) {
            Department::create([
                'name' => $department
            ]);
        }
    }
}
