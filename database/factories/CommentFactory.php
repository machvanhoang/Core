<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'content' => Str::random(100),
            'like' => rand(100, 500),
            'dislike' => rand(1, 5),
            'report' => rand(1, 5),
            'start' => rand(1, 5),
            'media_id' => null,
            'view' => rand(100, 19999),
            'status' => 'published'
        ];
    }
}