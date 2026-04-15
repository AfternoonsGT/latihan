@extends('master')
@section('content')
    <h1>User Detail</h1>
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Password: ••••••••••••••••</p>
    <br></br>
    <p>Created at: {{ $user->created_at }}</p>
    <p>Updated at: {{ $user->updated_at }}</p>
        <a href="{{ route('user.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Back</a>
@endsection