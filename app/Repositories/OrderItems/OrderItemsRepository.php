<?php

namespace App\Repositories\OrderItems;

use App\Models\OrderItems;
use App\Repositories\BaseRepository;

class OrderItemsRepository extends BaseRepository implements OrderItemsRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return OrderItems::class;
    }
}
