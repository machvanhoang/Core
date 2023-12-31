<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTags extends Model
{
    use HasFactory;
    protected $table = 'product_tags';
    protected $fillable = ['tag_id', 'product_id'];
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
