<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    
    <script src="<?php echo e(asset('js/jquery-3.6.1.min.js')); ?>"></script></script>
    <script src="<?php echo e(asset('js/jquery.mask.js')); ?>"></script></script>
    <script src="<?php echo e(asset('js/validarCep.js')); ?>"></script>
    <script>
        $(document).ready(function($) {
            $("#tel").mask("(00) 0000-0000");
            $("#cel").mask("(00) 00000-0000");
            $("#cep").mask("00000-000");
            $("#cpf").mask("000.000.000-00");
            $("#uf").mask("AA");
        });
    </script>
</head>
<body>
    <form method="POST" action="<?php echo e(route('cadastrar')); ?>">
        <?php echo csrf_field(); ?>
        <label>Nome do cliente</label>
        <input type="text" name="nome"><br>

        <label>Senha do cliente</label>
        <input type="password" name="senha"><br>

        <label>Data de nascimento do cliente</label>
        <input type="date" name="data"><br>
        
        <label>Estado civil do cliente</label>
        <input type="text" name="civil"><br>

        <label>Cep do cliente</label>
        <input type="text" name="cep" id="cep">
        <button type="button" class="btn btn-primary" id="validar">Validar</button>
        <br>
        
        
        <label>Endereço do cliente</label>
        <input type="text" name="endereco" id="rua"><br>
        
        <label>Número do cliente</label>
        <input type="number" name="numero"><br>
        
        <label>Cidade do cliente</label>
        <input type="text" name="cidade" id="cidade"><br>
        
        <label>Estado do cliente</label>
        <input type="text" name="estado" id="uf"><br>
        
        <label>Rg do cliente</label>
        <input type="text" name="rg" id="rg"><br>

        <label>Cpf do cliente</label>
        <input type="text" name="cpf" id="cpf"><br>

        <label>E-mail do cliente</label>
        <input type="email" name="email"><br>

        <label>Telefone do cliente</label>
        <input type="text" name="telefone" id="tel"><br>

        <label>Celular do cliente</label>
        <input type="text" name="celular" id="cel"><br>

        <input type="submit" value="cadastrar"><br>

    </form>
    
</body>
</html><?php /**PATH D:\Caique\Downloads\Coding\Php\Avaliacao\resources\views/registro.blade.php ENDPATH**/ ?>