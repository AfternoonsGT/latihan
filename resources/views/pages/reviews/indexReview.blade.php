@extends('master')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

       <div class="mb-3 p-3 bg-light rounded shadow-sm">
            <h4 class="mb-0 fw-bold text-dark">📍 Review List</h4>
            <div class="d-flex align-items-center">
        <form action="{{ route('reviews.index') }}" method="GET" class="d-flex me-2" role="search">
          <input class="form-control rounded-pill me-2 px-3" type="search" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-primary rounded-pill px-3" type="submit">
            🔍
          </button>
        </form>
            </div>
        </div>     
            <a href="{{ route('reviews.create') }}" class="btn btn-primary shadow-sm px-4">
                ➕ Add Review
            </a>
            
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Attraction</th>
                        <th>Reviewer Name</th>
                        <th>Comment</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $d)
                        <tr>
                            <td><a href="{{ route('reviews.show', $d->id) }}"> {{ $d->id }} </a></td>
                            <td>{{ $d->attraction->name }}</td>
                            <td>{{ $d->reviewer_name }}</td>
                            <td>{{ $d->comment }}</td>
                            <td>{{ $d->created_at }}</td>
                            <td>{{ $d->updated_at }}</td>
                           
                           <td class="d-flex flex-column gap-2">
    <a href="{{ route('reviews.edit', $d->id) }}"
        class="btn btn-primary btn-sm px-3 shadow-sm rounded-3">
        ✏️ Edit
    </a>

    <form action="{{ route('reviews.destroy', $d->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="btn btn-danger btn-sm px-3 shadow-sm rounded-3"
            onclick="return confirm('Are you sure you want to delete this review?')">
            🗑 Delete
        </button>
</td>
                        </tr>
                    @endforeach
                </tbody>




            </table>
        </div>
        <div class="mt-3 d-flex justify-content-center">
                {{ $reviews->links('pagination::bootstrap-5') }}
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
