@extends('layouts.app')

@section('content')
<h1>Edit Booking</h1>
<form method="POST" action="{{ route('bookings.update', $booking) }}" class="card">
    @csrf
    @method('PUT')
    <div class="field">
        <label>Customer name</label>
        <input name="customer_name" value="{{ old('customer_name', $booking->customer_name) }}" required>
    </div>
    <div class="field">
        <label>Email</label>
        <input name="customer_email" type="email" value="{{ old('customer_email', $booking->customer_email) }}" required>
    </div>
    <div class="field">
        <label>Phone</label>
        <input name="customer_phone" value="{{ old('customer_phone', $booking->customer_phone) }}" required>
    </div>
    <div class="field">
        <label>Token option</label>
        <select name="token_option_id" required>
            @foreach($tokenOptions as $tokenOption)
                <option value="{{ $tokenOption->id }}" {{ $booking->token_option_id === $tokenOption->id ? 'selected' : '' }}>
                    {{ $tokenOption->name }} - ${{ number_format($tokenOption->price, 2) }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="field">
        <label>Status</label>
        <select name="status" required>
            <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>
    <div class="field">
        <label>Payment reference</label>
        <input name="payment_reference" value="{{ old('payment_reference', $booking->payment_reference) }}">
    </div>
    <div class="field">
        <label>Notes</label>
        <textarea name="notes" rows="3">{{ old('notes', $booking->notes) }}</textarea>
    </div>
    <button class="button" type="submit">Update</button>
</form>
@endsection
