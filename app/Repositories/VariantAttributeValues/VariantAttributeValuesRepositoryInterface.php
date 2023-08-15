<?php

namespace App\Repositories\VariantAttributeValues;

use App\Repositories\RepositoryInterface;

interface VariantAttributeValuesRepositoryInterface extends RepositoryInterface
{
    public function getProductVariantByProduct(int $productId);
}
