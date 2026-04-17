<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Review;

class ReviewController extends Controller
{
    //
    // public function index()
    // {
    //     $attractions = Attraction::all();
    //     return view('pages.attractions.indexAttraction', compact('attractions'));
    // }
    public function show($id)
    {
        $review = Review::find($id);
        return view('pages.reviews.showReview', compact('review'));
    }
    public function create()
        {
            $attraction = Attraction::all();
            return view('pages.reviews.createReview', compact('attraction'));
        }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'attraction_id' => 'required',
            'reviewer_name' => 'required|string|max:255',
            'comment' => 'required',
        ]);
        \App\Models\Review::create($validated);
        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }
    public function destroy($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            return redirect('/reviews')->with('success', 'Review deleted successfully.');
        } else {
            return redirect('/reviews')->with('error', 'Review not found.');
        }
    }
    public function edit($id)
    {
        $attraction = Attraction::all();
         $review = \App\Models\Review::find($id);
        return view('pages.reviews.editReview', compact('attraction', 'review'));
    }
        
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'attraction_id' => 'required',
            'reviewer_name' => 'required|string|max:255',
            'comment' => 'required',
        ]);
        $review = \App\Models\Review::findorFail($id);
        $review->update($validated);
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
        return redirect()->route('reviews.index')->with('error', 'Failed to update review.');
    }
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword != '') {
            $reviews = Review::where('reviewer_name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {
            $reviews = Review::orderby('id')->paginate(5);
        }
        return view('pages.reviews.indexReview', compact('reviews'));
    }
}

