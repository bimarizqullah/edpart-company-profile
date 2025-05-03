

<?php $__env->startSection('content'); ?>
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow" style="height: 80dvh">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">User Informations</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-4">
                            <i class="fas fa-user-circle mx-2"></i><?php echo e(Auth::user()->nama); ?>

                        </h5>

                        <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="mb-3 text-center">
                                <?php if(Auth::user()->gambarUser): ?>
                                    <img src="<?php echo e(Storage::url('profile/' . Auth::user()->gambarUser)); ?>" alt="User Photo"
                                        class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('default.jpg')); ?>" alt="Default Photo" class="rounded-circle"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto Profil</label>
                                <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                                <?php $__errorArgs = ['foto'];
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

                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow" style="height: 80dvh">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">User Informations</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-4">
                            <i class="fas fa-user-circle mx-2"></i><?php echo e(Auth::user()->nama); ?>

                        </h5>

                        <?php if(Auth::check()): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Username</strong>
                                    <span><?php echo e(Auth::user()->username); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Address</strong>
                                    <span><?php echo e(Auth::user()->alamat); ?></span>
                                </li>
                                <?php if(Auth::user()->level ?? false): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Peran</strong>
                                        <span><?php echo e(Auth::user()->level); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->status ?? false): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>Status</strong>
                                        <span class="badge bg-success text-dark"><?php echo e(Auth::user()->status); ?></span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php else: ?>
                            <div class="alert alert-warning mt-3">
                                Anda belum login.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views\layouts\userProfile\profile.blade.php ENDPATH**/ ?>