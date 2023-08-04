<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $table = 'seo';
    protected $fillable = ['table', 'parent_id', 'title', 'keyword', 'description', 'url', 'type', 'image', 'fb_image', 'tw_image', 'pr_image', 'ig_image', 'lk_image'];
}
