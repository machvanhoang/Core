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
}
