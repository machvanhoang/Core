<?php

namespace App\Repositories\Seo;

use App\Models\Seo;
use App\Repositories\BaseRepository;

class SeoRepository extends BaseRepository implements SeoRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Seo::class;
    }
}
