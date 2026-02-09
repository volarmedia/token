@extends('layouts.app')

@section('content')
<h1>Create Booking</h1>
<form method="POST" action="{{ route('bookings.store') }}" class="card">
    @csrf
    <div class="field">
        <label>Customer name</label>
        <input name="customer_name" value="{{ old('customer_name') }}" required>
    </div>
    <div class="field">
        <label>Email</label>
        <input name="customer_email" type="email" value="{{ old('customer_email') }}" required>
    </div>
    <div class="field">
        <label>Phone</label>
        <input name="customer_phone" value="{{ old('customer_phone') }}" required>
    </div>
    <div class="field">
        <label>Token option</label>
        <select name="token_option_id" required>
            <option value="">Select token</option>
            @foreach($tokenOptions as $tokenOption)
                <option value="{{ $tokenOption->id }}">{{ $tokenOption->name }} - ${{ number_format($tokenOption->price, 2) }}</option>
            @endforeach
        </select>
    </div>
    <div class="field">
        <label>Payment reference</label>
        <input name="payment_reference" value="{{ old('payment_reference') }}">
    </div>
    <div class="field">
        <label>Notes</label>
        <textarea name="notes" rows="3">{{ old('notes') }}</textarea>
    </div>
    <button class="button" type="submit">Submit</button>
</form>
@endsection
