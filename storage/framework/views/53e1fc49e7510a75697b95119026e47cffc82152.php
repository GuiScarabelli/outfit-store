

<?php $__env->startSection('titulo', 'Clientes'); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="texto">
<h1>Clientes</h1>
</div>


<?php if($errors->any()): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>


<div class="tabela">
<table class="table">
<thead class="table-dark">
    <tr class="table table-custom">
        <th scope="col">Nome</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Estado civil</th>
        <th scope="col">CEP</th>
        <th scope="col">CPF</th>
        <th scope="col">Email</th>
        <th scope="col">Celular</th>
    </tr>
</thead>
<tbody>
    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="table table-custom">
        <td><?php echo e($cliente->nomeCliente); ?></th>
        <td><?php echo e($cliente->dtNascCliente); ?></td>
        <td><?php echo e($cliente->estadoCivilCliente); ?></td>
        <td><?php echo e($cliente->cepCliente); ?></td>
        <td><?php echo e($cliente->cpfCliente); ?></td>
        <td><?php echo e($cliente->emailCliente); ?></td>
        <td><?php echo e($cliente->celularCliente); ?></td>

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Downloads\Avaliacao\resources\views/clientes.blade.php ENDPATH**/ ?>