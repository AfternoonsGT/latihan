@extends('master')

@section('content')

<style>
    body {
        background: #f5f7fb;
    }

    .card-custom {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s;
    }

    .card-custom:hover {
        transform: translateY(-5px);
    }

    .header-gradient {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        color: white;
    }

    .info-box {
        border-radius: 15px;
        transition: 0.3s;
    }

    .info-box:hover {
        background: #f1f5ff;
    }

    .badge-custom {
        background: #eef2ff;
        color: #333;
        border-radius: 20px;
        padding: 8px 14px;
        font-size: 13px;
    }

    .destinasi-img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 20px 20px 0 0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 15px;
    }
</style>

<div class="container mt-5">

    <div class="card card-custom shadow-lg">

        {{-- GAMBAR DESTINASI DENGAN SUPPORT URL ATAU FILE LOKAL --}}
        <img src="{{ 
                isset($destinasi['gambar']) && $destinasi['gambar'] != '' 
                    ? (Str::startsWith($destinasi['gambar'], ['http://','https://']) 
                        ? $destinasi['gambar'] 
                        : asset('images/' . $destinasi['gambar'])) 
                    : asset('images/default.jpg') 
             }}" 
             alt="{{ $destinasi['nama'] ?? 'Destinasi' }}" 
             class="destinasi-img">

        {{-- HEADER --}}
        <div class="header-gradient text-center p-4">
            <h2 class="fw-bold mb-1">🌍 {{ $destinasi['nama'] ?? 'Nama Destinasi' }}</h2>
            <p class="mb-0 opacity-75">📍 {{ $destinasi['lokasi'] ?? 'Lokasi' }}</p>
        </div>

        <div class="card-body p-4">

            {{-- INFO GRID --}}
            <div class="row text-center mb-4">

                <div class="col-md-3 col-6 mb-3">
                    <div class="info-box p-3 shadow-sm">
                        <small class="text-muted">Harga</small>
                        <h5 class="text-success fw-bold mb-0">
                            Rp {{ isset($destinasi['harga']) ? number_format($destinasi['harga']) : '-' }}
                        </h5>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-3">
                    <div class="info-box p-3 shadow-sm">
                        <small class="text-muted">Durasi</small>
                        <h6 class="fw-semibold mb-0">
                            ⏱ {{ $destinasi['durasi'] ?? '-' }}
                        </h6>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-3">
                    <div class="info-box p-3 shadow-sm">
                        <small class="text-muted">Transportasi</small>
                        <h6 class="fw-semibold mb-0">
                            ✈ {{ $destinasi['transportasi'] ?? '-' }}
                        </h6>
                    </div>
                </div>

                <div class="col-md-3 col-6 mb-3">
                    <div class="info-box p-3 shadow-sm">
                        <small class="text-muted">Rating</small>
                        <h5 class="text-warning fw-bold mb-0">
                            ⭐ {{ $destinasi['rating'] ?? '-' }}
                        </h5>
                    </div>
                </div>

            </div>

            {{-- HOTEL --}}
            <div class="mb-4">
                <h5 class="fw-bold mb-2">🏨 Hotel</h5>
                <div class="p-3 bg-light rounded-3 shadow-sm">
                    {{ $destinasi['hotel'] ?? '-' }}
                </div>
            </div>

            {{-- FASILITAS --}}
            <div>
                <h5 class="fw-bold mb-3">✨ Fasilitas</h5>

                <div class="d-flex flex-wrap gap-2">
                    @if(isset($destinasi['fasilitas']) && is_array($destinasi['fasilitas']))
                        @foreach ($destinasi['fasilitas'] as $fasilitas)
                            <span class="badge-custom shadow-sm">
                                ✔ {{ $fasilitas }}
                            </span>
                        @endforeach
                    @else
                        <span class="text-muted">Tidak ada fasilitas tersedia</span>
                    @endif
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="text-center mt-4">
                <button class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                    ✈ Pesan Sekarang
                </button>
            </div>

        </div>
    </div>

</div>

@endsection