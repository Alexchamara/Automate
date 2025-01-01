<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $validatedData['images'] = $imageNames;

        // Save the advert data
        $advert = Advert::create($validatedData);

        // Save the listing data
        $listing = new Listing();
        $listing->user_id = Auth::id();
        $listing->advert_id = $advert->id;
        $listing->save();

        return redirect()->route('listings.index')->with('success', 'Advert created successfully.');
    }
    // public function store(Request $request)
    // {
    //     try {
    //         $validatedData = $request->validate([
    //             'make' => 'required|string|max:255',
    //             'model' => 'required|string|max:255',
    //             'registrationYear' => 'required|integer',
    //             'mileage' => 'required|integer',
    //             'condition' => 'required|string|max:255',
    //             'engine' => 'required|string|max:255',
    //             'color' => 'required|string|max:255',
    //             'bodyType' => 'required|string|max:255',
    //             'transmission' => 'required|string|max:255',
    //             'fuelType' => 'required|string|max:255',
    //             'price' => 'required|numeric',
    //             'description' => 'required|string',
    //             'contactNumber' => 'required|string|max:255',
    //             'advertEmail' => 'required|email|max:255',
    //             'location' => 'required|string|max:255',
    //             'images' => 'nullable|array',
    //             'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         ]);

    //         Log::info('Validated Data:', $validatedData);

    //         // Handle file uploads
    //         $imageNames = [];
    //         if ($request->hasFile('images')) {
    //             foreach ($request->file('images') as $image) {
    //                 $imageName = time() . '-' . $image->getClientOriginalName();
    //                 $image->move(public_path('uploads'), $imageName);
    //                 $imageNames[] = $imageName;
    //             }
    //         }
    //         $validatedData['images'] = $imageNames;

    //         Log::info('Image Names:', $imageNames);

    //         // Save the advert data
    //         $advert = Advert::create($validatedData);
    //         Log::info('Advert Created:', $advert->toArray());

    //         // Save the listing data
    //         $listing = new Listing();
    //         $listing->user_id = Auth::id();
    //         $listing->advert_id = $advert->id;
    //         $listing->save();
    //         Log::info('Listing Created:', $listing->toArray());

    //         return redirect()->with('success', 'Advert created successfully.');
    //     } catch (\Exception $e) {
    //         Log::error('Error saving advert:', ['error' => $e->getMessage()]);
    //         return redirect()->back()->with('error', 'There was an error creating the advert.');
    //     }
    // }
}
