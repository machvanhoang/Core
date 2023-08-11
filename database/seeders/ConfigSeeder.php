<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('config')->insert([
            'title' => 'Thiết kế website Hoàng Anh Ads',
            'address' => '229/17 P. Tân Quý, Q. Tân Phú, TP Hồ Chí Minh',
            'email' => 'hoangmach.website@gmail.com',
            'hotline' => '0969874264',
            'phone' => '0969874264',
            'zalo' => '0969874264',
            'website' => 'https://hoanganhweb.com',
            'fanpage' => 'https://www.facebook.com',
            'slogan' => 'Thiết kế website tốt nhất Tp Hồ Chí Minh',
            'copyright' => 'Hoang Anh Web',
            'google_map' => null,
            'google_analytics' => null,
            'google_mastertool' => null,
            'head_js' => null,
            'body_js' => null,
        ]);
    }
}
