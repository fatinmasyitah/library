
<?php $__env->startSection('title', 'Book'); ?>
<?php $__env->startSection('content'); ?>

       <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php if(!empty($books)): ?>

                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                      <div class="col mb-5">
                          <div class="card h-100">

                            <!-- Sale badge-->
                            <div class="badge <?php echo e($book->status == 1 ? 'bg-success':'bg-danger'); ?> position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo e($book->status == 1 ? 'Available':'Issued'); ?></div>
                              <!-- Product image-->
                              <a href="<?php echo e(route('get.book', $book->id)); ?>"><img class="card-img-top"src="<?php echo e($book->bookimage); ?>" alt="<?php echo e($book->booktitle); ?>" /></a>
                              <!-- Product details-->
                              <div class="card-body p-4">
                                  <div class="text-center">
                                      <!-- Product name-->
                                      <h5 class="fw-bolder"><?php echo e($book->booktitle); ?></h5>
                                      <!-- Product price-->
                                      <?php echo e($book->author->authorname); ?>

                                  </div>
                              </div>
                              <?php if(auth()->guard()->guest()): ?>
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                              <button type="button" class="btn btn-outline-warning fa fa-shopping-basket" data-bs-toggle="modal" data-bs-target="#modalSignin">&nbsp;Add to basket</button>
                               </div>
                              </div>
                                <?php else: ?>
                              
                                <!-- Product actions-->
                              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                  <a class="btn btn-outline-warning mt-auto" href="<?php echo e(route('basket.add', [$book->id, auth()->user()->id])); ?>"><i class="fa fa-shopping-basket">&nbsp;Add to basket</i></a>
                                </div>
                              </div>

                              <?php endif; ?>
                              
                          </div>
                      </div>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                  <?php endif; ?>
                </div>
            </div>
        </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/frontend/book.blade.php ENDPATH**/ ?>