<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'type' => 'Contact',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Oders',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Notifications',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Verify Email',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type' => 'Forgot Password',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('mail_type')->insert($data);
    }
}
