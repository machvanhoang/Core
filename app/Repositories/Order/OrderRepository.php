<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Order::class;
    }
}