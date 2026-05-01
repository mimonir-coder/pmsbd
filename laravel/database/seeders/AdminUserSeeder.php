<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Khalid Hossain',
            'email' => 'kadmin@gmail.com',
            'mobile' => '01720279279',
            'type' => 'Super Admin',
            'status' => 'Active',
            'password' => Hash::make('password'),
        ]);
    }
}
