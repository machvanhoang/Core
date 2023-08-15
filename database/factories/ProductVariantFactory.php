<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'sku' => 'SP0' . rand(1, 1000),
            'inventory' => rand(1, 1000),
            'regular_price' => rand(100000, 100000000),
            'sale_price' => rand(100000, 100000000),
        ];
    }
}
