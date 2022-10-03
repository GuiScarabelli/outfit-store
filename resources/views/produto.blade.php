@extends('layouts.navbar')

@section('titulo', 'Produtos')

@section('conteudo')
<div class="texto">
<h1>Produtos</h1>
</div>
@if($errors->any())
<div class="alert alert-danger" role="alert">
    {{ $errors->first() }}
</div>
@endif



<!-- MODAL DO CREATE  -->
<div class="modal fade modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('produto.store') }}" enctype="multipart/form-data">
        @csrf
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
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->idCategoria }}">{{ $categoria->categoria }}</option>
                        @endforeach
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
    @foreach ($produtos as $produto)
    <tr class ="table table-custom">
        <th scope="row">{{ $produto->idProduto }}</th>
        <td>{{ $produto->produto }}</td>
        <td>{{ $produto->valor }}</td>
        <td><img src="/img/produtos/{{ $produto->foto }}" width="85px"></td>

        <td>{{ $categorias->where('idCategoria', $produto->idCategoria)->first()->categoria }}</td>
        <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar{{ $produto->idProduto }}">Editar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir{{ $produto->idProduto }}">Excluir</button>

        </td>
    </tr>

    <!-- Modal de editar -->
    <div class="modal fade" id="editar{{ $produto->idProduto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ url("produto/$produto->idProduto") }}">
            @csrf
            @method('PUT')
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header modal-custom">
                    <h5 class="modal-title" id="exampleModalLabel">Editar produto {{ $produto->produto }}?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-custom">
                    <div class="mb-3">
                        <label class="form-label">Nome do produto</label>
                        <input type="text" value="{{ $produto->produto }}" name="produto" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor do produto</label>
                        <input type="number" value="{{ $produto->valor }}" name="valor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label modal-custom">Categoria do produto</label>
                        <select name="categoria" class="form-select form form-custom" aria-label="Default select example">
                            <option selected>Selecione uma opção</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->idCategoria }}">{{ $categoria->categoria }}</option>
                            @endforeach
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
    <div class="modal fade" id="excluir{{ $produto->idProduto }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('produto.destroy', $produto->idProduto) }}">
            @csrf
            @method('delete')
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header modal-custom">
                    <h5 class="modal-title modal-custom" id="exampleModalLabel">Excluir produto {{ $produto->produto }}?</h5>
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

    @endforeach

    
    
</tbody>
</table>
<div class="buttom">
        <button type="button" class="btn btn-success btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar</button>
        </div>
    
@endsection