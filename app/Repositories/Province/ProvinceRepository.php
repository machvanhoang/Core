<?php

namespace App\Repositories\Province;

use App\Models\Province;
use App\Repositories\BaseRepository;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Province::class;
    }
}
