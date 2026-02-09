@extends('layouts.app')

@section('content')
<h1>Edit Token Option</h1>
<form method="POST" action="{{ route('token-options.update', $tokenOption) }}" class="card">
    @csrf
    @method('PUT')
    <div class="field">
        <label>Name</label>
        <input name="name" value="{{ old('name', $tokenOption->name) }}" required>
    </div>
    <div class="field">
        <label>Description</label>
        <textarea name="description" rows="3">{{ old('description', $tokenOption->description) }}</textarea>
    </div>
    <div class="field">
        <label>Price</label>
        <input name="price" type="number" step="0.01" value="{{ old('price', $tokenOption->price) }}" required>
    </div>
    <div class="field">
        <label>Access Level</label>
        <input name="access_level" value="{{ old('access_level', $tokenOption->access_level) }}" required>
    </div>
    <div class="field">
        <label>Inventory</label>
        <input name="inventory" type="number" value="{{ old('inventory', $tokenOption->inventory) }}" required>
    </div>
    <div class="field">
        <label>
            <input type="checkbox" name="is_active" {{ $tokenOption->is_active ? 'checked' : '' }}>
            Active
        </label>
    </div>
    <button class="button" type="submit">Update</button>
</form>
@endsection
