<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\BaseRepository;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Customer::class;
    }
}
