<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="text-center">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-5">Forbidden</p>
            <p class="text-gray-500 mb-0">You don't have access to this page..</p>
            <a href="javascript:window.history.back()">&larr; Back to Dashboard</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.layouts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/errors/403.blade.php ENDPATH**/ ?>