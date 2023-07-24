<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            'name' => fake()->unique()->name(),
            'slug' => Str::slug(fake()->unique()->name()),
            'description' => Str::random(200),
            'content' => Str::random(1000),
            'type' => 'product',
            'inventory' => 1000,
            'media_id' => 1,
        ];
    }
}