<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //Home Page
    public function index()
    {
        return view('welcome');
    }

    //About Page
    public function about()
    {
        return view('pages.about');
    }

    //Service Page
    public function service()
    {
        return view('pages.service');
    }

    //Advert form Page
    public function advertForm()
    {
        return view('pages.advert-form');
    }

    //Dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            $users = User::all();
            $listings = Listing::all();

            switch ($role) {
                case 'user':
                    if ($user) {
                        return view(
                            'user.dashboard',
                            compact(
                                'listings'
                            )
                        );
                    } else {
                        return view('welcome');
                    }
                case 'admin':
                    $totalUsers = User::where('role', '!=', 'admin')->count();
                    // $user = User::where('role', '!=', 'admin')->first();
                    return view(
                        'admin.dashboard',
                        compact(
                            'totalUsers',
                            'user',
                            'users',
                            'listings'
                        )
                    );
                default:
                    return view('welcome');
            }
        }

        return redirect()->route('login');
    }
}
