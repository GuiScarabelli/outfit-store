@extends('layouts.navbar')

@section('titulo', 'Categorias')

@section('conteudo')

<div class="texto">
<h1>Categorias</h1>
</div>,


@if($errors->any())
<div class="alert alert-danger" role="alert">
    {{ $errors->first() }}
</div>
@endif



<!-- MODAL DO CREATE  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('categoria.store') }}">
        @csrf
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
    @foreach ($categorias as $categoria)
    <tr class="table table-custom">
        <th scope="row">{{ $categoria->idCategoria }}</th>
        <td>{{ $categoria->categoria }}</td>
        <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar{{ $categoria->idCategoria }}">Editar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir{{ $categoria->idCategoria }}">Excluir</button>

        </td>
    </tr>
</div>
    <!-- Modal de editar -->
    <div class="modal fade" id="editar{{ $categoria->idCategoria }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ url("categoria/$categoria->idCategoria") }}">
            @csrf
            @method('PUT')
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header modal-custom">
                    <h5 class="modal-title" id="exampleModalLabel">Editar categoria {{ $categoria->categoria }}?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-custom">
                    <div class="mb-3">
                        <label class="form-label">Nome da categoria</label>
                        <input type="text" name="categoria" value="{{ $categoria->categoria }}" class="form-control" required>
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
    <div class="modal fade" id="excluir{{ $categoria->idCategoria }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="{{ route('categoria.destroy', $categoria->idCategoria) }}">
            @csrf
            @method('delete')
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header modal-custom">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir categoria {{ $categoria->categoria }}?</h5>
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

    @endforeach
    
    
</tbody>
</table>
<button type="button" class="btn btn-success btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar</button>

@endsection