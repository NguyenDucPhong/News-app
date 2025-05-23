<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
        'is_verified',
        'subscribed_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    const CREATED_AT = 'subscribed_at';
    const UPDATED_AT = null;

}
