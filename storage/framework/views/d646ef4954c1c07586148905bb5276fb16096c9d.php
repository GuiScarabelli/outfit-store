<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('titulo'); ?></title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="<?php echo e(asset('css/navbar.css')); ?>" rel="stylesheet">

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('dashboardPage')); ?>">Administrativo</a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('categoria.index')); ?>">Categorias</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('produto.index')); ?>">Produtos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pedidos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('cliente.index')); ?>">Clientes</a>
                </li>
                
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Sair</a>
                </li>
            </ul>

            </div>
        </div>
    </nav>

    <div class="conteudo">
        <?php echo $__env->yieldContent('conteudo'); ?>
    </div>
</body>
</html><?php /**PATH D:\Caique\Downloads\Coding\Php\Avaliacao\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>