<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'order_status_id',
        'payment_method_id',
        'customer_id',
        'counpon_id',
        'province_id',
        'district_id',
        'ward_id',
        'code',
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