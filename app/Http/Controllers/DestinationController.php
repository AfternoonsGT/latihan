<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    // public function index()
    // {
    //     $destinations = Destination::all();
    //     return view('pages.indexDestinasi', compact('destinations'));
    // }

    public function show($id)
    {
        $destinations = Destination::find($id);
        return view('pages.destinations.detaildestinasi1', compact('destinations'));
    }


    public function create()
        {
            return view('pages.destinations.createDestination');
        }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'location' => 'required',
            'ticket_price' => 'required|numeric',
            'working_hours' => 'required',
            'working_days' => 'required',
        ]);
        \App\Models\Destination::create($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    public function delete($id)
    {
        $destination =Destination::find($id);
        if ($destination) {
            $destination->delete();
            return redirect('/destinations')->with('success', 'Destination deleted succesfully.');
        } else {
            return redirect('/destinations')->with('error', 'Destination not found.');
        }
    }
    public function edit($id)
    {
        $destination = Destination::find($id);
        return view('pages.destinations.editDestination', compact('destination'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
           'name' => 'required',
            'description' => 'nullable',
            'location' => 'required',
            'ticket_price' => 'required|numeric',
            'working_hours' => 'required',
            'working_days' => 'required',
        ]);
        $destination = \App\Models\Destination::findorFail($id);
        $destination->update($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
        return redirect()->route('destinations.index')->with('error', 'Failed to update destination.');
    }
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword != '') {
            $destinations = Destination::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {$destinations = Destination::orderby('id')->paginate(5);
        }
        return view('pages.destinations.indexDestinasi', compact('destinations'));
    }
}