<?php

namespace App\Repositories\OrderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepository;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return OrderDetail::class;
    }
}
