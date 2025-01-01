<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        $listings = [
            [
                'user_id' => 1,
                'advert_id' => 1,
                'status' => 'pending',
                'isActive' => true,
                'status_updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'advert_id' => 2,
                'status' => 'approved',
                'isActive' => true,
                'status_updated_at' => now(),
            ],
        ];

        foreach ($listings as $listing) {
            Listing::create($listing);
        }
    }
}