<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CustomerStatusSeeder::class,
            PaymentMethodSeeder::class,
            EmailTypeSeeder::class,
            EmailTemplateSeeder::class,
            UserSeeder::class,
        ]);
        \App\Models\Customer::factory(10)->create();
    }
}
