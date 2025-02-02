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
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\PasswordController;

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
Route::get('/listings', [ApiController::class, 'showListing'])->name('all.listings.show');
Route::get('/listings/{listing}', [ApiController::class, 'showListing'])->name('api.listings.show'); //show all the listings ine shop page

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Logged in user routes
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::put('/update/password', [PasswordController::class, 'update'])->name('password.update');
    Route::put('/profile/update', [ApiController::class, 'updateProfile'])->name('api.profile.update');

    Route::get('/user/listings', [ApiController::class, 'userListings'])->name('api.user.listings'); // Get user listings
    Route::patch('/listings/{listing}/toggle-status', [ApiController::class, 'toggleActiveStatus'])->name('api.listings.toggle-status'); // Toggle listing status

    //admin routes
    Route::get('/listings/all', [ApiController::class, 'allListings'])->name('listings.show');  // Get a single listing
    Route::prefix('admin/listings')->group(function () {
        Route::patch('/{listing}/accept', [ApiController::class, 'acceptListing'])
            ->name('api.admin.listings.accept');
        Route::patch('/{listing}/reject', [ApiController::class, 'rejectListing'])
            ->name('api.admin.listings.reject');
    });
    Route::get('/users', [ApiController::class, 'allUsers'])->name('api.users.index'); // Retrieve all users excluding admin
    // Activate and deactivate user account routes
    Route::patch('/users/{user}/activate', [ApiController::class, 'activateAccount'])->name('api.users.activate');
    Route::patch('/users/{user}/deactivate', [ApiController::class, 'deactivateAccount'])->name('api.users.deactivate');

    // Listing routes
    Route::post('/listings/store', [ListingController::class, 'store'])->name('listings.store');    // Create a new listing
    Route::put('/listings/update/{listing}', [ListingController::class, 'update'])->name('listings.update');   // Update a listing
    Route::delete('/listings/destroy/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');  // Delete a listing

    // Checkout routes
    Route::get('/checkout/{plan?}', [CheckoutController::class, '__invoke'])->name('api.checkout');
    Route::get('/payment/success', [CheckoutController::class, 'success'])->name('api.payment.success');
});


// Route::get('/test-connection', function () {
//     return response()->json(['message' => 'Connection successful']);
// });