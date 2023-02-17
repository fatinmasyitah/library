
<?php $__env->startSection('title', 'Book Edit'); ?>
<?php $__env->startSection('content'); ?>

<div class="section-header">
  <h1><?php echo e($page_title); ?></h1>
  <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?php echo e(route('book.index')); ?>">Book List</a></div>
      <div class="breadcrumb-item">Edit Book</a></div>
  </div>
</div>
<div class="section-body"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
            <form action="<?php echo e(route('book.update', $book->id)); ?>"  method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <?php echo method_field('PUT'); ?>

                <div class="card-header">
                    <h4><?php echo e($sub_title); ?></h4>
                </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Book Title</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="booktitle" value="<?php echo e($book->booktitle); ?>">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Type</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="0"
                                    <?php echo e($book->type == 0 ? 'checked':''); ?>>
                                    <label class="form-check-label" for="fiction">
                                        Fiction
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="1" <?php echo e($book->type == 1 ? 'checked':''); ?>>
                                    <label class="form-check-label" for="nonfiction">
                                        Non-fiction
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row mb-4" id="fictionsub">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="categoryID" class="form-control selectric">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $book->categoryID): ?>
                                <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->categoryname); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->categoryname); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="authorID" class="form-control selectric">
                                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $book->authorID): ?>
                                <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->authorname); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->authorname); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publisher</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="publisherID" class="form-control selectric">
                                <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->id == $book->publisherID): ?>
                                <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->publishername); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->publishername); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Book Weight</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="bookweight" value=" <?php echo e($book->bookweight); ?> ">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea name="description" class="summernote-simple"><?php echo e($book->description); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Book Image</label>
                        <div class="col-sm-12 col-md-7">
                            <div style="background-image: url(<?php echo e(asset($book->bookimage)); ?>);background-size: cover; background-position: center;" id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="bookimage" id="image-upload" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="status">
                                <option <?php echo e($book->status == 1 ? 'checked':''); ?> value="1">Publish</option>
                                <option <?php echo e($book->status == 0 ? 'checked':''); ?> value="0">Draft</option>
                            </select>
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

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/book/edit.blade.php ENDPATH**/ ?>