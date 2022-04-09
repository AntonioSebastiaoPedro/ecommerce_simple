@extends('admin.template')
@section('body')
<h3 style="text-align: center;margin-bottom:40px">Detalhes da Venda</h3>
    <div class="container">
        <table class="table">
            <h4>Informações dos Produtos Vendidos</h4>
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
              @foreach($details as $produto)
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
              <h4>Informações da Venda</h4>
            <tbody>
                    <tr>
                    <th scope="row">ID da Venda</td>
                    <td>{{$id_venda}}</td>
                  </tr>
                  <tr>
                  <tr>
                    <th scope="row">Total Pago</td>
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
                    <th scope="row">Data da venda</td>
                    <td>{{date_format(date_create($encomenda->data_create),"d-m-Y H:i:s")}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Cliente</td>
                    <td>{{App\Models\User::getUserById($encomenda->id_user)['name_user']}}</td>
                  </tr>
                
            </tbody>
          </table>
    </div>
@endsection