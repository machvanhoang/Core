<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantAttributes extends Model
{
    use HasFactory;
    protected $table = 'variant_attributes';
    protected $fillable = ['product_variant_id', 'product_attribute_id'];
}
