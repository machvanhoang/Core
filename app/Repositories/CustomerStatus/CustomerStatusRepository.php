<?php

namespace App\Repositories\CustomerStatus;

use App\Models\CustomerStatus;
use App\Repositories\BaseRepository;

class CustomerStatusRepository extends BaseRepository implements CustomerStatusRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return CustomerStatus::class;
    }
}
