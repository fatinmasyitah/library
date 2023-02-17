
<?php $__env->startSection('title', 'Author Edit'); ?>
<?php $__env->startSection('content'); ?>

<div class="section-header">
  <h1><?php echo e($page_title); ?></h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?php echo e(route('author.index')); ?>">Author List</a></div>
      <div class="breadcrumb-item">Edit Author</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="<?php echo e(route('author.update', $author->id)); ?>"  method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <?php echo method_field('PUT'); ?>

                <div class="card-header">
                    <h4><?php echo e($sub_title); ?></h4>
                </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Name</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="authorname" value="<?php echo e($author->authorname); ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="publisherID" class="form-control selectric">
                                <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $author->publisherID): ?>
                                <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->publishername); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->publishername); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div style="background-image: url(<?php echo e(asset($author->authorimage)); ?>);background-size: cover; background-position: center;" id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="authorimage" id="image-upload" />
                            </div>
                        </div>
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

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/author/edit.blade.php ENDPATH**/ ?>