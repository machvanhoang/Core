<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Black', 'Blue', 'Green', 'Yellow', 'Skyblue', 'Red', 'Gray'];
        foreach ($data as $key => $item) {
            DB::table('color')->insert([
                'name' => $item,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}