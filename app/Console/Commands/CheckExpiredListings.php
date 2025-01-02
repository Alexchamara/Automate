<?php

namespace App\Console\Commands;

use App\Models\Listing;
use Illuminate\Console\Command;

class CheckExpiredListings extends Command
{
    protected $signature = 'listings:check-expired';
    protected $description = 'Check and update expired listings';

    public function handle()
    {
        Listing::where('status', 'approved')
            ->where('isActive', true)
            ->where('expiration_date', '<=', now())
            ->update([
                'status' => 'expired',
                'status_updated_at' => now(),
                'isActive' => false
            ]);

        $this->info('Listings expired successfully');
    }
}
