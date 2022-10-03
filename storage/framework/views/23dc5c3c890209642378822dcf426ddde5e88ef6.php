

<?php $__env->startSection('titulo', 'Categorias'); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="texto">
<h1>Categorias</h1>
</div>,


<?php if($errors->any()): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>



<!-- MODAL DO CREATE  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="<?php echo e(route('categoria.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header modal-custom">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar uma nova categoria?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-custom">
                <div class="mb-3">
                    <label class="form-label">Nome da categoria</label>
                    <input type="text" name="categoria" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer modal-custom">
                <button type="button" class="btn btn-secondary btn btn-custom-modal" data-bs-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-success btn btn-custom-card" value="Cadastar">
            </div>
            </div>
        </div>
    </form>
</div>


<div class="tabela">
<table class="table">
<thead class="table-dark">
    <tr class="table table-custom">
        <th scope="col">Id</th>
        <th scope="col">Categoria</th>
        <th scope="col">Ações</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="table table-custom">
        <th scope="row"><?php echo e($categoria->idCategoria); ?></th>
        <td><?php echo e($categoria->categoria); ?></td>
        <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar<?php echo e($categoria->idCategoria); ?>">Editar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?php echo e($categoria->idCategoria); ?>">Excluir</button>

        </td>
    </tr>
</div>
    <!-- Modal de editar -->
    <div class="modal fade" id="editar<?php echo e($categoria->idCategoria); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="<?php echo e(url("categoria/$categoria->idCategoria")); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header modal-custom">
                    <h5 class="modal-title" id="exampleModalLabel">Editar categoria <?php echo e($categoria->categoria); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-custom">
                    <div class="mb-3">
                        <label class="form-label">Nome da categoria</label>
                        <input type="text" name="categoria" value="<?php echo e($categoria->categoria); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer modal-custom">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-success btn btn-custom-card" value="Editar">
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
                <div class="modal-header modal-custom">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir categoria <?php echo e($categoria->categoria); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-custom">
                    Tem certeza que deseja excluir a categoria?
                </div>
                <div class="modal-footer modal-custom">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-success btn btn-custom-card" value="Excluir">
                </div>
                </div>
            </div>
        </form>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
</tbody>
</table>
<button type="button" class="btn btn-success btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar</button>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Downloads\Avaliacao\resources\views/categoria.blade.php ENDPATH**/ ?>