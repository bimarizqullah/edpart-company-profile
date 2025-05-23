
<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <?php if(Auth::check() && Auth::user()->level === 'superadmin'): ?>
    <a class="col-xl-3 col-md-6 mb-4" href="/users">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            USERS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($totalUsers); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <?php endif; ?>
    <a class="col-xl-3 col-md-6 mb-4" href="/kategori">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            KATEGORI</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($totalKategori); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a class="col-xl-3 col-md-6 mb-4" href="/katalog">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            KATALOG</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($totalKatalog); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a class="col-xl-3 col-md-6 mb-4" href="/produk">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            PRODUK</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($totalProduk); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div><?php /**PATH D:\XAMPP\htdocs\edpArt\backend\resources\views/partials/card.blade.php ENDPATH**/ ?>