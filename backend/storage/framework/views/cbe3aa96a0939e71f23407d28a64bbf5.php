<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php echo $__env->make('partials.card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1 class="h3 text-gray-800 mb-0">Category</h1>
                <a href="<?php echo e(route('kategori.create')); ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Category</span>
                </a>
            </div>
        </div>

        <!-- Users Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Category (Total: <?php echo e($totalKategori); ?>)</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Image Category</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php if($kategori->gambarKategori): ?>
                                            <img src="<?php echo e(asset('storage/' . $kategori->gambarKategori)); ?>" alt="Gambar Kategori"
                                                width="100">
                                        <?php else: ?>
                                            <span>Tidak ada gambar</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($kategori->namaKategori); ?></td>
                                    <td><?php echo e($kategori->deskripsiKategori); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('kategori.edit', $kategori->id)); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('kategori.destroy', $kategori->id)); ?>" method="POST"
                                            style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus user ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada data Kategori.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/masterdata/kategori/index.blade.php ENDPATH**/ ?>