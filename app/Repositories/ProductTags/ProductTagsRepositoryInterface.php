<?php

namespace App\Repositories\ProductTags;

use App\Repositories\RepositoryInterface;

interface ProductTagsRepositoryInterface extends RepositoryInterface
{
    public function getByProduct(int $productId);
    public function deleteProductTags(int $productId, array $tagsIds = []);
}
