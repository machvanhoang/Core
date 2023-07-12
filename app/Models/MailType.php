<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailType extends Model
{
    use HasFactory;
    protected $table = 'mail_type';
    protected $fillable = ['type'];
}
