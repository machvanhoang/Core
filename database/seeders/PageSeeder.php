<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'desc' => Str::random(100),
                'content' => 'Privated',
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'About',
                'desc' => Str::random(100),
                'content' => 'Published',
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blocked',
                'desc' => Str::random(100),
                'content' => 'Blocked',
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('page')->insert($data);
    }
}