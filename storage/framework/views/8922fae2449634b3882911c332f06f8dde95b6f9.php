<?php $__env->startSection('content'); ?>
<div class="container">
    <h4>Category Icons</h4>
    <a href="<?php echo e(route('category_icons.create')); ?>" class="btn btn-primary mb-3">+ Add Category Icon</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($icon->id); ?></td>
                <td><?php echo e($icon->name); ?></td>
              <td>
    <?php if($icon->icon): ?>
        <img src="<?php echo e(asset('storage/' . $icon->icon)); ?>" 
             alt="<?php echo e($icon->name); ?>" 
             width="40" height="40" 
             style="object-fit: contain;">
    <?php else: ?>
        <span class="text-muted">No Image</span>
    <?php endif; ?>
</td>

                <td><?php echo e($icon->status ? 'Active' : 'Inactive'); ?></td>
                <td>
                    <a href="<?php echo e(route('category_icons.edit',$icon->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="<?php echo e(route('category_icons.destroy',$icon->id)); ?>" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Delete this item?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5">No icons found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /www/wwwroot/khiladi.electride.taxi/resources/views/admin/category_icons/index.blade.php ENDPATH**/ ?>