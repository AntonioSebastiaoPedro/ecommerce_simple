@extends('admin.template')

@section('body')
<div class="todos-pedidos mt-5">
    <hr>
    <h3>Encomendas</h3>
<table class="table table-bordered table-hover">

    <thead>
      <tr class="bg-primary text-white">
        <th scope="col">ID da Encomenda</th>
        <th scope="col">Status da Encomenda</th>
        <th scope="col">Status do Pagamento</th>
        <th scope="col">Tipo de Pagamento</th>
        <th scope="col">Nome do Usuário</th>
        <th scope="col">Data de Criação</th>
        <th scope="col">Opções</th>
      </tr>
    </thead>
    <tbody>
        @if(isset($orders))
          @foreach ($orders as $encomenda)
            <tr>
                <th scope="row">{{$encomenda->id}}</th>
                <td>{{$encomenda->status_entrega}}</td>
                <td>{{$encomenda->status_pago}}</td>
                <td>{{$encomenda->tipo_pagamento}}</td>
                <td>{{App\Models\User::getUserById($encomenda->id_user)['name_user']}}</td>
                <td>{{date_format(date_create($encomenda->data_create),"d-m-Y H:i:s")}}</td>
                <td>
                    <button class="btn btn-success btn-sm mb-2"><a href="{{DIRPAGE.'admin-pago/'.$encomenda->id}}">Pago</a></button>
                    <button class="btn btn-danger btn-sm"><a href="{{DIRPAGE.'admin-cancelar-encomenda/'.$encomenda->id}}">Cancelar</a></button>
                </td>
            </tr>
            @endforeach
        @else
            <h3>Nenhuma encomenda...</h3>
        @endif
    </tbody>
  </table>
@endsection