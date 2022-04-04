@extends('user.template')
@section('body')
    @if($_SESSION['type_user'] != 1 or !isset($_SESSION['type_user']))
        {{redir('entrar', false)}}
    @endif
    <div class="jumbotron">
        <h1 class="display-4">Olá, {{$_SESSION['name_user']}}</h1>
        @if (isset($tipo_pagamento))
          <p class="lead">A sua encomenda está em processamento, por favor aguarde em sua localização para entrega.</p>
          <hr class="my-4">
          @if ($tipo_pagamento == "Tranferência")
            <b><p>Se Ainda Não o Fez, Envie o Compravativo da Transferência Para o Nosso Whatsapp .</p></b>
          @endif
    </div>

    <div class="container">
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
                  @foreach ($encomenda as $encomenda)
                  <tr>
                    <th scope="row">{{$encomenda->name_product}}</th>
                    <td>{{number_format($encomenda->price_unit, 2, ',', '.')}} kz</td>
                    <td>{{$encomenda->quant}}</td>
                    <td>{{number_format($encomenda->subtotal, 2, ',', '.')}} kz</td>
                    <td>{{number_format($encomenda->subtotal * 14/100, 2, ',', '.')}} kz</td>
                    <td>{{number_format($encomenda->subtotal + 14/100 * $encomenda->subtotal, 2, ',', '.')}} kz</td>
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
          <a href="{{DIRPAGE.'cancelar-encomenda'}}"><button class="btn btn-danger btn-block">Cancelar Encomenda</button></a>
        @else
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">Sem Encomendas</h4>
            <p>Você Não Tem Nenhum Encomenda Pendente.</p>
          </div>
        @endif
    </div>
@endsection