
<?php $__env->startSection('title', 'Publisher Edit'); ?>
<?php $__env->startSection('content'); ?>

<div class="section-header">
  <h1><?php echo e($page_title); ?></h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?php echo e(route('publisher.index')); ?>">Publisher List</a></div>
      <div class="breadcrumb-item">Edit Publisher</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="<?php echo e(route('publisher.update', $publisher->id)); ?>"  method="POST">
                <?php echo csrf_field(); ?>

                <?php echo method_field('PUT'); ?>

                <div class="card-header">
                    <h4><?php echo e($sub_title); ?></h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="publishername" value="<?php echo e($publisher->publishername); ?>">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher Email</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="publisheremail" value="<?php echo e($publisher->publisheremail); ?>">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher Address</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea class="form-control" name="publisheraddress"><?php echo e($publisher->publisheraddress); ?></textarea>
                    </div>
                </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                      <input type="button" class="btn btn-secondary" value="Back" onclick="history.back()">
                    <button class="btn btn-primary">Update</button>
                  </div>
                </div>     
            </form>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/page/features-post-create.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/publisher/edit.blade.php ENDPATH**/ ?>