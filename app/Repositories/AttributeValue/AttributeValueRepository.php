<?php

namespace App\Repositories\AttributeValue;

use App\Models\AttributeValue;
use App\Repositories\BaseRepository;

class AttributeValueRepository extends BaseRepository implements AttributeValueRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return AttributeValue::class;
    }
    public function getAttributeValueByProduct(int $productId)
    {
        return $this->model->with(['attribute'])
            ->whereHas('attribute', function ($query) use ($productId) {
                $query->where('product_id', $productId);
            })->get();
    }
}
