<?php

namespace App\Repositories\Attributes;

use App\Repositories\RepositoryInterface;

interface AttributesRepositoryInterface extends RepositoryInterface
{
    public function getAttributeByProduct(int $productId);
}
