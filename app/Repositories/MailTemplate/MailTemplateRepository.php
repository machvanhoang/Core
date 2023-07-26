<?php

namespace App\Repositories\MailTemplate;

use App\Models\MailTemplate;
use App\Repositories\BaseRepository;

class MailTemplateRepository extends BaseRepository implements MailTemplateRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return MailTemplate::class;
    }
}
