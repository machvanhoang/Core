<?php

namespace App\Repositories\ProductMedia;

use App\Repositories\RepositoryInterface;

interface ProductMediaRepositoryInterface extends RepositoryInterface
{
    public function getAllMediaByProduct(int $productId = 0);
}
