<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'ward';
    protected $fillable = ['province_id', 'district_id', 'name', 'slug', 'code', 'level', 'status', 'sort'];
}