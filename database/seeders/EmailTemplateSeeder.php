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
                'content' => 'Contact',
                'blade_file' => EmailTemplateTrait::formatEmailTemplateFileName('Contact'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::ORDERS->value,
                'subject' => 'Orders',
                'content' => 'Orders',
                'blade_file' => EmailTemplateTrait::formatEmailTemplateFileName('Orders'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::NOFICATIONS->value,
                'subject' => 'Notifications',
                'content' => 'Notifications',
                'blade_file' => EmailTemplateTrait::formatEmailTemplateFileName('Notifications'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::VERIFY_EMAIL->value,
                'subject' => 'Verify Email',
                'content' => 'Verify Email',
                'blade_file' => EmailTemplateTrait::formatEmailTemplateFileName('Verify Email'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'mail_type_id' => EmailType::FORGOT_PASSWORD->value,
                'subject' => 'Forgot Password',
                'content' => 'Forgot Password',
                'blade_file' => EmailTemplateTrait::formatEmailTemplateFileName('Forgot Password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('mail_templates')->insert($data);
    }
}
