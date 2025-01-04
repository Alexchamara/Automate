<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard\ChangePassword;

Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/service', [PageController::class, 'service'])->name('pages.service');
Route::get('/shop', [PageController::class, 'shop'])->name('pages.shop');
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

// Route::middleware(['auth'])->group(function () {
//     // ...existing code...
//     Route::get('/change-password', ChangePassword::class)->name('password.change');
//     // ...existing code...
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
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
});


// Route::get('/pricing', function () {
//     return view('pricing');
// })->middleware(['auth', 'verified'])->name('pricing');

Route::get('/checkout/{plan?}', CheckoutController::class)
->middleware(['auth', 'verified'])->name('checkout');

Route::view('/payment/success', 'pages.payment-success')->name('payment.success');
Route::view('/pricing', 'pricing')->name('pricing');

require __DIR__.'/auth.php';
