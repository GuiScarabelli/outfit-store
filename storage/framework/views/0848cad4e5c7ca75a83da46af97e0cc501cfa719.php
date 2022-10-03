

<?php $__env->startSection('titulo', 'Produtos'); ?>

<?php $__env->startSection('conteudo'); ?>
<h1>Produtos</h1>

<?php if($errors->any()): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar</button>

<!-- MODAL DO CREATE  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="<?php echo e(route('produto.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar um novo produto?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nome do produto</label>
                    <input type="text" name="produto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Valor do produto</label>
                    <input type="number" name="valor" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto do produto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoria do produto</label>
                    <select name="categoria" class="form-select" aria-label="Default select example">
                        <option selected>Selecione uma opção</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria->idCategoria); ?>"><?php echo e($categoria->categoria); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
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

    <!-- Modal de editar -->
    <div class="modal fade" id="editar<?php echo e($produto->idProduto); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="<?php echo e(url("produto/$produto->idProduto")); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar produto <?php echo e($produto->produto); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome do produto</label>
                        <input type="text" value="<?php echo e($produto->produto); ?>" name="produto" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor do produto</label>
                        <input type="number" value="<?php echo e($produto->valor); ?>"" name="valor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria do produto</label>
                        <select name="categoria" class="form-select" aria-label="Default select example">
                            <option selected>Selecione uma opção</option>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categoria->idCategoria); ?>"><?php echo e($categoria->categoria); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
    <div class="modal fade" id="excluir<?php echo e($produto->idProduto); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="<?php echo e(route('produto.destroy', $produto->idProduto)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir produto <?php echo e($produto->produto); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir o produto?
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
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Caique\Downloads\Coding\Php\Avaliacao\resources\views/produto.blade.php ENDPATH**/ ?>