<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin#123'),
            'status' => PUBLISHED,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('user')->insert([
            'username' => 'content',
            'name' => 'Content',
            'email' => 'content@gmail.com',
            'password' => bcrypt('content#123'),
            'status' => PRIVATED,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
