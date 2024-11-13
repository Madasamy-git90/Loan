<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'developer', // Username
            'email' => 'developer@example.com', // A unique email
            'password' => Hash::make('Test@Password123#'), // Hashed password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

