<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TokenOption;

class DashboardController extends Controller
{
    public function welcome()
    {
        $tokenOptions = TokenOption::all();

        return view('welcome', compact('tokenOptions'));
    }

    public function index()
    {
        $stats = [
            'token_options' => TokenOption::count(),
            'bookings' => Booking::count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
        ];

        $recentBookings = Booking::latest()->take(8)->get();

        return view('dashboard.index', compact('stats', 'recentBookings'));
    }
}
