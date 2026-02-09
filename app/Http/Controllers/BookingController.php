<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TokenOption;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('tokenOption')->latest()->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $tokenOptions = TokenOption::where('is_active', true)->orderBy('price')->get();

        return view('bookings.create', compact('tokenOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:150'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'token_option_id' => ['required', 'exists:token_options,id'],
            'payment_reference' => ['nullable', 'string', 'max:120'],
            'notes' => ['nullable', 'string'],
        ]);

        $tokenOption = TokenOption::findOrFail($validated['token_option_id']);

        if (! $tokenOption->is_active || $tokenOption->inventory <= 0) {
            return back()->withErrors(['token_option_id' => 'Selected token option is no longer available.'])->withInput();
        }

        $validated['status'] = 'pending';
        $validated['price_locked'] = $tokenOption->price;
        $validated['access_level'] = $tokenOption->access_level;

        $booking = Booking::create($validated);

        $tokenOption->decrement('inventory');

        return redirect()->route('bookings.show', $booking)->with('status', 'Booking created.');
    }

    public function show(Booking $booking)
    {
        $booking->load('tokenOption');

        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $tokenOptions = TokenOption::where('is_active', true)->orderBy('price')->get();

        return view('bookings.edit', compact('booking', 'tokenOptions'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:150'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'token_option_id' => ['required', 'exists:token_options,id'],
            'payment_reference' => ['nullable', 'string', 'max:120'],
            'notes' => ['nullable', 'string'],
            'status' => ['required', 'in:pending,confirmed,cancelled'],
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.show', $booking)->with('status', 'Booking updated.');
    }

    public function confirm(Booking $booking)
    {
        $booking->update(['status' => 'confirmed']);

        return redirect()->route('bookings.show', $booking)->with('status', 'Booking confirmed.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('status', 'Booking deleted.');
    }
}
