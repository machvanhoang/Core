<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alt' => Str::random(10),
            'caption' => Str::random(8),
            'type' => 'media',
            'extention' => 'jpg',
            'file_name' => Str::random(5) . ".jpg",
            'sort' => '1',
            'status' => 1,
        ];
    }
}
