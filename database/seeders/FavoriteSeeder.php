<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use App\Models\Favorite;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $listings = Listing::all();

        foreach($users as $user) {
            // Add 2-3 random favorites for each user
            $randomListings = $listings->random(rand(2, 3));
            foreach($randomListings as $listing) {
                Favorite::create([
                    'user_id' => $user->id,
                    'listing_id' => $listing->id
                ]);
            }
        }
    }
}