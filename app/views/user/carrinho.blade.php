@extends('user.template')

@section('body')
    <section id="pagina-cabecalho" class="about-header">

        <h2>Carrinho</h2>
        <p>Adicione seu cupon para receber seu desconto</p>

    </section>

    <section id="cart" class="section-p1">
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
                <tr>
                    <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                    <td><img src="@php echo DIRIMG.'img/products/tel-1-samsung.png' @endphp" alt=""></td>
                    <td>Samsung M11</td>
                    <td>150.000 Akz</td>
                    <td><input type="number" value="1" name="" id=""></td>
                    <td>150.000 Akz</td>
                </tr>
                <tr>
                    <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                    <td><img src="@php echo DIRIMG.'img/products/tel-4-apple.png' @endphp" alt=""></td>
                    <td>iphone 8 plus</td>
                    <td>180.000 Akz</td>
                    <td><input type="number" value="1" name="" id=""></td>
                    <td>180.000 Akz</td>
                </tr>
                <tr>
                    <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                    <td><img src="@php echo DIRIMG.'img/products/acessorio-1.png' @endphp" alt=""></td>
                    <td>Apple watch</td>
                    <td>150.000 Akz</td>
                    <td><input type="number" value="1" name="" id=""></td>
                    <td>150.000 Akz</td>
                </tr>
            </tbody>
        </table>
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
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>480.000 Akz</strong></td>
                </tr>
            </table>
            <button class="normal">Finalisar compra</button>
        </div>
    </section>


@endsection