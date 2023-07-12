<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_method')->insert([
            'name' => 'Cash',
            'desc' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
