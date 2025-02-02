<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Advert;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiController extends Controller
{
    // Get user listings for API
    public function userListings()
    {
        $listings = Listing::with(['advert'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return response()->json([
            'status' => true,
            'data' => $listings
        ]);
    }

    // Toggle listing status
    public function toggleActiveStatus(Listing $listing)
    {
        // Check if user owns the listing
        if ($listing->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $listing->update([
            'isActive' => !$listing->isActive
        ]);

        return response()->json([
            'message' => 'Listing ' . ($listing->isActive ? 'activated' : 'deactivated') . ' successfully',
            'isActive' => $listing->isActive
        ]);
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
                'mobile' => ['nullable', 'string', 'max:20', 'unique:users,mobile,' . Auth::id()],
            ]);

            $user = User::find(Auth::id());
            $user->update($validated);
            $user->update($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully!',
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'mobile' => $user->mobile,
                ]
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Profile update failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get all listings
    public function allListings()
    {
        try {
            $listings = Listing::with(['advert', 'user'])->get();
            return response()->json(
                [
                    'status' => true,
                    'data' => $listings
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch listings'], 500);
        }
    }

    // Accept listing
    public function acceptListing(Listing $listing)
    {
        try {
            if (Auth::user()->role !== 'admin') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Admin access required.'
                ], 403);
            }

            $listing->update([
                'status' => 'approved',
                'status_updated_at' => now(),
                'isActive' => true,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Listing approved successfully',
                'data' => $listing
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to approve listing',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Reject listing
    public function rejectListing(Listing $listing)
    {
        try {
            if (Auth::user()->role !== 'admin') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized. Admin access required.'
                ], 403);
            }

            $listing->update([
                'status' => 'rejected',
                'status_updated_at' => now()
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Listing rejected successfully',
                'data' => $listing
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to reject listing',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get all users
    public function allUsers(Request $request)
    {
        $users = User::where('role', '!=', 'admin')
            ->withCount('listings')
            ->get();

        return response()->json($users);
    }

    // Activate and deactivate user account
    public function activateAccount(User $user)
    {
        $user->update(['isActive' => true]);
        return response()->json([
            'status' => 'success',
            'message' => 'Account activated successfully.',
            'data' => $user
        ]);
    }

    public function deactivateAccount(User $user)
    {
        $user->update(['isActive' => false]);
        return response()->json([
            'status' => 'success',
            'message' => 'Account deactivated successfully.',
            'data' => $user
        ]);
    }

        /**
     * Get all listings with filtering and pagination
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showListing(Request $request)
    {
        try {
            $query = Listing::with(['advert', 'user'])
                ->where('status', 'approved')
                ->where('isActive', true)
                ->where('payment_status', 'paid');
    
            // Apply filters if provided
            // if ($request->has('make')) {
            //     $query->whereHas('advert', function($q) use ($request) {
            //         $q->where('make', $request->make);
            //     });
            // }
    
            // if ($request->has('model')) {
            //     $query->whereHas('advert', function($q) use ($request) {
            //         $q->where('model', $request->model);
            //     });
            // }
    
            // if ($request->has('price_min')) {
            //     $query->whereHas('advert', function($q) use ($request) {
            //         $q->where('price', '>=', $request->price_min);
            //     });
            // }
    
            // if ($request->has('price_max')) {
            //     $query->whereHas('advert', function($q) use ($request) {
            //         $q->where('price', '<=', $request->price_max);
            //     });
            // }
    
            // Sort results
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);
    
            // Paginate results
            $perPage = $request->get('per_page', 10);
            $listings = $query->paginate($perPage);
    
            if ($listings->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No active listings found'
                ], 404);
            }
    
            return response()->json([
                'status' => true,
                'message' => 'Listings retrieved successfully',
                'data' => $listings,
                'meta' => [
                    'total' => $listings->total(),
                    'per_page' => $listings->perPage(),
                    'current_page' => $listings->currentPage(),
                    'last_page' => $listings->lastPage()
                ]
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error retrieving listings',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
