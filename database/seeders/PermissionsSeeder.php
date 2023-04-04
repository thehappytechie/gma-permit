<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'admin-access',
            'create-department',
            'edit-department',
            'delete-department',
            'show-department',
            'view-department',
            'create-role',
            'edit-role',
            'delete-role',
            'show-role',
            'view-role',
            'create-setting',
            'edit-setting',
            'delete-setting',
            'show-setting',
            'view-setting',
            'create-user',
            'edit-user',
            'delete-user',
            'show-user',
            'view-user',
            'create-location',
            'edit-location',
            'delete-location',
            'show-location',
            'view-location',
            'create-ticket',
            'edit-ticket',
            'delete-ticket',
            'show-ticket',
            'view-ticket',
            'create-company',
            'edit-company',
            'delete-company',
            'show-company',
            'view-company',
            'create-contract',
            'edit-contract',
            'delete-contract',
            'show-contract',
            'view-contract',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
