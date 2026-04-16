<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use App\Models\Destination;

class AttractionController extends Controller
{
    //
    // public function index()
    // {
    //     $attractions = Attraction::all();
    //     return view('pages.attractions.indexAttraction', compact('attractions'));
    // }
    public function show($id)
    {
        $attraction = Attraction::find($id);
        return view('pages.attractions.showAttraction', compact('attraction'));
    }
    public function create()
        {
            $destinations = Destination::all();
            return view('pages.attractions.createAttraction', compact('destinations'));
        }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'destination_id' => 'required',
        ]);
        \App\Models\Attraction::create($validated);
        return redirect()->route('attractions.index')->with('success', 'Attraction created successfully.');
    }
    public function delete($id)
    {
        $attraction = Attraction::find($id);
        if ($attraction) {
            $attraction->delete();
            return redirect('/attractions')->with('success', 'Attraction deleted successfully.');
        } else {
            return redirect('/attractions')->with('error', 'Attraction not found.');
        }
    }
    public function edit($id)
    {
        $destinations = Destination::all();
         $attraction = \App\Models\Attraction::find($id);
        return view('pages.attractions.editAttraction', compact('attraction', 'destinations'));
    }
        
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'destination_id' => 'required',
        ]);
        $attraction = \App\Models\Attraction::findorFail($id);
        $attraction->update($validated);
        return redirect()->route('attractions.index')->with('success', 'Attraction updated successfully.');
        return redirect()->route('attractions.index')->with('error', 'Failed to update attraction.');
    }
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword != '') {
            $attractions = Attraction::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {
            $attractions = Attraction::orderby('id')->paginate(5);
        }
        return view('pages.attractions.indexAttraction', compact('attractions'));
    }
}

