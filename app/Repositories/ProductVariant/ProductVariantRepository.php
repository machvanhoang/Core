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
}
