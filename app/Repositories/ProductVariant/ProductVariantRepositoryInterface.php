<?php

namespace App\Repositories\ProductVariant;

use App\Repositories\RepositoryInterface;

interface ProductVariantRepositoryInterface extends RepositoryInterface
{
    public function getVariantByProduct(int $productId);
}
