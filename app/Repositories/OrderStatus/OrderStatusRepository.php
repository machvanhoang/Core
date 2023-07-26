<?php

namespace App\Repositories\OrderStatus;

use App\Models\OrderStatus;
use App\Repositories\BaseRepository;

class OrderStatusRepository extends BaseRepository implements OrderStatusRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return OrderStatus::class;
    }
}
