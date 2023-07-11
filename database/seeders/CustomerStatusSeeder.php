<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Privated',
                'class_name' => 'Privated',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Published',
                'class_name' => 'Published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blocked',
                'class_name' => 'Blocked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('customer_status')->insert($data);
    }
}
