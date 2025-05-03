@extends('partials.app')

@section('content')
    <a href="{{ route('users.index') }}" class="btn btn-warning btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Users DataTables</span>
    </a>
    <div class="col-md-12">
        <h2> Add User </h2>
        <div class="card shadow mb-4 py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Informations</h6>
            </div>
            <div class="col-md-12 my-3 px-5">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <p>Name</p>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" required>
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class=" col-md-6 form-group">
                            <p>Username</p>
                            <input type="text" class="form-control form-control-user" id="username" name="username"
                                required>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <p>Password</p>
                        <input type="password" class="form-control form-control-user" id="password" name="password"
                            required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <p>Alamat</p>
                        <input type="textarea" class="form-control form-control-user" id="alamat" name="alamat" required>
                        @error('Address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <p>Level</p>
                            <select class="form-control form-control-user" id="level" name="level" required>
                                <option value="">-- Choose Level --</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('level')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <p>Status</p>
                            <select class="form-control form-control-user" id="status" name="status" required>
                                <option value="">-- Choose Status --</option>
                                <option value="aktif">Active</option>
                                <option value="nonaktif">Non-Active</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>               
                    <hr>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-3">
                        Add User
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
@endpush