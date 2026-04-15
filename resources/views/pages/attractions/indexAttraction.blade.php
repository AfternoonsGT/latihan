@extends('master')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       <div class="mb-3 p-3 bg-light rounded shadow-sm">
            <h4 class="mb-0 fw-bold text-dark">📍 Attractions List</h4>
            <p>This is the index page for attractions.</p>
            {{-- <form action="/destinations" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form> --}}
        </div>
         
    <a href="{{ route('attractions.create') }}" class="btn btn-primary">➕Create New Attraction</a>
            
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attractions as $d)
                        <tr>
                            <td><a href="{{ route('attractions.show', $d->id) }}"> {{ $d->id }} </a></td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->description }}</td>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->updated_at }}</td>
                           
                           <td class="d-flex flex-column gap-2">
    <a href="{{ route('attractions.edit', $d->id) }}"
        class="btn btn-primary btn-sm px-3 shadow-sm rounded-3">
        ✏️ Edit
    </a>

    <form action="{{ route('attractions.delete', $d->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="btn btn-danger btn-sm px-3 shadow-sm rounded-3"
            onclick="return confirm('Are you sure you want to delete {{ $d->name }}?')">
            🗑 Delete
        </button>
    </form>
</td>
                        </tr>
                    @endforeach
                </tbody>




            </table>
        </div>
        <div class="mt-3 d-flex justify-content-center">
                {{ $attractions->links('pagination::bootstrap-5') }}
            </div>
    @endsection

    @push('scripts')
        <script>
            class AlertCustom {
                constructor(message) {
                    this.message = message;
                }

                show() {
                    window.alert(this.message);
                }
            }

            alertElement = document.querySelector('.alert');

            if (alertElement) {
                setTimeout(() => {
                    alertElement.style.transition = "opacity 1s ease-out";
                    alertElement.style.opacity = "0";

                    setTimeout(() => {
                        alertElement.remove();
                    }, 3000);

                }, 1000);
            }
        </script>
    @endpush
