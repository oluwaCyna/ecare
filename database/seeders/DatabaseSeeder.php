<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(20)->create();

        DB::table('users')->insert([
            'title' => 'Mr',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => config('custom_values.admin_email'),
            'role' => 'superadmin',
            'raw_password' => 'password',
            'password' => Hash::make('password'),
            'status' => 'online'
        ]);

        DB::table('admins')->insert([
            'user_id' => 1,
            'personnel_id' => 'SUPERADMIN001',
            'title' => 'Mr',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => config('custom_values.admin_email'),
            'raw_password' => 'password',
            'password' => Hash::make('password'),
        ]);
    }
}
