

<?php $__env->startSection('content'); ?>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                
            <?php endif; ?>
<div class="max-width">
        <div class="d-flex ai-center justify-content-between subtitulo">
            <p class="titulo-sec"><?php echo e(__('Listado de posts')); ?></p>
            
        </div>
        <hr class="mb-3">
        <?php if(count($posts) > 0): ?>
            <div class="table-container">
                <table class="table bg-nutricionistas">
                    <thead class="text-left">
                        <tr class="nowrap">
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Actualizado</th>
                            <th>Usuario</th>
                            <th>Rating</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr-contenido">
                        <td><?php echo e($post->id); ?></td>
                        <td><?php echo e($post->title); ?></td>
                        <td><?php echo e($post->body); ?></td>
                        <td><?php echo e($post->updated_at); ?></td>
                        <td><?php echo e($post->user->name); ?></td>
                        <td><?php echo e($post->rating); ?></td>
                            <td>
                                <div class="d-flex justify-content-end action-list">
                                    <a href="<?php echo e(route('posts.edit', ['id' => $post->id])); ?>" class="btn-editar">Editar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($posts->links()); ?>

            </div>
        <?php else: ?>
            <p><?php echo e(__('Todavía no ha creado ningún post')); ?></p>
        <?php endif; ?>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\backend-challenge\resources\views/posts/index.blade.php ENDPATH**/ ?>