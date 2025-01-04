<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $plan = 'price_1QdYo8FJ6WA2VB9nGPfkfu45')
    {
        return $request->user()
            ->newSubscription('prod_RWbzVAjaOwNB4w', $plan)
            ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('payment.success'),
                'cancel_url' => route('dashboard'),
            ]);
    }
}
