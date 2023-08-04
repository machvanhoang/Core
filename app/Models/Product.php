<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product';
    protected $fillable = ['user_id', 'name', 'slug', 'description', 'content', 'regular_price', 'sale_price', 'sku', 'inventory', 'media_id', 'type', 'status'];
    public function seo()
    {
        return $this->hasOne(Seo::class, 'parent_id', 'id')->where('table', $this->table)->first();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
