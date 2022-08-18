

<?php $__env->startSection('content'); ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                
            <?php endif; ?>
<div class="max-width">
        <div class="d-flex ai-center justify-content-between subtitulo">
            <p class="titulo-sec"><?php echo e(__('Editar usuario')); ?></p>
            
        </div>
        <hr class="mb-3">
        <?php if($user): ?>
            <div class="table-container">
                <h3>Plantilla en desarrollo</h3>
            </div>
        <?php else: ?>
            <p><?php echo e(__('Todavía no ha creado ningún usuario')); ?></p>
        <?php endif; ?>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\backend-challenge\resources\views/users/edit.blade.php ENDPATH**/ ?>