@extends('master')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3 p-3 bg-light rounded shadow-sm">
            <h4 class="mb-0 fw-bold text-dark">📍 User List</h4>
            <div class="d-flex align-items-center">
        <form action="{{ route('user.index') }}" method="GET" class="d-flex me-2" role="search">
          <input class="form-control rounded-pill me-2 px-3" type="search" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-primary rounded-pill px-3" type="submit">
            🔍
          </button>
        </form>
            </div>
        </div>     
            <a href="{{ route('user.create') }}" class="btn btn-primary shadow-sm px-4">
                ➕ Add User
            </a>
            
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $d)
                        <tr>
                            <td><a href="{{ route('user.show', $d->id) }}"> {{ $d->id }} </a></td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td><span class="text-muted">••••••••</span></td>
                           
                          <td class="align-middle">
    <div class="d-flex flex-column gap-2 align-items-center justify-content-center h-100">

        <a href="{{ route('user.edit', $d->id) }}"
            class="btn btn-primary btn-sm px-3 d-flex align-items-center gap-2 shadow-sm rounded-3"
            style="min-width: 110px;">
            <span class="fs-5">✏️</span>
            <span class="fw-semibold">Edit</span>
        </a>

        <form action="{{ route('user.delete', $d->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit"
                class="btn btn-danger btn-sm px-3 d-flex align-items-center gap-2 shadow-sm rounded-3"
                style="min-width: 110px;"
                onclick="return confirm('Are you sure you want to delete {{ $d->name }}?')">
                
                <span class="fs-5">🗑</span>
<span class="fw-semibold">Delete</span>
            </button>
        </form>

    </div>
</td>
                        </tr>
                    @endforeach
                </tbody>




            </table>
        </div>
        <div class="mt-3 d-flex justify-content-center">
                {{ $user->links('pagination::bootstrap-5') }}
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
