<?php

namespace Database\Seeders;

use App\Models\Attributes;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataAttribute = [
            [
                'name' => 'Color',
                'product_id' => 1,
            ],
            [
                'name' => 'Size',
                'product_id' => 1,
            ],
        ];
        $dataAttributeSize = [
            36,
            38,
            40,
        ];
        $dataAttributeColor = [
            'Red',
            'Blue',
        ];
        foreach ($dataAttribute as $key => $item) {
            $attribute = Attributes::create($item);
            $data = $dataAttributeSize;
            if ($attribute->name === 'Color') {
                $data = $dataAttributeColor;
            }
            foreach ($data as $keyAV => $itemAV) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'attribute_value' => $itemAV,
                ]);
            }
        }
    }
}
