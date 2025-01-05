<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $table = 'listing';

    protected $fillable = [
        'user_id',
        'advert_id',
        'status',
        'status_updated_at',
        'isActive',
        'payment_status',
        'payment_status_updated_at',
    ];

    protected $casts = [
        'status_updated_at' => 'datetime',
        'isActive' => 'boolean'
    ];

    // Relationships
    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
