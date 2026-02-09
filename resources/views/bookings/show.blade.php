@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>Booking #{{ $booking->id }}</h1>
    <div>
        <a class="button secondary" href="{{ route('bookings.edit', $booking) }}">Edit</a>
        <a class="button secondary" href="{{ route('bookings.confirm', $booking) }}">Confirm</a>
        <form method="POST" action="{{ route('bookings.destroy', $booking) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="button" type="submit">Delete</button>
        </form>
    </div>
</div>

<div class="card">
    <p><strong>Customer:</strong> {{ $booking->customer_name }}</p>
    <p><strong>Email:</strong> {{ $booking->customer_email }}</p>
    <p><strong>Phone:</strong> {{ $booking->customer_phone }}</p>
    <p><strong>Status:</strong> <span class="status {{ $booking->status }}">{{ ucfirst($booking->status) }}</span></p>
    <p><strong>Token:</strong> {{ $booking->tokenOption->name ?? 'N/A' }}</p>
    <p><strong>Access level:</strong> {{ $booking->access_level }}</p>
    <p><strong>Price locked:</strong> ${{ number_format($booking->price_locked, 2) }}</p>
    <p><strong>Payment reference:</strong> {{ $booking->payment_reference ?? 'N/A' }}</p>
    <p><strong>Notes:</strong> {{ $booking->notes ?? 'N/A' }}</p>
</div>
@endsection
