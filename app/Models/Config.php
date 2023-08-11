<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'config';
    protected $fillable = [
        'title', 'address', 'email', 'hotline', 'phone', 'zalo', 'website', 'fanpage', 'slogan', 'copyright', 'google_map', 'google_analytics', 'google_mastertool', 'head_js', 'body_js',
    ];
}
