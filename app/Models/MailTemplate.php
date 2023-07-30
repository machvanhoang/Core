<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    use HasFactory;
    protected $table = 'mail_templates';
    protected $fillable = ['mail_type_id', 'subject', 'blade_file'];
    public function mailType()
    {
        return $this->belongsTo(MailType::class);
    }
}
