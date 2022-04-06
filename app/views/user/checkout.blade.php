<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>

    <link href="{{ DIRBSCSS . 'bootstrap.min.css' }}" rel="stylesheet">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="{{ DIRCSS . 'style.css' }}">
    <link rel="stylesheet" href="{{ DIRCSS . 'estilo.css' }}">
</head>

<body>
    <link rel="stylesheet" href="{{ DIRCSS . 'estilo.css' }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <section id="cabecalho">
        <a href="index.html"><img src="img/logotipo.png" class="logo" alt=""></a>
        <div>
            <ul id="barra-navegacao">
                <li><a class="@yield('active1')" href="@php echo DIRPAGE @endphp">Home</a></li>
                <li><a class="@yield('active2')" href="@php echo DIRPAGE.'loja' @endphp">Loja</a></li>
                <li><a class="@yield('active3')" href="@php echo DIRPAGE.'sobre-nos' @endphp">Sobre nós</a></li>
                <div class="barra-navegacao-direita">

                    <li id="lg-bag"><a href="{{ DIRCSS . 'carrinho' }}" class="carrinho"><i
                                class="far fa-shopping-bag"></i><i class="fa-solid fa-cart-shopping"></i>
                            <span>0</span></a></li>
                </div>

                <a id="fechar" href="#"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="carrinho.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>

        </div>
    </section>

    <section id="pagina-cabecalho" class="about-header">

        <h2>checkout</h2>


    </section>


    <!--começo do formulario de check-out-->
    <div class="container mb-5">
        <div class="py-5 text-center ">
            <h2>
                <p class="lead">Finalizar compra</p>
            </h2>
        </div>
    </div>

    <div class="container">
        <form novalidate method="POST" action="{{DIRPAGE.'checkout'}}">
            <div class="row g-3">
                <!--inicio da div col nº 1-->
                <div class="col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" value="{{ $_SESSION['name_user'] }}" class="form-control"
                        placeholder="Insira o teu nome" required>
                    <div class="invalid-feedback">
                        Obrigatorio
                    </div>
                </div>

                <!--FIM da div col nº 3-->

                <!--inicio da div col nº 3-->
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>

                    <input type="email" name="email" value="{{ $_SESSION['email'] }}" class="form-control"
                        placeholder="Insira o teu email" required>
                    <div class="invalid-feedback">
                        Email
                    </div>
                </div>
                <!--FIM da div col nº 3-->

                

                <!--inicio da div col nº 4-->
                <div class="col-6">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" name="numero" id="" class="form-control"
                        placeholder="Insira o teu número de Telemóvel" required>
                    <div class="invalid-feedback">
                        Número
                    </div>
                </div>
                <!--FIM da div col nº 4-->

                <div class="col-12">
                    <label for="morada" class="form-label">Morada</label>
                    <input type="text" name="morada" id="" class="form-control" placeholder="Bairro, Rua, Porta..."
                        required>
                    <div class="invalid-feedback">
                        Morada
                    </div>
                </div>

                <hr class="my-4">


                <div class="container bg-muted mb-5">
                    <div class="container mt-0">
                        <!--tabela-->
                        <div class="todos-pedidos mt-5">
                            <h3>Encomenda</h3>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th scope="col">Produto</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allItems as $items)
                                        @foreach ($items as $produto)
                                            <tr>
                                                <th>{{ $produto['attributes']['name_product'] }}</th>
                                                <th>{{ $produto['quantity'] }}</th>
                                                <td>{{ number_format($produto['attributes']['price_unit'] * $produto['quantity'], 2, ',', '.') }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th scope="col">Custos</th>
                                        <th scope="col">Valor</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>{{ number_format($subtotal, 2, ',', '.') }} kz</td>
                                </tr>
                                <tr>
                                    <th>14% de Iva</th>
                                    <td>{{ number_format($iva, 2, ',', '.') }} kz</td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <input type="hidden" name="total" value="{{$total}}">
                                    <td>{{ number_format($total, 2, ',', '.') }} kz</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                        <!-- FIM da tabela-->
                        <hr class="my-3">
                        <h4 class="mb-3">Pagamento</h4>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Opções</label>
                            </div>
                            <select name="pagamento" class="custom-select" id="inputGroupSelect01">
                              <option selected>Tipo de Pagamento.</option>
                              <option value="Na Entrega">Pagamento na Entrega</option>
                              <option value="Tranferência">Pagamento por Transferência</option>
                            </select>
                          </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block rounded-left">Finalizar compra</button>

            </div>
            <!--FIM da DIV ROW-->
        </form>
        <!--FIM do FORM-->
    </div>
    <!--FIM da div container-->
    <!--começo do formulario de check-out-->


    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logotipo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Endereço: </strong> Bairro Cassenda, Rua X</p>
            <p><strong>Contacto:</strong> (+244) 917 431 330 /(+244) 928 589 327</p>
            <p><strong>Horas:</strong> 10:00 - 18:00, Seg - Sab</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>Sobre</h4>
            <a href="#">sobre nós</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>Minha conta</h4>
            <a href="#">Sign In</a>
            <a href="#">Ver carrinho</a>
        </div>

        <div class="copyright">
            <p>© 2021, Colegio Mara e Lú, BHJVV</p>
        </div>
    </footer>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>


</body>

</html>
