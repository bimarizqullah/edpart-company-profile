@extends('partials.app')

@section('content')
    <a href="{{ route('katalog.index') }}" class="btn btn-warning btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Catalog DataTables</span>
    </a>
    <div class="col-md-12">
        <h2> Edit Catalog</h2>
        <div class="card shadow mb-4 py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Catalog Informations</h6>
            </div>
            <div class="col-md-12 my-3 px-5">
                <form action="{{ route('katalog.update', $katalog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-6 form-group">
                            <p>Catalog Name</p>
                            <input type="text" class="form-control form-control-user" id="namaKatalog" name="namaKatalog"
                                value="{{$katalog->namaKatalog}}" required>
                            @error('namaKatalog')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <p>Pilih Kategori</p>
                            <select name="kategori_id" id="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategori as $k)
                                    <option 
                                        value="{{ $k->id }}"
                                        {{-- tandai selected bila sama dengan yg tersimpan --}}
                                        {{ old('kategori_id', $katalog->kategori_id) == $k->id ? 'selected' : '' }}
                                    >
                                        {{ $k->namaKategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-md-12 form-group">
                            <p>Description</p>
                            <input type="textarea" class="form-control form-control-user" id="deskripsiKatalog"
                                name="deskripsiKatalog" value="{{$katalog->deskripsiKatalog}}" required>
                            @error('deskripsiKatalog')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <p>Catalog Photo</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambarKatalog" name="gambarKatalog"
                                    value="{{$katalog->gambarKatalog}}" accept="image/*">
                                <label class="custom-file-label" for="gambarKatalog" id="file-label">Choose
                                    Photo...</label>
                            </div>
                            @error('gambarKatalog')
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