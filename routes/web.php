<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard\ChangePassword;
use App\Http\Controllers\WebhookController;
use Illuminate\Http\Request;
use App\Models\Listing;

Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/service', [PageController::class, 'service'])->name('pages.service');
Route::get('/shop', [PageController::class, 'shop'])->name('pages.shop');
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Advert routes
    Route::get('/advert-form', [PageController::class, 'advertForm'])->name('pages.advert-form');
    Route::post('/advert-create', [ListingController::class, 'store'])->name('advert.store');
    Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
    Route::get('/advert/{listing}/edit', [ListingController::class, 'edit'])->name('advert.edit');
    Route::put('/advert/{listing}', [ListingController::class, 'update'])->name('advert.update');
    Route::delete('/advert/{listing}', [ListingController::class, 'destroy'])->name('advert.destroy');
    Route::post('/listings/{listing}/favorite', [ListingController::class, 'toggleFavorite'])->name('listings.favorite');

    //payment routes
    Route::get('/pricing', function (Request $request) {
        $listingId = $request->query('listing_id');
        $listing = Listing::findOrFail($listingId);
    
        return view('pricing', ['listing' => $listing]);
    })->name('pricing');
    Route::get('/payment/success', [CheckoutController::class, 'success'])->name('payment.success');    
    Route::get('/checkout/{plan?}', CheckoutController::class)->name('checkout');
});

require __DIR__.'/auth.php';
