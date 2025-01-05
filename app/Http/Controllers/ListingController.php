<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Favorite;

class ListingController extends Controller
{
    /**
     * Display a listing of the adverts.
     */
    public function index()
    {
        $adverts = Advert::all();
        return view('pages.advert-form', compact('adverts'));
    }

    /**
     * Store a newly created advert in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'registrationYear' => 'required|integer',
            'mileage' => 'required|integer',
            'condition' => 'required|string|max:255',
            'engine' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'bodyType' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'contactNumber' => 'required|string|max:255',
            'advertEmail' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file uploads
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $imageNames[] = $imageName;
            }
        }
        $validatedData['images'] = json_encode($imageNames);

        // Save the advert data
        $advert = Advert::create($validatedData);

        // Save the listing data
        $listing = new Listing();
        $listing->user_id = Auth::id();
        $listing->advert_id = $advert->id;
        $listing->status;
        $listing->status_updated_at;
        $listing->isActive = false;
        $listing->payment_status = 'unpaid';
        $listing->payment_status_updated_at = null;
        $listing->expiration_date = null;
        $listing->save();

        return view('pricing', ['listing' => $listing])
            ->with('success', 'Advert created successfully.');
    }

    /**
     * Show the form for editing the specified advert.
     */
    public function edit(Listing $listing)
    {
        // Check if user owns the listing
        if (Auth::id() !== $listing->user_id) {
            abort(403);
        }

        return view('pages.advert-edit', compact('listing'));
    }

    /**
     * Update the specified advert in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $validatedData = $request->validate([
            'bodyType' => 'nullable|string|max:255',
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'registrationYear' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'condition' => 'nullable|string|max:255',
            'engine' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'transmission' => 'nullable|string|max:255',
            'fuelType' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'contactNumber' => 'nullable|string',
            'advertEmail' => 'nullable|email',
            'location' => 'nullable|string',
            'images.*' => 'nullable|image|max:2048'
        ]);

        // Handle image updates
        if ($request->hasFile('images')) {
            $imageNames = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $imageNames[] = $imageName;
            }
            $validatedData['images'] = json_encode($imageNames);
        }

        // Update advert
        $listing->advert->update($validatedData);

        // Reset listing status to pending with proper string quotes
        $listing->update([
            'status' => 'pendding', // Match exact string from enum/migration
            'status_updated_at' => now()
        ]);

        return redirect()->route('dashboard')
            ->with('message', 'Advert updated successfully!')
            ->with('redirect_section', 'myAdverts');
    }

    /**
     * Remove the specified advert from storage.
     */
    public function destroy(Listing $listing)
    {
        // Check if user owns the listing
        if (Auth::id() !== $listing->user_id) {
            abort(403);
        }

        // Delete the advert images
        $images = json_decode($listing->advert->images);
        foreach ($images as $image) {
            $imagePath = public_path('uploads/' . $image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the advert
        $listing->advert->delete();

        // Delete the listing
        $listing->delete();

        return redirect()->route('dashboard')
            ->with('message', 'Advert deleted successfully!')
            ->with('redirect_section', 'myAdverts');
    }

    /**
     * Display the specified advert.
     */
    public function show(Listing $listing)
    {
        // Check if listing is approved, active and paid
        if ($listing->status !== 'approved' || !$listing->isActive || !$listing->payment_status === 'unpaid') {
            abort(404);
        }

        return view('pages.advert-view', compact('listing'));
    }

    /**
     * Save adverts.
     */
    public function toggleFavorite(Listing $listing)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Login required'], 401);
        }

        $user = Auth::user();
        $favorite = $user->favorites()->where('listing_id', $listing->id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'removed']);
        }

        // Create new favorite using proper relationship
        $favorite = new Favorite([
            'user_id' => $user->id,
            'listing_id' => $listing->id
        ]);
        $user->favorites()->save($favorite);

        return response()->json(['status' => 'added']);
    }
}
