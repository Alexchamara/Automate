<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Handle the checkout process.
     */
    public function __invoke(Request $request, string $plan = 'price_1QdYo8FJ6WA2VB9nGPfkfu45')
    {
        return $request->user()
            ->newSubscription('prod_RWbzVAjaOwNB4w', $plan)
            ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('payment.success', ['listing_id' => $request->listing_id]),
                'cancel_url' => route('dashboard'),
            ]);
    }

    // public function __invoke(Request $request, string $plan = 'price_1QdYo8FJ6WA2VB9nGPfkfu45')
    // {
    //     $request->validate([
    //         'listing_id' => 'required|exists:listing,id',
    //     ]);

    //     try {
    //         $checkout = $request->user()
    //             ->newSubscription('prod_RWbzVAjaOwNB4w', $plan)
    //             ->allowPromotionCodes()
    //             ->checkout([
    //                 'success_url' => route('payment.success', ['listing_id' => $request->listing_id]),
    //                 'cancel_url' => route('dashboard'),
    //             ]);

    //         return response()->json([
    //             'status' => 'success',
    //             'data' => [
    //                 'checkout_url' => $checkout->url,
    //             ],
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    /**
     * Handle successful payment.
     */
    // public function success(Request $request)
    // {
    //     try {
    //         $listingId = $request->get('listing_id');
    //         $listing = Listing::findOrFail($listingId);

    //         if ($listing->user_id !== Auth::id()) {
    //             throw new \Exception('Unauthorized access');
    //         }

    //         if ($request->get('payment_status') === 'rejected') {
    //             $listing->update([
    //                 'payment_status' => 'rejected',
    //                 'payment_status_updated_at' => now()
    //             ]);

    //             // Handle API request
    //             if ($request->wantsJson()) {
    //                 return response()->json([
    //                     'status' => 'error',
    //                     'message' => 'Payment was rejected',
    //                     'data' => [
    //                         'listing_id' => $listing->id,
    //                         'payment_status' => $listing->payment_status,
    //                         'updated_at' => $listing->payment_status_updated_at
    //                     ]
    //                 ], 400);
    //             }

    //             // Handle web request
    //             return redirect()->route('dashboard')
    //                 ->with('error', 'Payment was rejected.');
    //         }

    //         $listing->update([
    //             'payment_status' => 'paid',
    //             'payment_status_updated_at' => now()
    //         ]);

    //         // Handle API request
    //         if ($request->wantsJson()) {
    //             return response()->json([
    //                 'status' => 'success',
    //                 'message' => 'Payment processed successfully',
    //                 'data' => [
    //                     'listing_id' => $listing->id,
    //                     'payment_status' => $listing->payment_status,
    //                     'updated_at' => $listing->payment_status_updated_at
    //                 ]
    //             ], 200);
    //         }

    //         // Handle web request
    //         return view('pages.payment-success', ['listing' => $listing]);
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //         if ($request->wantsJson()) {
    //             return response()->json([
    //                 'status' => 'error',
    //                 'message' => 'Listing not found',
    //                 'error' => $e->getMessage()
    //             ], 404);
    //         }
    //         return redirect()->route('dashboard')
    //             ->with('error', 'Listing not found.');
    //     } catch (\Exception $e) {
    //         if ($request->wantsJson()) {
    //             return response()->json([
    //                 'status' => 'error',
    //                 'message' => 'Payment verification failed',
    //                 'error' => $e->getMessage()
    //             ], 500);
    //         }
    //         return redirect()->route('dashboard')
    //             ->with('error', 'Unable to verify payment or unauthorized access.');
    //     }
    // }

    public function success(Request $request)
    {
        $listingId = $request->get('listing_id');

        $listing = Listing::findOrFail($listingId);

        if ($listing->user_id === Auth::id()) {
            if ($request->get('payment_status') === 'rejected') {
                $listing->payment_status = 'rejected';
                $listing->payment_status_updated_at = now();
                $listing->save();

                return redirect()->route('dashboard')
                    ->with('error', 'Payment was rejected.');
            }

            $listing->payment_status = 'paid';
            $listing->payment_status_updated_at = now();
            $listing->save();

    return view('pages.payment-success', ['listing' => $listing]);
        }

        return redirect()->route('dashboard')
            ->with('error', 'Unable to verify payment or unauthorized access.');
    }
}
