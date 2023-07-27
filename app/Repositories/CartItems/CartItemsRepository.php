<?php

namespace App\Repositories\CartItems;

use App\Models\CartItems;
use App\Repositories\BaseRepository;

class CartItemsRepository extends BaseRepository implements CartItemsRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return CartItems::class;
    }
}