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
        \App\Models\Media::factory(50)->create();
        $this->call([
            AttributeSeeder::class,
            OrderStatusSeeder::class,
            CustomerStatusSeeder::class,
            PaymentMethodSeeder::class,
            EmailTypeSeeder::class,
            EmailTemplateSeeder::class,
            UserSeeder::class,
            PageSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            CategorySeeder::class,
        ]);
        \App\Models\Counpon::factory(100)->create();
        \App\Models\Customer::factory(10)->create();
        \App\Models\Product::factory(100)->create();
        \App\Models\ProductVariant::factory(100)->create();
        \App\Models\ProductFavorite::factory(50)->create();
        \App\Models\Post::factory(100)->create();
        \App\Models\Comment::factory(100)->create();
    }
}
