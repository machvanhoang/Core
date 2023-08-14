<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    use HasFactory;
    protected $table = 'product_media';
    protected $fillable = ['product_id', 'media_id', 'sort'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
