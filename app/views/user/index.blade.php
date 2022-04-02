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
        <!--produto -->
        <div class="pro-container">
        @foreach($vendidos as $produto)
            <div class="pro" >
            <a href="{{ DIRPAGE.'produto/'.$produto->id }}">
                <img src="{{ DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto->id_category)[0]->name_category.'/'.$produto->name_product.'/'.$produto->img}}" alt="">
                <div class="des">
                    <span> {{App\Models\Category::getNameCategory($produto->id_category)[0]->name_category}} </span>
                    <h5>{{$produto->name_product}}</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>{{$produto->price_unit}}</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </a>
            </div>
        @endforeach            
        </div>
    <!--produto-->
            
    </section>
    <!--produtos mais vendidos-->

    <!--banner informativo 1 toda tela-->
    <section id="banner" class="section-m1">
        <h4>Produtos incriveis </h4>
        <h2>Atualizações <span>Sempre</span> – Sobre Todos os Produtos</h2>
        <a href="{{DIRPAGE.'loja'}}"><button class="normal">Explore Mais</button></a>
    </section>
    <!--Banner iformativo 1 toda tela fim-->

    <!--produtos mais recentes-->
    <section id="producto1" class="section-p1">
        <h2>Novos produtos</h2>
        <p>Colecção de novos produtos</p>

        <!--produto -->
        <div class="pro-container">
        @foreach($recentes as $produto)
            <div class="pro" >
            <a href="{{ DIRPAGE.'produto/'.$produto->id }}">
                <img src="{{ DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto->id_category)[0]->name_category.'/'.$produto->name_product.'/'.$produto->img}}" alt="">
                <div class="des">
                    <span> {{App\Models\Category::getNameCategory($produto->id_category)[0]->name_category}} </span>
                    <h5>{{$produto->name_product}}</h5>
                    <h4>{{$produto->price_unit}}</h4>
                </div>
                <a href="{{DIRPAGE.'add-carrinho/'.$produto->id}}"><i class="fal fa-shopping-cart cart"></i></a>
            </a>
            </div>
        @endforeach            
        </div>
            <!--produto fim -->    
    </section>
    <!--produtos mais recentes fim -->


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