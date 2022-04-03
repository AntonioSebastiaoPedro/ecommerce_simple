<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BHJVV E-commerce! @yield('tittle') </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="shortcut icon" href="@php echo DIRIMG.'img/logotipo.png' @endphp">
    @yield('css')
    <link rel="stylesheet" href="@php echo DIRCSS.'style.css' @endphp">
</head>

<body>

    <section id="cabecalho">
        <a href="@php echo DIRPAGE @endphp"><img src="@php echo DIRIMG.'img/logotipo.png' @endphp" class="logo" alt=""></a>

        <div>
            <ul id="barra-navegacao">
                <li><a class="@yield('active1')" href="@php echo DIRPAGE @endphp">Home</a></li>
                <li><a class="@yield('active2')" href="@php echo DIRPAGE.'loja' @endphp">Loja</a></li>
                <li><a class="@yield('active3')" href="@php echo DIRPAGE.'sobre-nos' @endphp">Sobre nós</a></li>
                <!--nav direita-->
                <div class="barra-navegacao-direita">

                <li id="lg-carrinho"><a href="@php echo DIRPAGE.'carrinho' @endphp" class="carrinho"><i class="far fa-shopping-bag"></i><i class="fa-solid fa-cart-shopping"></i>
                    <span>0
                    </span></a></li>
                
                </div>
                <!--nav direita fim-->
                <a href="#" id="fechar"><i class="far fa-times"></i></a>

                
            </ul>
            
        </div>
        <div id="mobile">
            <a href="carrinho.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    @if (isset($erros))
        @if(!empty($erros))
            @foreach($erros as $erro)
                <ul class="nav flex-column">
                <li class="nav-item">
                    <div class="alert alert-danger" role="alert">
                        <b> {{$erro}} </b>
                    </div>
                </li>
                </ul>
            @endforeach
        @endif

    @endif
    @yield('body')


<!-- FOOTER-->
<section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Cadastre-se para novidades</h4>
            <p>receba atulizações por Email <span>ofertas especiais</span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Seu Email">
            <button class="normal">Registra-se</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="@php echo DIRIMG.'img/logotipo.png' @endphp" alt="">
            <h4>Contacto</h4>
            <p><strong>Endereço: </strong> Bairro Cassenda, Rua 15</p>
            <p><strong>Contacto:</strong> (+244) 941 563 468 /(+244) 928 589 327</p>
            <p><strong>Horas:</strong> 08:00 - 18:00, Seg - Sab</p>
            <div class="follow">
                <h4>Siga-nos</h4>
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
            <a href="€php echo DIRGPAGE.'sobre-nós' @endphp">Sobre nós</a>
            <a href="@php echo DIRPAGE.'contactar' @endphp">Contacta-nos</a>
        </div>

        <div class="col">
            <h4>Minha conta</h4>
            <a href="{{DIRPAGE.'entrar'}}">Iniciar Sessão</a>
            <a href="{{DIRPAGE.'carrinho'}}">Ver carrinho</a>
            @if(isset($_SESSION['type_user']))
                <a href="{{DIRPAGE.'sair'}}">Sair</a>
            @endif
        </div>

        <div class="copyright">
            <p>© 2021, Colegio Mara e Lú, BHJVV</p>
        </div>
    </footer>

    @yield('js')
    <script src="@php echo DIRJS.'script.js' @endphp"></script>
</body>

</html>