@extends('user.template')
@section('active1', 'active')

@section('body')
<!--banner do cabeçalho-->
    <section id="hero">
        <h4>Ofertas e bônus</h4>
        <h2>Preços acessiveis</h2>
        <h1>Em todos produtos</h1>
        <p>Aproveite</p>
        <button>Compre já</button>
    </section>
<!--banner do cabeçalho fim-->

<!--produtos mais vendidos-->
    <section id="producto1" class="section-p1">
        <h2>Mais vendidos</h2>
        <p>Os produtos em alta</p>
        <!--produto 1 -->
        <div class="pro-container">
            <div class="pro">
                <img src="img/products/tel-3-apple.png" alt="">
                <div class="des">
                    <span>APPLE</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>

                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 1 fim -->

            <!--produto 2 -->
            <div class="pro">
                <img src="img/products/tel-3-samsung.png" alt="">
                <div class="des">
                    <span>SAMSUNG</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 2 fim -->

            <!--produto 3 -->
            <div class="pro">
                <img src="img/products/acessorio-2.png" alt="">
                <div class="des">
                    <span>ACESSORIO</span>
                    <h5>Suport Phone</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>23.559 Kz</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 3 fim-->

            <!--produto 4 -->
            <div class="pro">
                <img src="img/products/acessorio-4.png" alt="">
                <div class="des">
                    <span>ACESSORIO</span>
                    <h5>Head Phones</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>27.000 Kz</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 4 fim -->
            
    </section>
    <!--produtos mais vendidos-->

    <!--banner informativo 1 toda tela-->
    <section id="banner" class="section-m1">
        <h4>Produtos incriveis </h4>
        <h2>atualizações <span>Sempre</span> – sobre todos os produtos</h2>
        <button class="normal">Explore Mais</button>
    </section>
    <!--Banner iformativo 1 toda tela fim-->

    <!--produtos mais vendidos-->
    <section id="producto1" class="section-p1">
        <h2>Novos produtos</h2>
        <p>Colecção de novos produtos</p>
        <!--produto 1 -->
        <div class="pro-container">
            <div class="pro">
                <img src="@php echo DIRIMG.'img/products/tel-1-apple.png' @endphp" alt="">
                <div class="des">
                    <span>APPLE</span>
                    <h5>Iphone 13</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 1 fim -->

            <!--produto 2 -->
            <div class="pro">
                <img src="@php echo DIRIMG.'img/products/tel-1-samsung.png' @endphp" alt="">
                <div class="des">
                    <span>SAMSUNG</span>
                    <h5>Samsung</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 2 fim -->

            <!--produto 3 -->
            <div class="pro">
                <img src="@php echo DIRIMG.'img/products/tel-2-samsung.png' @endphp" alt="">
                <div class="des">
                    <span>SAMSUNG</span>
                    <h5>Samsung</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 3 fim -->

            <!--produto 4 -->
            <div class="pro">
                <img src="@php echo DIRIMG.'img/products/acessorio-1.png' @endphp" alt="">
                <div class="des">
                    <span>ACESSORIO</span>
                    <h5>SmartWatch</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            <!--produto 4 fim -->
            
    </section>
    <!--produtos mais vendidos fim -->


    <!--banner 2 e 3-->
    <section id="sm-banner" class="section-p1">
            <!--banner 2-->
        <div class="banner-box">
            <h4>novos Telefones</h4>
            <h2>Entrega grátis</h2>
            <span>Os produtos com grandes ofertas</span>
            <button class="branco">veja mais</button>
        </div>
            <!--banner 2 fim-->
                <!--banner 3-->
        <div class="banner-box banner-box2">
            <h4>Acessorios</h4>
            <h2>adicionados recentemente</h2>
            <span>Complemente seu telefone com um destes</span>
            <button class="branco">ver</button>
        </div>
            <!--banner 3-->
    </section>
    <!--banner 2 e 3 fim-->

    <!--banner 4-->
    <section id="banner3">
        <div class="banner-box">
            <h2>ACESSORIOS</h2>
            <h3>Sem custo de entrega</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>SAMSUNG</h2>
            <h3>Melhores ofertas da Samsung</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>APPLE</h2>
            <h3>Grandes aparelhos da Apple</h3>
        </div>
    </section>
    <!--banner 4-->

    <section id="funcionalidade" class="section-p1">
        <div class="func-box">
            <img src="@php echo DIRIMG.'img/features/f1.png' @endphp" alt="">
            <h6>Pagamenos online</h6>
        </div>
        <div class="func-box">
            <img src="@php echo DIRIMG.'img/features/f2.png' @endphp" alt="">
            <h6>Entregas</h6>
        </div>
        
        <div class="func-box">
            <img src="@php echo DIRIMG.'img/features/f5.png' @endphp" alt="">
            <h6>Compras rápidas</h6>
        </div>
        <div class="func-box">
            <img src="@php echo DIRIMG.'img/features/f6.png' @endphp" alt="">
            <h6>Suporte 24h/7d</h6>
        </div>
    </section>
    @endsection