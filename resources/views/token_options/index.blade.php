@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
    <h1>Token Options</h1>
    <a class="button" href="{{ route('token-options.create') }}">Create option</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Access Level</th>
                <th>Price</th>
                <th>Inventory</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($tokenOptions as $tokenOption)
                <tr>
                    <td>{{ $tokenOption->name }}</td>
                    <td>{{ $tokenOption->access_level }}</td>
                    <td>${{ number_format($tokenOption->price, 2) }}</td>
                    <td>{{ $tokenOption->inventory }}</td>
                    <td>{{ $tokenOption->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a class="button secondary" href="{{ route('token-options.show', $tokenOption) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
