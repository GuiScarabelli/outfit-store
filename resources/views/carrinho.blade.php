@extends('layouts.clientes')

@section('css')
<link href="{{ asset('css/carrinho.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

<div class="conteudo">

    <h1>Carrinho de compras</h1>
    <hr>

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
            @foreach ($produtos as $produto)
            <tr>
                <th scope="row">{{ $produto->idProduto }}</th>
                <td>{{ $produto->produto }}</td>
                <td>{{ $produto->valor }}</td>
                <td><img src="/img/produtos/{{ $produto->foto }}" width="85px" height="85px"></td>
        
                <td>{{ $categorias->where('idCategoria', $produto->idCategoria)->first()->categoria }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar{{ $produto->idProduto }}">Editar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluir{{ $produto->idProduto }}">Excluir</button>
        
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection