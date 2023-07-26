<?php

namespace App\Repositories\District;

use App\Models\District;
use App\Repositories\BaseRepository;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return District::class;
    }
}
