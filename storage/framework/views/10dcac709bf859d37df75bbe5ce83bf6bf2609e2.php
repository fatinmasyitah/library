
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-inbox"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today's book issued</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($todayIssued ?? 0); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-book"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Book</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($totalBook ?? 0); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-chart">
                    <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-hourglass"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pending Issued</h4>
                    </div>
                    <div class="card-body">
                        <?php echo e($pendingIssued ?? 0); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Book Issued List</h4>
                    <div class="card-header-action">
                        <a href="<?php echo e(route('admin.bookissued')); ?>" class="btn btn-danger">View all Book Issued <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                            <?php $__currentLoopData = $proceeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->phone); ?></td>
                                <td><span class="badge <?php echo e($item->bookstatus === 0 ? 'badge-warning':($item->bookstatus === 1 ? 'badge-success':'badge-danger')); ?>"><?php echo e($item->bookstatus === 0 ? 'pending':($item->bookstatus === 1 ? 'approved':'canceled')); ?></span></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Book List</h4>
                    <div class="card-header-action">
                        <a href="<?php echo e(route('book.index')); ?>" class="btn btn-danger">View all Books <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Book Image</th>
                                <th>Book Title</th>
                                <th>Status</th>
                            </tr>
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(asset($item->bookimage)); ?>" class="avatar-book" alt="<?php echo e($item->booktitle); ?>" width="60"></td>
                                <td><?php echo e($item->booktitle); ?></td>
                                <td><span class="badge <?php echo e($item->status == 1 ? 'badge-success':'badge-danger'); ?>"><?php echo e($item->status == 1 ? 'Available':'Issued'); ?></span></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/dashboard.blade.php ENDPATH**/ ?>