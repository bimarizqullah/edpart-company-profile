@extends('partials.app')

@section('content')
    <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Categories DataTables</span>
    </a>
    <div class="col-md-12">
        <h2> Edit Category</h2>
        <div class="card shadow mb-4 py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category Informations</h6>
            </div>
            <div class="col-md-12 my-3 px-5">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <p>Category Photo</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambarKategori" name="gambarKategori"
                                    value="{{$kategori->gambarKategori}}" accept="image/*">
                                <label class="custom-file-label" for="gambarKategori" id="file-label">Choose
                                    Photo...</label>
                            </div>
                            @error('gambarKategori')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <p>Category Name</p>
                            <input type="text" class="form-control form-control-user" id="namaKategori" name="namaKategori"
                                value="{{$kategori->namaKategori}}" required>
                            @error('namaKategori')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-md-6 form-group">
                            <p>Description</p>
                            <input type="text" class="form-control form-control-user" id="deskripsiKategori"
                                name="deskripsiKategori" value="{{$kategori->deskripsiKategori}}" required>
                            @error('deskripsiKategori')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-3">
                        Save
                    </button>
                </form>
            </div>
        </div>
        <hr>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.custom-file-input');
            inputs.forEach(function (input) {
                input.addEventListener('change', function (e) {
                    const fileName = e.target.files[0]?.name;
                    const label = e.target.closest('.custom-file').querySelector('.custom-file-label');
                    if (label && fileName) {
                        label.textContent = fileName;
                    }
                });
            });
        });
    </script>
@endpush