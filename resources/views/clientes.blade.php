@extends('layouts.navbar')

@section('titulo', 'Clientes')

@section('conteudo')

<div class="texto">
<h1>Clientes</h1>
</div>


@if($errors->any())
<div class="alert alert-danger" role="alert">
    {{ $errors->first() }}
</div>
@endif


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
    @foreach ($clientes as $cliente)
    <tr class="table table-custom">
        <td>{{ $cliente->nomeCliente }}</th>
        <td>{{ $cliente->dtNascCliente }}</td>
        <td>{{ $cliente->estadoCivilCliente }}</td>
        <td>{{ $cliente->cepCliente }}</td>
        <td>{{ $cliente->cpfCliente }}</td>
        <td>{{ $cliente->emailCliente }}</td>
        <td>{{ $cliente->celularCliente }}</td>

    </tr>
    @endforeach
</tbody>
</table>
</div>


@endsection