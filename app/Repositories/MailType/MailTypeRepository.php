<?php

namespace App\Repositories\MailType;

use App\Models\MailType;
use App\Repositories\BaseRepository;

class MailTypeRepository extends BaseRepository implements MailTypeRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return MailType::class;
    }
}
