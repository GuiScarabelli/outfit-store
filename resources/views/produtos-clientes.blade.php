@extends('layouts.clientes')

@section('css')
<link href="{{ asset('css/produtos.css') }}" rel="stylesheet">

@endsection

@section('conteudo')

<div class="container-flex">
    <div class="row">
        <div class="col-sm-3">
            <div class="sidebarzinha">
                <form method="post" action="{{ route('produtos-clientes') }}">
                @csrf
                <div class="coisas">
                    <label class="form-label">Pesquisar: </label>
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="texto" placeholder="Ex: calça " aria-label="default input example">
                    </div>

                    <label class="form-label">Categorias: </label>
                    @foreach ($categorias as $categoria)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{ $categoria->idCategoria }}" name="flexRadioDefault" id="flexRadioDefault{{ $categoria->idCategoria }}">
                        <label class="form-check-label" for="flexRadioDefault{{ $categoria->idCategoria }}">
                            {{ $categoria->categoria }}
                        </label> 
                    </div>
                    @endforeach
                </div>
                
                <div class="d-grid gap-2 col-12 mt-auto">
                    <input class="btn btn-primary" type="submit" value="Enviar">
                </div>
                <br>
                
                </form>
                <div class="d-grid gap-2 col-12 mt-auto">
                    <a href="{{ route('resetar') }}" class="btn btn-danger" type="submit">Resetar</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="conteudo">
                <h1>Produtos</h1>
                <hr>
                
                <div class="scrolar">
                    <div class="row">
                        @foreach ($produtos as $produto)
    
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="/img/produtos/{{ $produto->foto }}" class="card-img-top" alt="...">
                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $produto->produto  }}</h5>
                                    <p class="card-text">
                                        R$ {{ $produto->valor }}<br>
                                        Categoria: {{ $categorias->where('idCategoria', $produto->idCategoria)->first()->categoria }}
                                    </p>
                                    <a href="#" class="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection