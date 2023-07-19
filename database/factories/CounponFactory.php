<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Counpon>
 */
class CounponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => Str::random(5),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(10),
            'percentage' => 5,
            'usage_limit' => 1000,
            'usage_limit_user' => 1,
            'conditions' => null,
            'description' => 'Lorem vn',
            'usage_count' => 1,
            'status' => 'published',
        ];
    }
}