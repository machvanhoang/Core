<?php

namespace App\Repositories\AttributeValue;

use App\Repositories\RepositoryInterface;

interface AttributeValueRepositoryInterface extends RepositoryInterface
{
    public function getAttributeValueByProduct(int $productId);
}
