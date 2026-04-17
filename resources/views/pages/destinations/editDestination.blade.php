@extends('master')
@section('content')
    <form action="{{ route('destinations.update', $destination->id) }}" method="post" class="form-floating" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name" value="{{$destination->name}}" @error('name') is-invalid @enderror>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <label for="floatingInput">Nama Destinasi</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="description" id="" class="form-control" placeholder="Description">{{$destination->description}}</textarea>
            <label for="floatingPassword">Description</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Pekanbaru" name="location" value="{{$destination->location}}" @error('location') is-invalid @enderror>
            @error('location')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <label for="floatingInput">Lokasi</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="1000000" name="ticket_price" value="{{$destination->ticket_price}}" @error('ticket_price') is-invalid @enderror>
            @error('ticket_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <label for="floatingInput">Harga Tiket</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="08.00 - 17.00" name="working_hours" value="{{$destination->working_hours}}" @error('working_hours') is-invalid @enderror>
            @error('working_hours')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <label for="floatingInput">Jam Operasional</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Minggu" name="working_days" value="{{$destination->working_days}}" @error('working_days') is-invalid @enderror>
            @error('working_days')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <label for="floatingInput">Hari Operasional</label>
        </div>

        <div class="mb-3">
            <label for="floatingInput">Image</label>
            <input type="file"  id="floatingInput" placeholder="Image" name="image" accept=".jpeg,.png,.jpg" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}  
            </div>
            @enderror
        </div>
        
        <a href="{{ route('destinations.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Cancel</a>
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
    </form>
@endsection
