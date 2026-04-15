<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;

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
            return view('pages.attractions.createAttraction');
        }
    public function store(Request $request)
    {
        Attraction::create($request->all());
        return redirect('/attractions')->with('success', 'Attraction created successfully.');
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
        $attraction = Attraction::find($id);
        return view('pages.attractions.editAttraction', compact('attraction'));
    }
    public function update(Request $request, $id)
    {
        $attraction = Attraction::find($id);
        if ($attraction) {
            $attraction->update($request->all());
            return redirect('/attractions')->with('success', 'Attraction updated successfully.');
        } else {
            return redirect('/attractions')->with('error', 'Attraction not found.');
        }
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

