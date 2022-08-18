

<?php $__env->startSection('content'); ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                
            <?php endif; ?>
<div class="max-width">
        <div class="d-flex ai-center justify-content-between subtitulo">
            <p class="titulo-sec"><?php echo e(__('Listado de usuarios')); ?></p>
            
        </div>
        <hr class="mb-3">
        <?php if(count($users) > 0): ?>
            <div class="table-container">
                <table class="table bg-nutricionistas">
                    <thead class="text-left">
                        <tr class="nowrap">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Actualizado</th>
                            <th>Ciudad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--?php
                    echo "<pre>";
                    print_r($post->users);
                    exit;
                    ?-->
                    <tr class="tr-contenido">
                        <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->updated_at); ?></td>
                        <td><?php echo e($user->city); ?></td>
                            <td>
                                <div class="d-flex justify-content-end action-list">
                                    <a href="<?php echo e(route('users.edit', ['id' => $user->id])); ?>" class="btn-editar">Editar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($users->links()); ?>

            </div>
        <?php else: ?>
            <p><?php echo e(__('Todavía no ha creado ningún usuario')); ?></p>
        <?php endif; ?>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\backend-challenge\resources\views/users/index.blade.php ENDPATH**/ ?>