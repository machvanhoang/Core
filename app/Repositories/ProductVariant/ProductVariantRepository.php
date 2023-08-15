<?php

namespace App\Repositories\ProductVariant;

use App\Models\ProductVariant;
use App\Repositories\BaseRepository;

class ProductVariantRepository extends BaseRepository implements ProductVariantRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return ProductVariant::class;
    }
    public function getVariantByProduct(int $productId)
    {
        $query = $this->model->with([
            'product',
            'attributeValues',
        ])
            ->whereProductId($productId);
        return $query->get();
    }
}
