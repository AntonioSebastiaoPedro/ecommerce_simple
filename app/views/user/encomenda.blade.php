@extends('user.template')
@section('body')
    @if($_SESSION['type_user'] != 1 or !isset($_SESSION['type_user']))
        {{redir('entrar', false)}}
    @endif
    @if(isset($encomendas))
    <div class="jumbotron">
        <h1 class="display-4">Olá, {{$_SESSION['name_user']}}</h1>
          <p class="lead">A sua encomenda está em processamento, por favor aguarde em sua localização para entrega.</p>
          <hr class="my-4">
            <b><p>Caso pretenda pagar por transferência, e Ainda Não o Fez, Envie o Compravativo da Transferência Para o Nosso Whatsapp .</p></b>
    </div>

    <div class="container">
      @foreach ($encomendas as $encomenda)
        <table class="table">
            <h4>Informações dos Produtos</h4>
            <thead>
              <tr>
                <th scope="col">Produtos</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Subtotal</th>
                <th scope="col">14% de IVA</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach(App\Models\Order::getProductsOfOrder($encomenda->id) as $produto)
                  <tr>
                    <th scope="row">{{$produto->name_product}}</th>
                    <td>{{number_format($produto->price_unit, 2, ',', '.')}} kz</td>
                    <td>{{$produto->quant}}</td>
                    <td>{{number_format($produto->subtotal, 2, ',', '.')}} kz</td>
                    <td>{{number_format($produto->subtotal * 14/100, 2, ',', '.')}} kz</td>
                    <td>{{number_format($produto->subtotal + 14/100 * $produto->subtotal, 2, ',', '.')}} kz</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          <hr width="3">
          <table class="table">
              <h4>Informações da Encomenda</h4>
            <tbody>
                  <tr>
                    <th scope="row">Total</td>
                    <td>{{number_format($encomenda->total, 2, ',', '.')}} kz</td>
                  </tr>
                  <tr>
                    <th scope="row">Tipo de Pagamento</td>
                    <td>{{$encomenda->tipo_pagamento}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Status da Entrega</td>
                    <td>{{$encomenda->status_entrega}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Status de Pagamento</td>
                    <td>{{$encomenda->status_pago}}</td>
                  </tr>
                
            </tbody>
          </table>
          <a href="{{DIRPAGE.'admin-entregue/'.$encomenda->id.'/'.$_SESSION['id_user']}}"><button class="btn btn-success btn-block mb-2">Encomenda Entregue</button></a>
          <a href="{{DIRPAGE.'cancelar-encomenda/'.$encomenda->id}}"><button class="btn btn-danger btn-block">Cancelar Encomenda</button></a><br><br><hr>
          @endforeach
  @else
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">Sem Encomendas</h4>
            <p>Você Não Tem Nenhum Encomenda Pendente.</p>
          </div>
  @endif
    </div>
@endsection