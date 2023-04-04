<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superuser',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'editor',
            'guard_name' => 'web',
        ]);

        $superAdmin = User::firstOrCreate([
            'id' => '2',
            'name' => 'Ato Augustine',
            'email' => 'atoagustyn@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('super@admin'),
        ]);

        $superAdmin->assignRole('superuser');
    }
}
