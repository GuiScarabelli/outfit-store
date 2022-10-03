<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">

    <title>Login</title>
</head>
<body>
<?php if($errors->any()): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e($errors->first()); ?>

</div>
<?php endif; ?>

    <!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Login</h2>
 
  <form id="login-form" method="POST" action="<?php echo e(route('autenticar')); ?>">
  <?php echo csrf_field(); ?>
    <input type="text" id="username" name="login" placeholder="E-mail" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="password" id="email" name="senha" placeholder="Senha" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="submit" id="login" value="enviar">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Não possui conta? <a href="<?php echo e(route('registroPage')); ?>">Registrar-se</a><p>
  </div>
</div>

       
</body>
</html><?php /**PATH C:\Users\Admin\Downloads\Avaliacao\resources\views/login.blade.php ENDPATH**/ ?>