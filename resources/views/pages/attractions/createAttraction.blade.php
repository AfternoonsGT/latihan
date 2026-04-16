@extends('master')
@section('content')
    <form action="{{ route('attractions.store') }}" method="post" class="form-floating">
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
    <label for="destination_id" class="form-label fw-semibold">
        Destinations
    </label>

    <select id="destination_id" name="destination_id"
        class="form-select shadow-sm @error('destination_id') is-invalid @enderror"
        required>

        <option value="" disabled {{ old('destination_id', $attraction->destination_id ?? '') == '' ? 'selected' : '' }}>
            -- Select Destination --
        </option>

        @foreach ($destinations as $destination)
            <option value="{{ $destination->id }}"
                {{ old('destination_id', $attraction->destination_id ?? '') == $destination->id ? 'selected' : '' }}>
                {{ $destination->name }}
            </option>
        @endforeach
    </select>

    @error('destination_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name" @error ('name') is-invalid @enderror" value="{{ old('name') }}">

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <label for="floatingInput">Name Attraction</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="description" id="" class="form-control" placeholder="Description"></textarea>
            <label for="floatingPassword">Description</label>
        </div>
         <a href="{{ route('attractions.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Cancel</a>  
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
        @endsection