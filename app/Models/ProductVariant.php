<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'product_variants';
    protected $fillable = ['product_id', 'sku', 'inventory', 'regular_price', 'sale_price'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    /**
     * Summary of attributeValues
     *
     * @return BelongsToMany
     */
    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'variant_attribute_values', 'product_variant_id', 'attribute_value_id');
    }
}
