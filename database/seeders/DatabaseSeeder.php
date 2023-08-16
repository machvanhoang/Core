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
            ConfigSeeder::class,
            OrderStatusSeeder::class,
            CustomerStatusSeeder::class,
            PaymentMethodSeeder::class,
            EmailTypeSeeder::class,
            EmailTemplateSeeder::class,
            UserSeeder::class,
            PageSeeder::class,
            CategorySeeder::class,
        ]);
        \App\Models\Counpon::factory(20)->create();
        \App\Models\Customer::factory(20)->create();
        \App\Models\Product::factory(20)->create();
        \App\Models\ProductVariant::factory(20)->create();
        \App\Models\ProductFavorite::factory(20)->create();
        \App\Models\Post::factory(20)->create();
        \App\Models\Comment::factory(20)->create();
        $this->call([
            AttributeSeeder::class,
            TagsSeeder::class,
        ]);
    }
}
