<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => "admin",
            'email' => "admin@cms.com",
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
    }
}
