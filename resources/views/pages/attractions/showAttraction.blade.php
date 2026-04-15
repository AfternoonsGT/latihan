@extends('master')
@section('content')
    <h1>Attraction Detail</h1>
    <p>Name: {{ $attraction->name }}</p>
    <p>Description: {{ $attraction->description }}</p>
    <br></br>
    <p>Created at: {{ $attraction->created_at }}</p>
    <p>Updated at: {{ $attraction->updated_at }}</p>
     <a href="{{ route('attractions.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Back</a> 
@endsection