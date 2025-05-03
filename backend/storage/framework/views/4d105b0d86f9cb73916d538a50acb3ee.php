

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-warning btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Users DataTables</span>
    </a>
    <div class="col-md-12">
        <h2> Edit User</h2>
        <div class="card shadow mb-4 py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Informations</h6>
            </div>
            <div class="col-md-12 my-3 px-5">
                <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <p>Name</p>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?php echo e($user->nama); ?>" required>
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class=" col-md-6 form-group">
                            <p>Username</p>
                            <input type="text" class="form-control form-control-user" id="username" name="username" value="<?php echo e($user->username); ?>"
                                required>
                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Alamat</p>
                        <input type="textarea" class="form-control form-control-user" id="alamat" name="alamat"  value="<?php echo e($user->alamat); ?>" required>
                        <?php $__errorArgs = ['Address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <p>Level</p>
                            <select class="form-control form-control-user" id="level" name="level" required>
                                <option value="">-- Choose Level --</option>
                                <option value="superadmin" <?php echo e($user->level == 'superadmin' ? 'selected' : ''); ?>>Super Admin</option>
                                <option value="admin" <?php echo e($user->level == 'admin' ? 'selected' : ''); ?>>Admin</option>
                            </select>
                            <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <p>Status</p>
                            <select class="form-control form-control-user" id="status" name="status" required>
                                <option value="">-- Choose Status --</option>
                                <option value="aktif" <?php echo e($user->status == 'aktif' ? 'selected' : ''); ?>>Active</option>
                                <option value="nonaktif <?php echo e($user->status == 'nonaktif' ? 'selected' : ''); ?>">Non-Active</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>              
                    <hr>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-3">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- Tambahkan SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: "<?php echo e(session('success')); ?>",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/layouts/user/edit.blade.php ENDPATH**/ ?>