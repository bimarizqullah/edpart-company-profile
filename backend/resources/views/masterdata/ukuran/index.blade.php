@extends('partials.app')

@section('content')
    <div class="container-fluid">
        @include('partials.card')

        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="h3 text-gray-800 mb-0">Size</h1>
                <a href="{{ route('ukuran.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Size</span>
                </a>
            </div>
        </div>

        <!-- Users Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Size (Total: {{ $totalSize }})</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light text-center">
                            <tr>
                                <th class="col-md-6">
                                    Catalog (type)
                                </th>
                                <th class="col-md-2">
                                    Size
                                </th>
                                <th class="col-md-2">
                                    Price
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ukurans as $ukuran)
                                <tr>
                                    <td>{{ $ukuran->katalog->namaKatalog }}</td>
                                    <td>{{ $ukuran->ukuran }}</td>
                                    <td>{{ $ukuran->harga }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('ukuran.edit', $ukuran->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('ukuran.destroy', $ukuran->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus ukuran ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">Tidak ada data Ukuran.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection