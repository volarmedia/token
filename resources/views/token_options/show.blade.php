@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h1>{{ $tokenOption->name }}</h1>
    <div>
        <a class="button secondary" href="{{ route('token-options.edit', $tokenOption) }}">Edit</a>
        <form method="POST" action="{{ route('token-options.destroy', $tokenOption) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="button" type="submit">Delete</button>
        </form>
    </div>
</div>

<div class="card">
    <p><strong>Access level:</strong> {{ $tokenOption->access_level }}</p>
    <p><strong>Price:</strong> ${{ number_format($tokenOption->price, 2) }}</p>
    <p><strong>Inventory:</strong> {{ $tokenOption->inventory }}</p>
    <p><strong>Status:</strong> {{ $tokenOption->is_active ? 'Active' : 'Inactive' }}</p>
    <p><strong>Description:</strong> {{ $tokenOption->description }}</p>
</div>
@endsection
