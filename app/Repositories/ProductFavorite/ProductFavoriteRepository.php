<?php

namespace App\Repositories\ProductFavorite;

use App\Models\ProductFavorite;
use App\Repositories\BaseRepository;

class ProductFavoriterRepository extends BaseRepository implements ProductFavoriteRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return ProductFavorite::class;
    }
}
