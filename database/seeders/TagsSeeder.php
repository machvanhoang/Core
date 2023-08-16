<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataTags = [
            [
                'table' => 'product',
                'type' => 'product',
                'name' => 'Iphone 14',
                'slug' => 'iphone-14',
                'description' => null,
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table' => 'product',
                'type' => 'product',
                'name' => 'Iphone 15',
                'slug' => 'iphone-15',
                'description' => null,
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table' => 'product',
                'type' => 'product',
                'name' => 'Iphone 6',
                'slug' => 'iphone-6',
                'description' => null,
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table' => 'product',
                'type' => 'product',
                'name' => 'Iphone 7',
                'slug' => 'iphone-7',
                'description' => null,
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table' => 'product',
                'type' => 'product',
                'name' => 'Iphone 8',
                'slug' => 'iphone-8',
                'description' => null,
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table' => 'product',
                'type' => 'product',
                'name' => 'Iphone 10',
                'slug' => 'iphone-10',
                'description' => null,
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'table' => 'product',
                'type' => 'product',
                'name' => 'Iphone 11',
                'slug' => 'iphone-11',
                'description' => null,
                'media_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('tags')->insert($dataTags);
        $productTags = [
            [
                'tag_id' => 1,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 2,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 3,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 4,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 5,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('product_tags')->insert($productTags);
    }
}
