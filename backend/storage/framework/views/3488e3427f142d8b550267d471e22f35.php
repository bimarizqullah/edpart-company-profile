

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="container-fluid">
        <h1 class="col-md-4 h4 mb-3">Pilih Katalog Produk</h1>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $katalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $katalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <img class="img-fluid mb-3" src="<?php echo e(asset('storage/' . $katalog->gambarKatalog)); ?>"
                                alt="Gambar Katalog" style="border-radius: 5px; width: 100%;">
                            <h5 class="card-title"><?php echo e($katalog->namaKatalog); ?></h5>
                            <a href="<?php echo e(route('produk.show', $katalog->id)); ?>" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                                <span class="text">Check Catalog</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center text-muted">
                    <p>Tidak ada katalog tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/masterdata/produk/show.blade.php ENDPATH**/ ?>