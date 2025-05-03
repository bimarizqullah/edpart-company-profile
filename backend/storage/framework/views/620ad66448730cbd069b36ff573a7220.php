


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

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->nama); ?></td>
                                    <td><?php echo e($user->username); ?></td>
                                    <td><?php echo e($user->alamat); ?></td>
                                    <td><?php echo e($user->level); ?></td><td>
                                        <span class="badge <?php echo e($user->status === 'aktif' ? 'badge-success' : 'badge-secondary'); ?>">
                                            <?php echo e(ucfirst($user->status)); ?>

                                        </span>
                                    </td>
                                    
                                    <td>
                                        <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST"
                                            style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views\layouts\user\index.blade.php ENDPATH**/ ?>