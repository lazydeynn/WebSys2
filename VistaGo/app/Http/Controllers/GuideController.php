<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();
        return view('guides.index', compact('guides'));
    }

    public function create()
    {
        return view('guides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string',
            'daily_rate' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('guides', 'public');
        }

        Guide::create($validated);
        return redirect()->route('guides.index')->with('success', 'Guide added!');
    }

    public function edit(Guide $guide)
    {
        return view('guides.edit', compact('guide'));
    }

    public function update(Request $request, Guide $guide)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string',
            'daily_rate' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('guides', 'public');
        }

        $guide->update($validated);
        return redirect()->route('guides.index')->with('success', 'Guide updated!');
    }

    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.index')->with('success', 'Guide deleted!');
    }
}