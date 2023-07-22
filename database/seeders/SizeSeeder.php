<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [35, 36, 37, 38, 29, 40, 41];
        foreach ($data as $key => $item) {
            DB::table('size')->insert([
                'name' => $item,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}