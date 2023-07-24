<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'parent_id' => 0,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sam Sung',
                'slug' => 'sam-sung',
                'parent_id' => 0,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Oppo',
                'slug' => 'oppo',
                'parent_id' => 0,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Iphone',
                'slug' => 'iphone',
                'parent_id' => 1,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ipad',
                'slug' => 'ipad',
                'parent_id' => 1,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'TV',
                'slug' => 'tv',
                'parent_id' => 1,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Iphone 11',
                'slug' => 'iphone-11',
                'parent_id' => 4,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Iphone 13 Promax',
                'slug' => 'iphone-13-promax',
                'parent_id' => 4,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Iphone 14 Promax',
                'slug' => 'iphone-14-promax',
                'parent_id' => 4,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Galaxy',
                'slug' => 'galaxy',
                'parent_id' => 2,
                'desc' => Str::random(100),
                'media_id' => null,
                'sort' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('categories')->insert($data);
    }
}