<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-warning btn-icon-split my-3">
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
                <form action="<?php echo e(route('kategori.update', $kategori->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <p>Category Photo</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambarKategori" name="gambarKategori"
                                    value="<?php echo e($kategori->gambarKategori); ?>" accept="image/*">
                                <label class="custom-file-label" for="gambarKategori" id="file-label">Choose
                                    Photo...</label>
                            </div>
                            <?php $__errorArgs = ['gambarKategori'];
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
                        <div class="col-md-6 form-group">
                            <p>Category Name</p>
                            <input type="text" class="form-control form-control-user" id="namaKategori" name="namaKategori"
                                value="<?php echo e($kategori->namaKategori); ?>" required>
                            <?php $__errorArgs = ['namaKategori'];
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
                            <p>Description</p>
                            <input type="text" class="form-control form-control-user" id="deskripsiKategori"
                                name="deskripsiKategori" value="<?php echo e($kategori->deskripsiKategori); ?>" required>
                            <?php $__errorArgs = ['deskripsiKategori'];
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/masterdata/kategori/edit.blade.php ENDPATH**/ ?>