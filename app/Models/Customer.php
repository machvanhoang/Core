<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'customer';
    protected $fillable = [
        'customer_status_id',
        'full_name',
        'phone',
        'email',
        'address',
        'media_id',
        'username',
        'verify_code',
        'password',
        'remember_token',
        'created_at'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function status()
    {
        return $this->belongsTo(CustomerStatus::class, 'customer_status_id', 'id');
    }
}
