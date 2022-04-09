@extends('admin.template')

@section('body')


<div class="todos-pedidos mt-5">
    <hr>
    <h3>Vendas</h3>
<table class="table table-bordered table-hover">

    <thead>
      <tr class="bg-primary text-white">
        <th scope="col">ID da Venda</th>
        <th scope="col">Forma de Pagamento</th>
        <th scope="col">Nome do Cliente</th>
        <th scope="col">Data da Venda</th>
        <th scope="col">Opções</th>
      </tr>
    </thead>
    <tbody>
        @if(isset($sales))
          @foreach ($sales as $venda)
            <tr>
                <th scope="row">{{$venda->id}}</th>
                <td>{{$venda->tipo_pagamento}}</td>
                <td>{{App\Models\User::getUserById($venda->id_user)['name_user']}}</td>
                <td>{{date_format(date_create($venda->data_create),"d-m-Y H:i:s")}}</td>
                <td>
                  <a href="{{DIRPAGE.'admin-detalhes-venda/'.$venda->id}}"><button class="btn btn-primary btn-sm mb-2">Ver Detalhes</button></a>
                </td>
            </tr>
            @endforeach
        @else
            <h3>Nenhuma Venda Efectuada...</h3>
        @endif
    </tbody>
  </table>

@endsection