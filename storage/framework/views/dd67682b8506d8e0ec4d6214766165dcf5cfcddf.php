

<?php $__env->startSection('titulo', 'Categorias'); ?>

<?php $__env->startSection('conteudo'); ?>

<h1>Categorias</h1>

<?php if($errors->any()): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar</button>

<!-- MODAL DO CREATE  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="<?php echo e(route('categoria.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar uma nova categoria?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nome da categoria</label>
                    <input type="text" name="categoria" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-outline-success" value="Cadastar">
            </div>
            </div>
        </div>
    </form>
</div>


<table class="table">
<thead class="table-dark">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Categoria</th>
        <th scope="col">Ações</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th scope="row"><?php echo e($categoria->idCategoria); ?></th>
        <td><?php echo e($categoria->categoria); ?></td>
        <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar<?php echo e($categoria->idCategoria); ?>">Editar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo e($categoria->idCategoria); ?>">Excluir</button>

        </td>
    </tr>

    <!-- Modal de editar -->
    <div class="modal fade" id="editar<?php echo e($categoria->idCategoria); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="<?php echo e(url("categoria/$categoria->idCategoria")); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar categoria <?php echo e($categoria->categoria); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome da categoria</label>
                        <input type="text" name="categoria" value="<?php echo e($categoria->categoria); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-outline-success" value="Editar">
                </div>
                </div>
            </div>
        </form>
    </div>


    <!-- Modal de excluir -->
    <div class="modal fade" id="excluir<?php echo e($categoria->idCategoria); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="<?php echo e(route('categoria.destroy', $categoria->idCategoria)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir categoria <?php echo e($categoria->categoria); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir a categoria?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-outline-danger" value="Excluir">
                </div>
                </div>
            </div>
        </form>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
</tbody>
</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Caique\Downloads\Coding\Php\Avaliacao\resources\views/categoria.blade.php ENDPATH**/ ?>