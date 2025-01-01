<?php

namespace Database\Seeders;

use App\Models\Advert;
use Illuminate\Database\Seeder;

class AdvertSeeder extends Seeder
{
    public function run(): void
    {
        $adverts = [
            [
                'make' => 'Toyota',
                'model' => 'Corolla',
                'registrationYear' => 2019,
                'mileage' => 45000,
                'condition' => 'Used',
                'engine' => '1800cc',
                'color' => 'White',
                'bodyType' => 'Sedan',
                'transmission' => 'Automatic',
                'fuelType' => 'Petrol',
                'price' => 5500000.00,
                'description' => 'Well maintained Toyota Corolla for sale',
                'contactNumber' => '0777123456',
                'advertEmail' => 'seller1@example.com',
                'location' => 'Colombo',
                'images' => json_encode(['car1.jpg', 'car2.jpg']),
            ],
            [
                'make' => 'Honda',
                'model' => 'Civic',
                'registrationYear' => 2020,
                'mileage' => 35000,
                'condition' => 'Used',
                'engine' => '1500cc',
                'color' => 'Black',
                'bodyType' => 'Sedan',
                'transmission' => 'Automatic',
                'fuelType' => 'Petrol',
                'price' => 6500000.00,
                'description' => 'Honda Civic in excellent condition',
                'contactNumber' => '0777234567',
                'advertEmail' => 'seller2@example.com',
                'location' => 'Kandy',
                'images' => json_encode(['civic1.jpg', 'civic2.jpg']),
            ],
        ];

        foreach ($adverts as $advert) {
            Advert::create($advert);
        }
    }
}