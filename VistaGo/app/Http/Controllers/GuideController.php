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
        Guide::create($request->all());
        return redirect()->route('guides.index')->with('success', 'Guide added!');
    }

    public function edit(Guide $guide)
    {
        return view('guides.edit', compact('guide'));
    }

    public function update(Request $request, Guide $guide)
    {
        $guide->update($request->all());
        return redirect()->route('guides.index')->with('success', 'Guide updated!');
    }

    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.index')->with('success', 'Guide deleted!');
    }
}