<?php

namespace App\Services;

use App\Traits\EmailTemplateTrait;
use Illuminate\Support\Facades\DB;
use App\Models\MailTemplate;
use App\Repositories\MailTemplate\MailTemplateRepositoryInterface;

class EmailService
{
    public function __construct(
        private MailTemplateRepositoryInterface $mailTemplateRepository
    ) {
    }
    public function getEmails()
    {
        return $this->mailTemplateRepository->getAll();
    }
    public function getContent(MailTemplate $email)
    {
        return EmailTemplateTrait::getFileContent($email);
    }
    public function update(array $data = [], MailTemplate $email): array
    {
        try {
            DB::beginTransaction();
            $email->update($data);
            $upload = EmailTemplateTrait::updateBlade($email, $data['content']);
            if (!$upload) {
                DB::rollBack();
                return [
                    'error' => false,
                    'message' => 'Updated email template  wrong.',
                ];
            }
            DB::commit();
            return [
                'success' => true,
                'message' => 'Updated email template success.',
            ];
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => 'Cannot update email template.',
            ];
        }
    }
}
