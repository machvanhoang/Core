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
    public function getAttributeByProduct(int $productId)
    {
        return $this->model->with(['attributeValue'])->whereProductId($productId)->get();
    }
}
