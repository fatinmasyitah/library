
<?php $__env->startSection('title', 'Publisher'); ?>
<?php $__env->startSection('content'); ?>
    
<div class="section-header">
    <h1><?php echo e($page_title); ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Publisher list</a></div>
    </div>
</div>
        <div class="section-body"> 
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h4><?php echo e($sub_title); ?></h4>
                          <div class="card-header-form">
                            <form action="" id="searchList" method="GET">
                              <div class="search-element">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-height="40"  name="search" onkeypress="document.getElementById('searchList')">
                              </div>          
                          </div>
                        </div>
                                                         
                 <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Publisher Name</th>
                                <th>Publisher Email</th>
                                <th>Publisher Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + $publishers->firstItem()); ?></td>
                                    <td><?php echo e($item->publishername); ?></td>
                                    <td><?php echo e($item->publisheremail); ?></td>
                                    <td><?php echo e($item->publisheraddress); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo e(route('publisher.edit', $item->id)); ?>" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <button class="btn btn-danger delete" type="button" id="<?php echo e($item->id); ?>" class="btn btn-primary"
                                            data-toggle="modal " data-target="#exampleModal"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                        </tbody>                    
                    </table>
                    </form>
                  </div>
            </div>
        </div>
        
    </div>
    
</div>

<div class="page-center page-item">
     <?php echo e($publishers->links()); ?>

</div>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" >
    <div class="modal-dialog">
        <form id="deleteModal" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('.delete').on('click', function () {
            const id = this.id;
            $('#deleteModal').attr('action', "<?php echo e(route('publisher.destroy', '')); ?>" + '/' + id);
        });
    </script>

    <script>
        $('.modal').click(function(event){
        $(event.target).modal('hide');
     });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/publisher/index.blade.php ENDPATH**/ ?>