

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="<?php echo e(asset('img/dank1.png')); ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="<?php echo e(asset('img/dank2.jpg')); ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="<?php echo e(asset('img/dank3.jpg')); ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<br><br>
<h1>Novidades:</h1>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.clientes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Caique\Downloads\Coding\Php\Avaliacao\resources\views/index.blade.php ENDPATH**/ ?>