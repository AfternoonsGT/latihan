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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }
    </style>

    <div class="container mt-5">

        <div class="card card-custom shadow-lg">

            {{-- GAMBAR DESTINASI DENGAN SUPPORT URL ATAU FILE LOKAL --}}
            <img src="{{asset('storage/image/' . $destinations->image)}}" alt="{{$destinations->name}}" class="img-fluid">

            {{-- HEADER --}}
            <div class="header-gradient text-center p-4">
                <h2 class="fw-bold mb-1">🌍 {{ $destinations['name'] ?? 'Nama Destinasi' }}</h2>
                <p class="mb-0 opacity-75">📍 {{ $destinations['location'] ?? 'Lokasi' }}</p>
            </div>

            <div class="card-body p-4">

                {{-- INFO GRID --}}
                <div class="row text-center mb-4">

                    <div class="col-md-3 col-6 mb-3">
                        <div class="info-box p-3 shadow-sm">
                            <small class="text-muted">Urutan Wisata</small>
                            <h5 class="text-success fw-bold mb-0">
                                {{ isset($destinations['id']) ? number_format($destinations['id']) : '-' }}
                            </h5>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 mb-3">
                        <div class="info-box p-3 shadow-sm">
                            <small class="text-muted">Harga</small>
                            <h6 class="fw-semibold mb-0">
                                ⏱ {{ $destinations['ticket_price'] ?? '-' }}
                            </h6>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 mb-3">
                        <div class="info-box p-3 shadow-sm">
                            <small class="text-muted">Hari kerja</small>
                            <h6 class="fw-semibold mb-0">
                                ✈ {{ $destinations['working_days'] ?? '-' }}
                            </h6>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 mb-3">
                        <div class="info-box p-3 shadow-sm">
                            <small class="text-muted">Waktu Kerja</small>
                            <h5 class="text-warning fw-bold mb-0">
                                ⭐ {{ $destinations['working_hours'] ?? '-' }}
                            </h5>
                        </div>
                    </div>

                </div>

                {{-- HOTEL --}}
                <div class="mb-4">
                    <h5 class="fw-bold mb-2">Deskripsi</h5>
                    <div class="p-3 bg-light rounded-3 shadow-sm">
                        {{ $destinations['description'] ?? '-' }}
                    </div>
                </div>

                {{-- FASILITAS --}}


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
