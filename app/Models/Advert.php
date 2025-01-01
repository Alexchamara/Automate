<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advert extends Model
{
    use HasFactory;

    protected $table = 'advert';

    protected $fillable = [
        'make',
        'model',
        'registrationYear',
        'mileage',
        'condition',
        'engine',
        'color',
        'bodyType',
        'transmission',
        'fuelType',
        'price',
        'description',
        'contactNumber',
        'advertEmail',
        'location',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function listing()
    {
        return $this->hasOne(Listing::class);
    }
}