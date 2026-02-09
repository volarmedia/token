@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
    <h1>Bookings</h1>
    <a class="button" href="{{ route('bookings.create') }}">New booking</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Customer</th>
                <th>Token</th>
                <th>Status</th>
                <th>Price</th>
                <th>Access</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->tokenOption->name ?? 'N/A' }}</td>
                    <td class="status {{ $booking->status }}">{{ ucfirst($booking->status) }}</td>
                    <td>${{ number_format($booking->price_locked, 2) }}</td>
                    <td>{{ $booking->access_level }}</td>
                    <td>
                        <a class="button secondary" href="{{ route('bookings.show', $booking) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
