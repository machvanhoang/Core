<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Traits\EmailTemplateTrait;
use App\Enums\EmailType;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'mail_type_id' => EmailType::CONTACT->value,
                'subject' => 'Contact',
                'blade_file' => 'contact',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::ORDERS->value,
                'subject' => 'Orders',
                'blade_file' => 'orders',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::NOFICATIONS->value,
                'subject' => 'Notifications',
                'blade_file' => 'notifications',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::VERIFY_EMAIL->value,
                'subject' => 'Verify Email',
                'blade_file' => 'verify_email_register',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::FORGOT_PASSWORD->value,
                'subject' => 'Forgot Password',
                'blade_file' => 'forgot_password',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('mail_templates')->insert($data);
    }
}
