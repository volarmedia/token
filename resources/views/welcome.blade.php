@extends('layouts.app')

@section('content')
<div class="card">
    <h1>Reserve Your Token</h1>
    <p>Choose a token tier to unlock priority access, premium amenities, or VIP previews for the project launch.</p>
</div>

<div class="grid grid-3" style="margin-top: 24px;">
    @foreach($tokenOptions as $tokenOption)
        <div class="card">
            <h3>{{ $tokenOption->name }}</h3>
            <p>{{ $tokenOption->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($tokenOption->price, 2) }}</p>
            <p><span class="badge">{{ $tokenOption->access_level }}</span></p>
            <p><strong>Inventory:</strong> {{ $tokenOption->inventory }}</p>
            <a class="button" href="{{ route('bookings.create') }}">Book this token</a>
        </div>
    @endforeach
</div>
@endsection
