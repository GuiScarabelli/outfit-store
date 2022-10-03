<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link href="{{ asset('css/registro.css') }}" rel="stylesheet">
    <title>Document</title>

    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script></script>
    <script src="{{ asset('js/validarCep.js') }}"></script>
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
    <div class="quadrado">
        <div class="conteudo">
            <h1>Registro</h1>
            <hr>
            <form id="regForm" method="POST" action="{{ route('cadastrar') }}">
                @csrf

                <div class="tab">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Nome</span>
                        <input type="text" name="nome" class="form-control"  placeholder="Ex: Caique">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Data de nascimento</span>
                        <input type="date" name="data" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Estado civil</span>
                        <input type="text" name="civil" class="form-control" id="exampleFormControlInput1" placeholder="Ex: Solteiro">
                    </div>      
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Rg</span>
                        <input type="text" name="rg" class="form-control" id="exampleFormControlInput1" placeholder="Ex: Senha123">
                        <span class="input-group-text" id="basic-addon2">Cpf</span>
                        <input type="text" name="cpf" class="form-control" id="cpf" placeholder="Ex: Senha123">
                    </div>
                </div>
                <div class="tab">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Cep</span>
                        <input type="text" class="form-control" name="cep" id="cep" placeholder="Ex: 00000-000">
                        <input type="button" class="btn btn-success" value="Verificar" id="validar">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Rua</span>
                        <input type="text" class="form-control" name="endereco" id="rua"  placeholder="Ex: RUA SAO JOSE">
                        <span class="input-group-text" id="basic-addon2">Número</span>
                        <input type="text" class="form-control" name="numero"  placeholder="Ex: 10">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Cidade</span>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Ex: São Paulo">
                        <span class="input-group-text" id="basic-addon2">Estado</span>
                        <input type="text" class="form-control" name="estado" id="uf"  placeholder="Ex: SP">
                    </div>
                </div>
                <div class="tab">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="tel" placeholder="(00) 0000-0000">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Celular</label>
                        <input type="text" class="form-control" name="celular" id="cel" placeholder="(00) 00000-0000">
                    </div>
                </div>
                <div class="tab">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" id="exampleFormControlInput1" placeholder="Ex: Senha123">
                    </div>
                </div>

                Já possui login? <a href="{{ route('loginPage') }}">Entrar</a>
                <div class="d-grid gap-2">
                    <div style="overflow:auto;">
                        <div style="float:right;">
                          <button type="button" class="btn btn-custom" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          <button type="button" class="btn btn-custom" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                      </div>
                </div>
            </form>
        </div>
        <div style="text-align:center;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </div>
    <script src="{{ asset('js/teste.js') }}"></script> 

</body>
</html>


