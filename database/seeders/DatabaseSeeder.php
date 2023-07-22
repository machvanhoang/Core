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
            OrderStatusSeeder::class,
            CustomerStatusSeeder::class,
            PaymentMethodSeeder::class,
            EmailTypeSeeder::class,
            EmailTemplateSeeder::class,
            UserSeeder::class,
            PageSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
        ]);
        \App\Models\Counpon::factory(100)->create();
        \App\Models\Customer::factory(10)->create();
    }
}
