<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Footer',
                'desc' => 'Desc',
                'content' => 'Privated',
                'media_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'About',
                'desc' => 'Desc',
                'content' => 'Published',
                'media_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blocked',
                'desc' => 'Desc',
                'content' => 'Blocked',
                'media_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('page')->insert($data);
    }
}