@extends('partials.app')

@section('content')
    @include('partials.card')
    <div class="container-fluid">
        <h1 class="col-md-4 h4 mb-3">Pilih Katalog Produk</h1>
        <div class="row">
            @forelse($katalogs as $katalog)
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <img class="img-fluid mb-3" src="{{ asset('storage/' . $katalog->gambarKatalog) }}"
                                alt="Gambar Katalog" style="border-radius: 5px; width: 100%;">
                            <h5 class="card-title">{{ $katalog->namaKatalog }}</h5>
                            <a href="{{ route('produk.show', $katalog->id) }}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Check Catalog</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    <p>Tidak ada katalog tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection