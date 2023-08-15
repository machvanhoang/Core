<?php

namespace App\Repositories\VariantAttributeValues;

use App\Models\VariantAttributeValues;
use App\Repositories\BaseRepository;

class VariantAttributeValuesRepository extends BaseRepository implements VariantAttributeValuesRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return VariantAttributeValues::class;
    }
    public function getProductVariantByProduct(int $productId)
    {
        $query = $this->model->with(
            [
                'productVariant' => function ($query) {
                    $query->with(['product']);
                },
            ]
        )->whereHas('productVariant', function ($query) use ($productId) {
            $query->whereHas('product', function ($query) use ($productId) {
                $query->where('id', $productId);
            });
        });
        return $query->get();
    }
}
