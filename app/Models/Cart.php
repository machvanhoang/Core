<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'cart_key',
        'payment_method_id',
        'customer_id',
        'counpon_id',
        'province_id',
        'district_id',
        'ward_id',
        'full_name',
        'address',
        'phone',
        'email',
        'requirements',
        'notes',
        'date_complete',
        'point',
        'ship',
        'temp_price',
        'total_price',
        'sort'
    ];
}