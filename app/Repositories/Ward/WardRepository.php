<?php

namespace App\Repositories\Ward;

use App\Models\Ward;
use App\Repositories\BaseRepository;

class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Ward::class;
    }
}
