@extends('master')
@section('content')
    <form action="{{ route('user.store') }}" method="post" class="form-floating">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Arif" name="name">
            <label for="floatingInput">Nama User</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="email@example.com" name="email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>
        <a href="{{ route('user.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Cancel</a>
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
    </form>
@endsection
