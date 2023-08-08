<?php

namespace App\Repositories\Attributes;

use App\Models\Attributes;
use App\Repositories\BaseRepository;

class AttributesRepository extends BaseRepository implements AttributesRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Attributes::class;
    }
    /**
     * @return mixed
     */
    public function getByType()
    {
        return $this->model->with(['attributeValue'])->whereType('using')->get();
    }
}
