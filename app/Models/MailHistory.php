<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailHistory extends Model
{
    use HasFactory;
    protected $table = 'mail_histories';
    protected $fillable = ['subject', 'blade_file', 'content', 'type', 'object_id'];
}