<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Advert;
use App\Models\User;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $adverts = Advert::all();

        foreach ($adverts as $advert) {
            Listing::create([
                'user_id' => $users->random()->id,
                'advert_id' => $advert->id,
                'status' => 'approved',
                'isActive' => true,
                'status_updated_at' => now(),
            ]);
        }
    }
}