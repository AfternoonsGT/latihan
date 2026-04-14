@extends('master')
@section('content')
    <form action="/user/{{ $user->id }}/update" method="post" class="form-floating">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="arif" name="name" value="{{$user->name}}">
            <label for="floatingInput">Nama User</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="email@example.com" name="email" value="{{$user->email}}">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="{{$user->password}}">
            <label for="floatingPassword">Password</label>
        </div>
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
    </form>
@endsection
