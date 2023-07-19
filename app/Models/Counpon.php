<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counpon extends Model
{
    use HasFactory;
    protected $table = 'counpon';
    protected $fillable = ['code', 'start_date', 'end_date', 'percentage', 'usage_limit', 'usage_limit_user', 'conditions', 'description', 'usage_count', 'status'];
}