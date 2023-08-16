<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class SalePriceLessThanOrEqualRegularPrice implements Rule
{
    public function passes($attribute, $value)
    {
        $regularPrice = request()->input('regular_price');
        return $value <= $regularPrice;
    }

    public function message()
    {
        return 'The sale price must be less than or equal to the regular price.';
    }
}
