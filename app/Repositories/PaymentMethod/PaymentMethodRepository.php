<?php

namespace App\Repositories\PaymentMethod;

use App\Models\PaymentMethod;
use App\Repositories\BaseRepository;

class PaymentMethodRepository extends BaseRepository implements PaymentMethodRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return PaymentMethod::class;
    }
}
