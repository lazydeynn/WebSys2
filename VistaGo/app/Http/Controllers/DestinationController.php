<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fee' => 'required|numeric|min:0',
            'difficulty_level' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('destinations', 'public');
        }

        Destination::create($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination added!');
    }

    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fee' => 'required|numeric|min:0',
            'difficulty_level' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('destinations', 'public');
        }

        $destination->update($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination updated!');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination deleted!');
    }
}