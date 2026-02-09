@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>
<div class="grid grid-3" style="margin-bottom: 24px;">
    <div class="card">
        <p>Total token options</p>
        <h2>{{ $stats['token_options'] }}</h2>
    </div>
    <div class="card">
        <p>Total bookings</p>
        <h2>{{ $stats['bookings'] }}</h2>
    </div>
    <div class="card">
        <p>Confirmed / Pending</p>
        <h2>{{ $stats['confirmed_bookings'] }} / {{ $stats['pending_bookings'] }}</h2>
    </div>
</div>

<div class="card">
    <h3>Recent bookings</h3>
    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Token Option</th>
                <th>Status</th>
                <th>Booked</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentBookings as $booking)
                <tr>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->tokenOption->name ?? 'N/A' }}</td>
                    <td class="status {{ $booking->status }}">{{ ucfirst($booking->status) }}</td>
                    <td>{{ $booking->created_at->format('M d, Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No bookings yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
