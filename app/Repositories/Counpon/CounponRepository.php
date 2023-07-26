<?php

namespace App\Repositories\Counpon;

use App\Models\Counpon;
use App\Repositories\BaseRepository;

class CounponRepository extends BaseRepository implements CounponRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Counpon::class;
    }
}
