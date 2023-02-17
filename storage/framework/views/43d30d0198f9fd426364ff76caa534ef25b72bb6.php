
<?php $__env->startSection('title', 'Category Create'); ?>
<?php $__env->startSection('content'); ?>

<div class="section-header">
  <h1><?php echo e($page_title); ?></h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?php echo e(route('category.index')); ?>">Category List</a></div>
      <div class="breadcrumb-item">Edit Category</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="<?php echo e(route('category.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="card-header">
                    <h4><?php echo e($sub_title); ?></h4>
                </div>
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="categoryname" id="categoryname" value="<?php echo e($category->categoryname); ?>">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Type</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="fiction" value="0"
                                    <?php echo e($category->type == 0 ? 'checked':''); ?>>
                                    <label class="form-check-label" for="fiction">
                                        Fiction
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="nonfiction" value="1" <?php echo e($category->type == 1 ? 'checked':''); ?>>
                                    <label class="form-check-label" for="nonfiction">
                                        Non-fiction
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                      <input type="button" class="btn btn-secondary" value="Back" onclick="history.back()">
                    <button type="submit" class="btn btn-primary">Update</button>
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

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/category/edit.blade.php ENDPATH**/ ?>