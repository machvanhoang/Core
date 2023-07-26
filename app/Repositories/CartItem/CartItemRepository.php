<?php

namespace App\Repositories\CartItem;

use App\Models\CartItem;
use App\Repositories\BaseRepository;

class CartItemRepository extends BaseRepository implements CartItemRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return CartItem::class;
    }
}