<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'News',
                'class_name' => 'News',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pending',
                'class_name' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cancel',
                'class_name' => 'Cancel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Complete',
                'class_name' => 'Complete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Delivery',
                'class_name' => 'Delivery',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('order_status')->insert($data);
    }
}
