

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<h1>Bem-vindo</h1>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.clientes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Downloads\Avaliacao\resources\views/index.blade.php ENDPATH**/ ?>