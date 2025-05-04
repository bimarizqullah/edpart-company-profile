@extends('partials.app')

@section('content')
    <a href="{{ route('produk.index') }}" class="btn btn-warning btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Product DataTables</span>
    </a>
    <div class="col-md-12">
        <h2> Edit Product </h2>
        <div class="card shadow mb-4 py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Informations</h6>
            </div>
            <div class="col-md-12 my-3 px-5">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 form-group">
                            @if($produk->gambarProduk)
                                <div class="mb-3">
                                    <p>Gambar Saat Ini:</p>
                                    <img id="imagePreview" src="{{ asset('storage/' . $produk->gambarProduk) }}"
                                        alt="Gambar Produk" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @else
                                <div class="mb-3">
                                    <p>Gambar Saat Ini:</p>
                                    <img id="imagePreview" src="#" alt="Gambar Produk" class="img-thumbnail"
                                        style="max-height: 200px; display: none;">
                                </div>
                            @endif
                            <p>Photo</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambarProduk" name="gambarProduk"
                                    value="{{$produk->gambarProduk}}" accept="image/*">
                                <label class="custom-file-label" for="gambarProduk" id="file-label">Choose
                                    Photo...</label>
                            </div>
                            @error('gambarProduk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <p>Product Name</p>
                            <input type="text" class="form-control form-control-user" id="namaProduk" name="namaProduk"
                                value="{{$produk->namaProduk}}" required>
                            @error('namaProduk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <p>Choose Type</p>
                            <select name="katalog_id" class="form-control" required>
                                <option value="">-- Choose Catalog --</option>
                                @foreach($katalog as $k)
                                    <option value="{{ $k->id }}" @selected(old('katalog_id', $produk->katalog_id) == $k->id)>
                                        {{ $k->namaKatalog }}
                                    </option>
                                @endforeach
                            </select>
                            @error('katalog_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-md-12 form-group">
                            <p>Descripstions</p>
                            <input type="textarea" class="form-control form-control-user" id="deskripsiProduk"
                                value="{{$produk->deskripsiProduk}}" name="deskripsiProduk" required>
                            @error('deskripsiProduk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-md-12 form-group">
                            <p>Price</p>
                            <input type="textarea" class="form-control form-control-user" id="hargaProduk"
                                value="{{$produk->hargaProduk}}" name="hargaProduk" required>
                            @error('hargaProduk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <p>Choose Size</p>
                            <select name="ukuran_id" class="form-control" required>
                                <option value="">-- Choose Size --</option>
                                @foreach($ukuran as $u)
                                    <option value="{{ $u->id }}" @selected(old('ukuran_id', $produk->ukuran_id) == $u->id)>
                                        {{ $u->ukuran }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ukuran_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <p>Status Produk</p>
                            <select name="statusProduk" class="form-control" required>
                                <option value="">-- Choose Status --</option>
                                <option value="aktif" {{ old('statusProduk', $produk->statusProduk) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('statusProduk', $produk->statusProduk) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('statusProduk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-3">
                        Add Product
                    </button>
                </form>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('gambarProduk');
            const preview = document.getElementById('imagePreview');
            const label = document.getElementById('file-label');
    
            input.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    label.textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        preview.src = event.target.result;
                        preview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush