<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_status_id' => 1,
            'full_name' => fake()->name(),
            'phone' => '0987654321',
            'email' => fake()->unique()->safeEmail(),
            'address' =>  Str::random(100),
            'avatar' => Str::random(10) . ".jpg",
            'username' => Str::random(5),
            'password' => bcrypt('customer'),
            'remember_token' => null,
            'email_verified_at' => null,
        ];
    }
}
