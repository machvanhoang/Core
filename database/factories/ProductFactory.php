<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Media;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [
            'user_id' => null,
            'slug' => null,
            'name' => fake()->unique()->name(),
            'description' => Str::random(10),
            'content' => Str::random(10),
            'type' => 'product',
            'sku' => Str::random(10),
            'regular_price' => rand(100000, 100000000),
            'sale_price' => rand(100000, 100000000),
            'inventory' => rand(1, 1000),
            'media_id' => Media::inRandomOrder()->first()->id,
            'status' => PRIVATED,
        ];
        return $data;
    }
}
