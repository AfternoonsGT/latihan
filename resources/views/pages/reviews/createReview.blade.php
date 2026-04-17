@extends('master')
@section('content')
    <form action="{{ route('reviews.store') }}" method="post" class="form-floating">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
    <label for="attraction_id" class="form-label fw-semibold">
        Attractions
    </label>

    <select id="attraction_id" name="attraction_id"
        class="form-select shadow-sm @error('attraction_id') is-invalid @enderror"
        required>

        <option value="" disabled {{ old('attraction_id', $review->attraction_id ?? '') == '' ? 'selected' : '' }}>
            -- Select Attraction --
        </option>

        @foreach ($attraction as $attraction)
            <option value="{{ $attraction->id }}"
                {{ old('attraction_id', $review->attraction_id ?? '') == $attraction->id ? 'selected' : '' }}>
                {{ $attraction->name }}
            </option>
        @endforeach
    </select>

    @error('attraction_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="reviewer_name" @error ('reviewer_name') is-invalid @enderror" value="{{ old('reviewer_name') }}">

            @error('reviewer_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <label for="floatingInput">Name Attraction</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="comment" id="" class="form-control" placeholder="Comment"></textarea>
            <label for="floatingPassword">Comment</label>
        </div>
         <a href="{{ route('reviews.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Cancel</a>  
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
        @endsection