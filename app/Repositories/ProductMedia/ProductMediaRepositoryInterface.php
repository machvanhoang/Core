<?php

namespace App\Repositories\ProductMedia;

use App\Repositories\RepositoryInterface;

interface ProductMediaRepositoryInterface extends RepositoryInterface
{
    public function getAllMediaByProduct(int $productId = 0);
    public function getMediaByProduct(int $productId = 0, int $mediaId = 0);
    public function deleteByProduct(int $productId = 0, array $listMediaId = []);
}
