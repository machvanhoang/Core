<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $fillable = ['alt', 'caption', 'type', 'extention', 'file_name', 'sort', 'status'];
    public function getUrlAttribute()
    {
        $fileName = route('index') . "/" . UPLOADS . "/" . $this->type . "/" . $this->file_name;
        return $fileName;
    }
}
