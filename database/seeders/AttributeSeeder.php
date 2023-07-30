<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Color',
                'type' => 'using',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Size',
                'type' => 'using',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kilogram',
                'type' => 'using',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        foreach ($data as $key => $item) {
            $attirbuteId = DB::table('attributes')->insertGetId($item);
            if ($attirbuteId) {
                $running = rand(2, 9);
                for ($i = 0; $i < $running; $i++) {
                    DB::table('attribute_values')->insert([
                        'attribute_id' => $attirbuteId,
                        'attribute_value' => Str::random(8),
                        'sort' => ($i + 1),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
