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
    public function getMediaByProduct(int $productId = 0, int $mediaId = 0)
    {
        return $this->model->with(['product', 'media'])
            ->where([
                'media_id' => $mediaId,
                'product_id' => $productId,
            ])->first();
    }
    public function deleteByProduct(int $productId = 0, array $listMediaId = [])
    {
        $query = $this->model->where([
            'product_id' => $productId,
        ]);
        if (!empty($listMediaId)) {
            $query = $query->whereIn('media_id', $listMediaId);
        }
        $query->delete();
        return true;
    }
}
