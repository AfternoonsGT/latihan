@extends('master')
@section('content')
    <form action="{{ route('destinations.store') }}" method="post" class="form-floating">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Asia Heritage" name="name">
            <label for="floatingInput">Nama Destinasi</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="description" id="" class="form-control" placeholder="Description"></textarea>
            <label for="floatingPassword">Description</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Pekanbaru" name="location">
            <label for="floatingInput">Lokasi</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="1000000" name="ticket_price">
            <label for="floatingInput">Harga Tiket</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="08.00 - 17.00" name="working_hours">
            <label for="floatingInput">Jam Operasional</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Senin - Minggu" name="working_days">
            <label for="floatingInput">Hari Operasional</label>
        </div>
            <a href="{{ route('destinations.index') }}" class="btn btn-secondary px-4 py-2 rounded-pill shadow-sm me-2">Cancel</a>  
        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">Submit</button>
    </form>
@endsection
