<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $fillable = ['product_id', 'name'];
    public function attributeValue()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id', 'id');
    }
}
