@extends('partials.app')

@section('content')
<div class="container-fluid">
    @include('partials.card')

    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 text-gray-800 mb-0">Products</h1>
            <a href="{{ route('produk.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Product</span>
            </a>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Product (Total: {{ $totalProduk }})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Catalog (Type)</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $produk)
                            <tr>
                                <td>
                                    @if ($produk->gambarProduk)
                                        <img src="{{ asset('storage/' . $produk->gambarProduk) }}" alt="Gambar Kategori"
                                            width="100">
                                    @else
                                        <span>Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td>{{ $produk->namaProduk }}</td>
                                <td>{{ $produk->katalog->namaKatalog }}</td>
                                <td>{{ $produk->deskripsiProduk }}</td>
                                <td>{{ $produk->ukuran->ukuran }}</td>
                                <td>{{ $produk->ukuran->harga }}</td>
                                <td>
                                    <span class="badge {{ $produk->statusProduk === 'aktif' ? 'badge-success' : 'badge-secondary' }}">
                                        {{ ucfirst($produk->statusProduk) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center text-muted">Tidak ada Produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
