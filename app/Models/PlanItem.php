<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Plans;

class PlanItem extends Model
{
    protected $fillable = [
        'plan_id',
        'price_name',
        'feature',
        'stripe_price_id',
        'price',
        'is_recurring',
        'billing_period',
        'is_active'
    ];
    
    protected $casts = [
        'is_recurring' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function plan()
    {
        return $this->belongsTo(Plans::class, 'plan_id');
    }
}
