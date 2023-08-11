<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_method')->insert([
            'name' => 'Cash',
            'description' => Str::random(100),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
