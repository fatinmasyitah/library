

<?php $__env->startSection('content'); ?>

       <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Section-->
        <div class="container mt-5 p-3 rounded cart">
          <div class="row no-gutters">
              <div class="col-md-8">
                  <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center"><a href="<?php echo e(route('book')); ?>" style="text-decoration: none; color: #000"><i class="fa fa-long-arrow-left"></i><span class="ml-2">Back</span></a></div>
                        <hr>
                        <h6 class="mb-0">Your basket</h6>
                     <?php if(!empty($baskets)): ?>

                        <?php $__currentLoopData = $baskets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row"><img class="rounded" src="<?php echo e(asset($basket->book->bookimage)); ?>" width="40">
                                <div class="ml-2"><span class="font-weight-bold d-block"><?php echo e($basket->book->booktitle); ?></span></div>
                            </div>
                            <div class="d-flex flex-row align-items-center"><span class="d-block"><?php echo e($basket->quantity); ?></span><span class="d-block ml-5"></span>
                            <form action="<?php echo e(route('basket.delete', [$basket->id, auth()->user()->id])); ?>" method="POST">

                              <?php echo csrf_field(); ?>

                              <?php echo method_field('DELETE'); ?>

                              <button class="btn btn-link text-danger tt" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o ml-3 text-black-50"></i></button>
                            </form>
                            </div>
                        </div>
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                     <?php endif; ?>
                      
                  </div>
              </div>
              
              
                <div class="col-md-4">
                  <div class="payment-info p-3" style="background-color: #800000">
                      <div class="d-flex justify-content-between align-items-center"><span>Please fill in the form before proceed</span></div><span class="type d-block mt-3 mb-1"></span><span></span>
                      <form action="<?php echo e(route('proceed', auth()->user()->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                      <div class="mb-1">
                        <label for="floatingInput">Full name</label>
                        <input type="text" class="form-control rounded-3" id="name" name="name" placeholder="Fatin Masyitah" required>
                      </div>
                      
                    <div class="row mb-1">
                      <div class="col-md-6">
                        <label for="floatingInput">Email address</label>
                        <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="name@example.com" required>
                      </div>

                      <div class="col-md-6">
                        <label for="floatingInput">Phone No.</label>
                        <input type="text" class="form-control rounded-3" id="phone" name="phone" placeholder="012345678" required>
                      </div>
                    </div>

                    <div class="mb-1">
                      <label for="floatingInput">Address</label>
                      <input type="text" class="form-control rounded-3" id="address" name="address" placeholder="Your address" required>
                    </div>

                    <div class="row mb-1">
                      <div class="col-md-6">
                        <label for="floatingInput">City</label>
                        <input type="text" class="form-control rounded-3" id="city" name="city" placeholder="Saujana Puchong" required>
                      </div>

                      <div class="col-md-6">
                        <label for="floatingInput">Postal Code</label>
                        <input type="text" class="form-control rounded-3" id="postal" name="postal" placeholder="43650" required>
                      </div>
                    </div>

                    <div class="mb-1">
                      <label for="floatingInput">Issue Date</label>
                      <input type="date" class="form-control rounded-3" id="date" name="date" required>
                    </div>
  
                      <hr class="line">
                      <div class="d-flex justify-content-between information"><span><input type="checkbox">&nbsp;Please accept our <a href="">Terms and Condition</a></span></div>
                      <div class="d-flex justify-content-between information"></div>
                      <button class="btn btn-warning btn-block d-flex justify-content-between mt-3" type="submit"><span></span><span>Proceed<i class="fa fa-long-arrow-right ml-1"></i></span></button>
                  </form>
                  </div>
                </div>
          </div>
      </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
  const tooltips = document.querySelectorAll('.tt')
  tooltips.forEach(t => {
    new bootstrap.Tooltip(t)
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/frontend/basket.blade.php ENDPATH**/ ?>