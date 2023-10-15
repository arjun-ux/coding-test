<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(50)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_name' => 'admin'
        ]);
        // User::create([
        //     'name' => 'Manager',
        //     'email' => 'manager@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role_name' =>'manager'
        // ]);
        // User::create([
        //     'name' => 'Arjun',
        //     'email' => 'arjun@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role_name' =>'user'
        // ]);
    }
}
