<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-warning btn-icon-split my-3">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Product DataTables</span>
    </a>
    <div class="col-md-12">
        <h2> Add Product </h2>
        <div class="card shadow mb-4 py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Informations</h6>
            </div>
            <div class="col-md-12 my-3 px-5">
                <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <p>Photo</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambarProduk" name="gambarProduk"
                                    accept="image/*">
                                <label class="custom-file-label" for="gambarProduk" id="file-label">Choose
                                    Photo...</label>
                            </div>
                            <?php $__errorArgs = ['gambarProduk'];
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
                            <p>Product Name</p>
                            <input type="text" class="form-control form-control-user" id="namaProduk" name="namaProduk"
                                required>
                            <?php $__errorArgs = ['namaProduk'];
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
                            <p>Choose Type</p>

                            <select name="katalog_id" class="form-control" required>
                                <option value="">-- Choose Catalog --</option>
                                <?php $__currentLoopData = $katalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k->id); ?>"><?php echo e($k->namaKatalog); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['katalog_id'];
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
                        <div class=" col-md-12 form-group">
                            <p>Descripstions</p>
                            <textarea class="form-control form-control-user" id="deskripsiProduk"
                                name="deskripsiProduk" required>
                            </textarea>
                            <?php $__errorArgs = ['deskripsiProduk'];
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
                        <div class=" col-md-12 form-group">
                            <p>Price</p>
                            <input type="number" class="form-control form-control-user" id="harga"
                                name="harga" required>
                            <?php $__errorArgs = ['harga'];
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
                        <div class=" col-md-12 form-group">
                            <p>Size</p>
                            <input type="text" class="form-control form-control-user" id="ukuran"
                                name="ukuran" required>
                            <?php $__errorArgs = ['ukuran'];
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
                            <p>Status Produk</p>
                            <select name="statusProduk" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                            <?php $__errorArgs = ['statusProduk'];
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
                        Add Product
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
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/masterdata/produk/create.blade.php ENDPATH**/ ?>