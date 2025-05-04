<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <?php echo $__env->make('partials.card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 text-gray-800 mb-0">Products</h1>
            <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Product</span>
            </a>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Product (Total: <?php echo e($totalProduk); ?>)</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Catalog (Type)</th>
                            <th>Description</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <?php if($produk->gambarProduk): ?>
                                        <img src="<?php echo e(asset('storage/' . $produk->gambarProduk)); ?>" alt="Gambar Kategori"
                                            width="100">
                                    <?php else: ?>
                                        <span>Tidak ada gambar</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($produk->namaProduk); ?></td>
                                <td><?php echo e($produk->katalog->namaKatalog); ?></td>
                                <td><?php echo e($produk->deskripsiProduk); ?></td>
                                <td><?php echo e($produk->ukuran->ukuran); ?></td>
                                <td><?php echo e($produk->hargaProduk); ?></td>
                                <td>
                                    <span class="badge <?php echo e($produk->statusProduk === 'aktif' ? 'badge-success' : 'badge-secondary'); ?>">
                                        <?php echo e(ucfirst($produk->statusProduk)); ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('produk.edit', $produk->id)); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('produk.destroy', $produk->id)); ?>" method="POST" style="display:inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="12" class="text-center text-muted">Tidak ada Produk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/masterdata/produk/index.blade.php ENDPATH**/ ?>