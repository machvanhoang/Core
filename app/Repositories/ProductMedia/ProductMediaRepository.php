<?php

namespace App\Repositories\ProductMedia;

use App\Models\ProductMedia;
use App\Repositories\BaseRepository;

class ProductMediaRepository extends BaseRepository implements ProductMediaRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return ProductMedia::class;
    }
    public function getAllMediaByProduct(int $productId = 0)
    {
        return $this->model->with(['product', 'media'])
            ->where('product_id', $productId)->get();
    }
}
