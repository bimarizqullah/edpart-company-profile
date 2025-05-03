

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success" id="success-alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow" style="height: 82dvh">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Picture</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="<?php echo e(route('profile.updateFoto')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="mb-3 text-center">
                                <?php if(Auth::user()->gambarUser): ?>
                                    <img src="<?php echo e(asset('storage/profile/' . Auth::user()->gambarUser)); ?>" alt="User Photo"
                                        class="rounded-circle" style="width: 250px; height: 250px; object-fit: cover;">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('images/default.jpg')); ?>" alt="Default Photo" class="rounded-circle"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                            <h5 class="card-title text-primary mb-4 text-center">
                                <?php echo e(Auth::user()->nama); ?>

                            </h5>

                            <div class="form-group">
                                <label for="foto" class="d-block text-primary">Choose Profile Picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                                    <label class="custom-file-label" for="foto" id="file-label">Choose Photo...</label>
                                </div>
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
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow mb-3" style="height: 35dvh">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-user fa-sm fa-fw text-gray-400 mx-3"></i>User Informations</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Action:</div>
                                <a class="dropdown-item" href="<?php echo e(route('profile.edit', Auth::user()->id)); ?>"><i class="fas fa-edit fa-sm fa-fw text-gray-400 mx-3"></i>Edit Profile</a>
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
                <div class="card shadow" style="height: 45dvh">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><i
                                class="fas fa-lock fa-sm fa-fw text-gray-400 mx-3"></i>Change Password</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>Old Password</p>
                                        <input type="password" class="form-control form-control-user" id="old_password"
                                            name="old_password" required>
                                        <?php $__errorArgs = ['password'];
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>New Password</p>
                                        <input type="password" class="form-control form-control-user" id="new_password"
                                            name="new_password" required>
                                        <?php $__errorArgs = ['password'];
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
                            </div>
                            <div class="form-group">
                                <p>Confirm Password</p>
                                <input type="password" class="form-control form-control-user" id="confirm_password" 
                                name="confirm_password"
                                    required>
                                <?php $__errorArgs = ['password'];
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
                            <button type="submit" class="btn btn-primary mt-3">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php $__env->startPush('styles'); ?>
        <style>
            .custom-file-input:lang(en)~.custom-file-label::after {
                content: "Browse";
                /* Teks default pada tombol */
            }

            .custom-file-label {
                padding: 0.375rem 1.25rem;
                border: 1px solid #ced4da;
                background-color: #fff;
                cursor: pointer;
                border-radius: 0.25rem;
                font-size: 1rem;
            }

            .custom-file-input:focus~.custom-file-label {
                border-color: #80bdff;
                box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
            }

            /* Hover state */
            .custom-file-input:hover~.custom-file-label {
                background-color: #f8f9fa;
            }

            .custom-file-label {
                font-weight: bold;
            }

            .custom-file-label::after {
                content: "Browse";
                /* Tombol untuk memilih file */
            }

            .fade-out {
                opacity: 0;
                transition: opacity 1s ease-out;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
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

            document.addEventListener('DOMContentLoaded', function () {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    setTimeout(() => {
                        alert.classList.add('fade-out');
                    }, 3000); // tunggu 3 detik sebelum mulai menghilang

                    setTimeout(() => {
                        alert.remove();
                    }, 4000); // hapus elemen setelah animasi selesai
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/layouts/userProfile/profile.blade.php ENDPATH**/ ?>