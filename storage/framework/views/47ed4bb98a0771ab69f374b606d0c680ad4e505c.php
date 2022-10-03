

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/carrinho.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="conteudo">

    <h1>Carrinho de compras</h1>
    <hr>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Foto</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($produto->idProduto); ?></th>
                <td><?php echo e($produto->produto); ?></td>
                <td><?php echo e($produto->valor); ?></td>
                <td><img src="/img/produtos/<?php echo e($produto->foto); ?>" width="85px" height="85px"></td>
        
                <td><?php echo e($categorias->where('idCategoria', $produto->idCategoria)->first()->categoria); ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar<?php echo e($produto->idProduto); ?>">Editar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo e($produto->idProduto); ?>">Excluir</button>
        
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.clientes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Caique\Downloads\Coding\Php\Avaliacao\resources\views/carrinho.blade.php ENDPATH**/ ?>