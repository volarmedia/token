<?php

namespace App\Http\Controllers;

use App\Models\TokenOption;
use Illuminate\Http\Request;

class TokenOptionController extends Controller
{
    public function index()
    {
        $tokenOptions = TokenOption::latest()->paginate(10);

        return view('token_options.index', compact('tokenOptions'));
    }

    public function create()
    {
        return view('token_options.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'access_level' => ['required', 'string', 'max:120'],
            'inventory' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        TokenOption::create($validated);

        return redirect()->route('token-options.index')->with('status', 'Token option created.');
    }

    public function show(TokenOption $tokenOption)
    {
        return view('token_options.show', compact('tokenOption'));
    }

    public function edit(TokenOption $tokenOption)
    {
        return view('token_options.edit', compact('tokenOption'));
    }

    public function update(Request $request, TokenOption $tokenOption)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'access_level' => ['required', 'string', 'max:120'],
            'inventory' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $tokenOption->update($validated);

        return redirect()->route('token-options.show', $tokenOption)->with('status', 'Token option updated.');
    }

    public function destroy(TokenOption $tokenOption)
    {
        $tokenOption->delete();

        return redirect()->route('token-options.index')->with('status', 'Token option deleted.');
    }
}
