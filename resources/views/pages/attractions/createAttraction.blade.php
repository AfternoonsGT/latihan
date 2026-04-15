@extends('master')
@section('content')
    <form action="{{ route('attractions.store') }}" method="post" class="form-floating">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name">
            <label for="floatingInput">Nama Destinasi</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="description" id="" class="form-control" placeholder="Description"></textarea>
            <label for="floatingPassword">Description</label>
        </div>
         <a href="{{ route('attractions.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Cancel</a>  
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
        @endsection