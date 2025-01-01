<?php
namespace Database\Seeders;
use App\Models\Advert;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdvertSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $makes = ['Toyota', 'Honda', 'Nissan', 'BMW', 'Mercedes', 'Audi', 'Volkswagen', 'Ford'];
        $models = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4', 'Prius'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'HR-V'],
            'Nissan' => ['X-Trail', 'Qashqai', 'Leaf', 'Juke'],
            'BMW' => ['3 Series', '5 Series', 'X3', 'X5'],
            'Mercedes' => ['C-Class', 'E-Class', 'GLC', 'GLE'],
            'Audi' => ['A3', 'A4', 'Q3', 'Q5'],
            'Volkswagen' => ['Golf', 'Passat', 'Tiguan', 'T-Roc'],
            'Ford' => ['Focus', 'Fiesta', 'Kuga', 'Puma']
        ];

        for ($i = 0; $i < 25; $i++) {
            $make = $faker->randomElement($makes);
            $advert = [
                'make' => $make,
                'model' => $faker->randomElement($models[$make]),
                'registrationYear' => $faker->numberBetween(2015, 2024),
                'mileage' => $faker->numberBetween(0, 100000),
                'condition' => $faker->randomElement(['Brand New', 'Used', 'Reconditioned']),
                'engine' => $faker->randomElement(['1000cc', '1500cc', '2000cc', '2500cc', '3000cc']),
                'color' => $faker->randomElement(['Black', 'White', 'Silver', 'Blue', 'Red', 'Grey']),
                'bodyType' => $faker->randomElement(['Sedan', 'SUV', 'Hatchback', 'Coupe', 'Wagon']),
                'transmission' => $faker->randomElement(['Automatic', 'Manual']),
                'fuelType' => $faker->randomElement(['Petrol', 'Diesel', 'Hybrid', 'Electric']),
                'price' => $faker->numberBetween(1000000, 10000000),
                'description' => $faker->paragraph(),
                'contactNumber' => $faker->phoneNumber(),
                'advertEmail' => $faker->email(),
                'location' => $faker->city(),
                'images' => json_encode(['car'.($i+1).'.jpg', 'car'.($i+1).'b.jpg']),
            ];
            Advert::create($advert);
        }
    }
}