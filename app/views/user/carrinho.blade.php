@extends('user.template')

@section('body')

    @if (!isset($_SESSION['type_user']))
        {{redir("entrar", false)}}
    @endif

    <section id="pagina-cabecalho" class="about-header">

        <h2>Carrinho</h2>
        <p>Adicione seu cupon para receber seu desconto</p>

    </section>

    <section id="cart" class="section-p1">
        @if($allItems != [])
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remover</td>
                        <td>Imagens</td>
                        <td>Produtos</td>
                        <td>Preço</td>
                        <td>Quantidade</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                @foreach ($allItems as $items)
                    @foreach ($items as $produto)
                    
                    <tr>
                        <form action="{{DIRPAGE.'update-carrinho'}}" method="post">
                            <input type="hidden" name="id" value="{{$produto['id']}}">
                            <td><a href="{{DIRPAGE.'remove-carrinho/'.$produto['id']}}"><i class="far fa-times-circle"></i></a></td>
                            <td><img src="{{ DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto['attributes']['id_category'])[0]->name_category.'/'.$produto['attributes']['name_product'].'/'.$produto['attributes']['img']}}" alt=""></td>
                            <td>{{$produto['attributes']['name_product']}}</td>
                            <td>{{number_format($produto['attributes']['price_unit'], 2, ',', '.')}} Akz</td>
                            <td><input type="number" value="{{$produto['quantity']}}" name="quant"></td>
                            <td><strong>{{number_format($produto['attributes']['price_unit'] * $produto['quantity'], 2, ',', '.')}} Akz</strong></td>
                    </form>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
    </section>

     <section id="cart-add" class="section-p1">
        <div id="cuopon">
            
            <div>
                
                
            </div>
        </div>

        <div id="subtotal" style="float:left;">
            <h3>Total carrinho</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>{{number_format($cart->getAttributeTotal('price_unit'), 2, ',', '.')}} Akz</td>
                </tr>
                <tr>
                    <td>14% de Iva</td>
                    <td>{{$iva = number_format($cart->getAttributeTotal('price_unit')*14/100, 2, ',', '.')}} Akz</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>{{number_format($cart->getAttributeTotal('price_unit')+$cart->getAttributeTotal('price_unit')*14/100, 2, ',', '.')}} Akz</strong></td>
                </tr>
            </table>
            <form action="{{DIRPAGE.'finalizar-compra'}}" method="post">
                <input type="hidden" name="total" value="{{$cart->getAttributeTotal('price_unit')+$cart->getAttributeTotal('price_unit')*14/100}}">
                <input type="hidden" name="subtotal" value="{{$cart->getAttributeTotal('price_unit')}}">
                <input type="hidden" name="iva" value="{{$cart->getAttributeTotal('price_unit')*14/100}}">
                <button type="submit" class="normal">Finalisar compra</button>
            </form><br>
            <a href="{{DIRPAGE.'limpar-carrinho'}}"><button class="normal">Limpar carrinho</button></a>
        </div>
    </section>
    @else
            <h4 style="margin-top: 20px; margin-bottom: 200px;"><center>Não tens nenhum produto no Carrinho</center></h4>
    @endif


@endsection