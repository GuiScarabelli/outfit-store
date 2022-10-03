

<?php $__env->startSection('titulo', 'Produtos'); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="texto">
<h1>Produtos</h1>
</div>
<?php if($errors->any()): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>



<!-- MODAL DO CREATE  -->
<div class="modal fade modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="<?php echo e(route('produto.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header modal-custom">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar um novo produto?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-custom">
                <div class="mb-3">
                    <label class="form-label">Nome do produto</label>
                    <input type="text" name="produto" class="form-control form form-custom" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Valor do produto</label>
                    <input type="number" name="valor" class="form-control form form-custom" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto do produto</label>
                    <input type="file" name="foto" class="form-control form form-custom" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Categoria do produto</label>
                    <select name="categoria" class="form-select form form-custom" aria-label="Default select example">
                        <option selected>Selecione uma opção</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria->idCategoria); ?>"><?php echo e($categoria->categoria); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer modal-custom">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-success btn btn-custom-card" value="Cadastar">
            </div>
            </div>
        </div>
    </form>
</div>



<div class="tabela">
<table class = "table table-dark table-striped">
<thead class="table-dark">
    <tr class ="table table-custom">
        <th  scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Valor</th>
        <th scope="col">Foto</th>
        <th scope="col">Categoria</th>
        <th scope="col">Ações</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class ="table table-custom">
        <th scope="row"><?php echo e($produto->idProduto); ?></th>
        <td><?php echo e($produto->produto); ?></td>
        <td><?php echo e($produto->valor); ?></td>
        <td><img src="/img/produtos/<?php echo e($produto->foto); ?>" width="85px"></td>

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
                <div class="modal-header modal-custom">
                    <h5 class="modal-title" id="exampleModalLabel">Editar produto <?php echo e($produto->produto); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-custom">
                    <div class="mb-3">
                        <label class="form-label">Nome do produto</label>
                        <input type="text" value="<?php echo e($produto->produto); ?>" name="produto" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor do produto</label>
                        <input type="number" value="<?php echo e($produto->valor); ?>" name="valor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label modal-custom">Categoria do produto</label>
                        <select name="categoria" class="form-select form form-custom" aria-label="Default select example">
                            <option selected>Selecione uma opção</option>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categoria->idCategoria); ?>"><?php echo e($categoria->categoria); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer modal-custom">
                    <button type="button" class="btn btn-secondary btn btn-custom-editar" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-success" value="Editar">
                </div>
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
                <div class="modal-header modal-custom">
                    <h5 class="modal-title modal-custom" id="exampleModalLabel">Excluir produto <?php echo e($produto->produto); ?>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-custom">
                    Tem certeza que deseja excluir o produto?
                </div>
                <div class="modal-footer modal-custom">
                    <button type="button" class="btn btn-secondary btn btn-custom-excluir" data-bs-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger" value="Excluir">
                </div>
                </div>
            </div>
        </form>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    
</tbody>
</table>
<div class="buttom">
        <button type="button" class="btn btn-success btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar</button>
        </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Downloads\Avaliacao\resources\views/produto.blade.php ENDPATH**/ ?>