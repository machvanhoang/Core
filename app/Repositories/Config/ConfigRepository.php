<?php

namespace App\Repositories\Config;

use App\Models\Config;
use App\Repositories\BaseRepository;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Config::class;
    }
}
