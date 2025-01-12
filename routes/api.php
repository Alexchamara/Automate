<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\CheckoutController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/', function () {
//     return 'API';
// });
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
// });

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Public routes
Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Logged in user routes
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

    // Listing routes
    Route::post('/listings/store', [ListingController::class, 'store'])->name('listings.store');    // Create a new listing
    Route::put('/listings/update/{listing}', [ListingController::class, 'update'])->name('listings.update');   // Update a listing
    Route::delete('/listings/destroy/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');  // Delete a listing

    // Checkout routes
    Route::get('/checkout/{plan?}', [CheckoutController::class, '__invoke'])->name('api.checkout');
    Route::get('/payment/success', [CheckoutController::class, 'success'])->name('api.payment.success');
});


