@extends('partials.app')

@section('content')
    <div class="container-fluid">
        @include('partials.card')

        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="h3 text-gray-800 mb-0">Category</h1>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Category</span>
                </a>
            </div>
        </div>

        <!-- Users Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Category (Total: {{ $totalKategori }})</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Image Category</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kategoris as $kategori)
                                <tr>
                                    <td>
                                        @if ($kategori->gambarKategori)
                                            <img src="{{ asset('storage/' . $kategori->gambarKategori) }}" alt="Gambar Kategori"
                                                width="100">
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $kategori->namaKategori }}</td>
                                    <td>{{ $kategori->deskripsiKategori }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus user ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada data Kategori.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection