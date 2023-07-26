<?php

namespace App\Repositories\MailHistory;

use App\Models\MailHistory;
use App\Repositories\BaseRepository;

class MailHistoryRepository extends BaseRepository implements MailHistoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return MailHistory::class;
    }
}
