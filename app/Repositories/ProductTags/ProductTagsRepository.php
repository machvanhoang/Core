<?php

namespace App\Repositories\ProductTags;

use App\Models\ProductTags;
use App\Repositories\BaseRepository;

class ProductTagsRepository extends BaseRepository implements ProductTagsRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return ProductTags::class;
    }
    public function getByProduct(int $productId)
    {
        return $this->model->where('product_id', $productId)->get();
    }
    public function deleteProductTags(int $productId, array $tagsIds = [])
    {
        return $this->model->where('product_id', $productId)->whereNotIn('id', $tagsIds)->delete();
    }
}
