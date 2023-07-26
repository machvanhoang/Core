<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Repositories\BaseRepository;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Cart::class;
    }
}