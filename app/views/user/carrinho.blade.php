@extends('user.template')

@section('body')
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
                        <td><a href="{{DIRPAGE.'remove-carrinho/'.$produto['id']}}"><i class="far fa-times-circle"><button class="normal">Remover</button></i></a></td>
                        <td><img src="{{ DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto['attributes']['id_category'])[0]->name_category.'/'.$produto['attributes']['name_product'].'/'.$produto['attributes']['img']}}" alt=""></td>
                        <td>{{$produto['attributes']['name_product']}}</td>
                        <td>{{number_format($produto['attributes']['price_unit'], 2, ',', '.')}} Akz</td>
                        <td><input type="number" value="{{$produto['quantity']}}" name="quantity" id=""></td>
                        <td></td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        @else
            <h4><center>Não tens nenhum produto no Carrinho</center></h4>
        @endif
    </section>

     <section id="cart-add" class="section-p1">
        <div id="cuopon">
            <h3>Aplicar cupon</h3>
            <div>
                <input type="text" name="" id="" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="subtotal">
            <h3>Total carrinho</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>480.000 Akz</td>
                </tr>
                <tr>
                    <td>14% de Iva</td>
                    <td>{{number_format($cart->getAttributeTotal('price_unit')*14/100, 2, ',', '.')}} Akz</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>{{number_format($cart->getAttributeTotal('price_unit'), 2, ',', '.')}} Akz</strong></td>
                </tr>
            </table>
            <button class="normal">Finalisar compra</button>
        </div>
    </section>


@endsection