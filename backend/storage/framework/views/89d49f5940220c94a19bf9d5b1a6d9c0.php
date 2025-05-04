<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-warning btn-icon-split my-3">
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
                <form action="<?php echo e(route('produk.update', $produk->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <?php if($produk->gambarProduk): ?>
                                <div class="mb-3">
                                    <p>Gambar Saat Ini:</p>
                                    <img id="imagePreview" src="<?php echo e(asset('storage/' . $produk->gambarProduk)); ?>"
                                        alt="Gambar Produk" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            <?php else: ?>
                                <div class="mb-3">
                                    <p>Gambar Saat Ini:</p>
                                    <img id="imagePreview" src="#" alt="Gambar Produk" class="img-thumbnail"
                                        style="max-height: 200px; display: none;">
                                </div>
                            <?php endif; ?>
                            <p>Photo</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambarProduk" name="gambarProduk"
                                    value="<?php echo e($produk->gambarProduk); ?>" accept="image/*">
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
                                value="<?php echo e($produk->namaProduk); ?>" required>
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
                                    <option value="<?php echo e($k->id); ?>" <?php if(old('katalog_id', $produk->katalog_id) == $k->id): echo 'selected'; endif; ?>>
                                        <?php echo e($k->namaKatalog); ?>

                                    </option>
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
                            <input type="textarea" class="form-control form-control-user" id="deskripsiProduk"
                                value="<?php echo e($produk->deskripsiProduk); ?>" name="deskripsiProduk" required>
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
                            <input type="textarea" class="form-control form-control-user" id="hargaProduk"
                                value="<?php echo e($produk->hargaProduk); ?>" name="hargaProduk" required>
                            <?php $__errorArgs = ['hargaProduk'];
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
                            <p>Choose Size</p>
                            <select name="ukuran_id" class="form-control" required>
                                <option value="">-- Choose Size --</option>
                                <?php $__currentLoopData = $ukuran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($u->id); ?>" <?php if(old('ukuran_id', $produk->ukuran_id) == $u->id): echo 'selected'; endif; ?>>
                                        <?php echo e($u->ukuran); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['ukuran_id'];
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
                                <option value="">-- Choose Status --</option>
                                <option value="aktif" <?php echo e(old('statusProduk', $produk->statusProduk) == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                                <option value="nonaktif" <?php echo e(old('statusProduk', $produk->statusProduk) == 'nonaktif' ? 'selected' : ''); ?>>Nonaktif</option>
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/masterdata/produk/edit.blade.php ENDPATH**/ ?>