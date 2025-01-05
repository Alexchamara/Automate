<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PlanItem;

class Plans extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'currency',
        'billing_period',
        'is_recurring',
        'price_description',
        'stripe_product_id'
    ];
    
    protected $casts = [
        'is_recurring' => 'boolean',
    ];

    public function planItems()
    {
        return $this->hasMany(PlanItem::class, 'plan_id');
    }
}
