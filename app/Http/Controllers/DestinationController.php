<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('pages.indexDestinasi', compact('destinations'));
    }

    public function show($id)
    {
        $destinations = Destination::find($id);
        return view('pages.detaildestinasi1', compact('destinations'));
    }


    public function create()
        {
            return view('pages.createDestination');
        }

    public function store(Request $request)
    {
        Destination::create($request->all());
        return redirect('/destinations')->with('succes', 'Destination created succesfully.');
    }

    public function delete($id)
    {
        $destination =Destination::find($id);
        if ($destination) {
            $destination->delete();
            return redirect('/destinations')->with('succes', 'Destination deleted succesfully.');
        } else {
            return redirect('/destinations')->with('error', 'Destination not found.');
        }
    }
    public function edit($id)
    {
        $destination = Destination::find($id);
        return view('pages.editDestination', compact('destination'));
    }
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);
        if ($destination) {
            $destination->update($request->all());
            return redirect('/destinations')->with('success', 'Destination Updated Succesfully');
        } else {
            return redirect('/destinations')->with('error', 'Destination not found');
        }
    }
}