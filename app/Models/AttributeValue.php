<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table = 'attribute_values';
    protected $fillable = ['attribute_id', 'attribute_value', 'sort'];
    public function attribute()
    {
        return $this->hasOne(Attributes::class, 'id', 'attribute_id');
    }
}
