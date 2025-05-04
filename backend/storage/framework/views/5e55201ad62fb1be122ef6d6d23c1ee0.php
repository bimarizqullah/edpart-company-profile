

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php echo $__env->make('partials.card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 text-gray-800 mb-0">Users</h1>
            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add User</span>
            </a>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna (Total: <?php echo e($totalUsers); ?>)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($user->nama); ?></td>
                                <td><?php echo e($user->username); ?></td>
                                <td><?php echo e($user->alamat); ?></td>
                                <td><?php echo e(ucfirst($user->level)); ?></td>
                                <td>
                                    <span class="badge <?php echo e($user->status === 'aktif' ? 'badge-success' : 'badge-secondary'); ?>">
                                        <?php echo e(ucfirst($user->status)); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="delete-form-<?php echo e($user->id); ?>" action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" style="display:inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('delete-form-<?php echo e($user->id); ?>')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tidak ada data pengguna.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function confirmDelete(formId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dipulihkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-success'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }

    <?php if(session('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '<?php echo e(session('success')); ?>',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000, // Menampilkan notifikasi selama 3 detik
            toast: true
        });
        <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/layouts/user/index.blade.php ENDPATH**/ ?>