<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantAttributeValues extends Model
{
    use HasFactory;
    protected $table = 'variant_attribute_values';
    protected $fillable = ['product_variant_id', 'attribute_value_id'];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
    }
}
