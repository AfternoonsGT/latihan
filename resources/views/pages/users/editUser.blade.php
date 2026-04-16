@extends('master')
@section('content')
    <form action="{{ route('user.update', $user->id) }}" method="post" class="form-floating">
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
            <input type="text" class="form-control" id="floatingInput" placeholder="arif" name="name" value="{{$user->name}} @error('name') is-invalid @enderror" value="{{ old('name')}}" required>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <label for="floatingInput">Nama User</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="email@example.com" name="email" value="{{$user->email}}">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="{{$user->password}}" @error('password') is-invalid @enderror>
            
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <label for="floatingPassword">Password</label>
        </div>
        <a href="{{ route('user.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Cancel</a>
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
    </form>
@endsection
