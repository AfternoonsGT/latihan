@extends('master')

@section('content')
    <div class="container">
        <div class="mb-3 p-3 bg-light rounded shadow-sm">
    <h4 class="mb-0 fw-bold text-dark">📍 Destination List</h4>
</div>
        <a href="/destinations/create" class="btn btn-primary shadow-sm px-4">
            ➕ Add Destination
        </a>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Working Hours</th>
                    <th>Working Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($destinations as $d)
                    <tr>
                        <td><a href="detaildestinasi1/{{ $d->id }}"> {{ $d->id }} </a></td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->description }}</td>
                        <td>{{ $d->location }}</td>
                        <td>{{ $d->ticket_price }}</td>
                        <td>{{ $d->working_hours }}</td>
                        <td>{{ $d->working_days }}</td>
                        <td>
                            <a href="/destinations/{{ $d->id }}/edit" class="btn btn-warning shadow-sm px-4">
        Edit
        </a>
                            <form action="/destinations/{{ $d->id }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn  
                                 -danger btn-sm px-3 shadow-sm"
                                    onclick="return confirm('Are you sure you want to delete {{ $d->name }}?')">
                                    Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>




        </table>
    </div>
@endsection
