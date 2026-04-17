@extends('master')
@section('content')
    <h1>Review Detail</h1>
    <p>Attraction: {{ $review->attraction->name }}</p>
    <p>Reviewer Name: {{ $review->reviewer_name }}</p>
    <p>Comment: {{ $review->comment }}</p>
    <br></br>
    <p>Created at: {{ $review->created_at }}</p>
    <p>Updated at: {{ $review->updated_at }}</p>
     <a href="{{ route('attractions.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Back</a> 
@endsection