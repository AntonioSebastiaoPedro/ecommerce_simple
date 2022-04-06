@extends('user.template')
@section('active2', 'active')

@section('body')
    <section id="pagina-cabecalho" >

        <h2>Os melhores da Tecnologia</h2>

        <p>Aqui tens a boa qualidade!</p>

    </section>
    
    <section id="producto1" class="section-p1">
        <div class="pro-container">
            
        @foreach($dados as $produto)
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
                    <h4>{{number_format($produto->price_unit, '2', ',', '.')}} kz</h4>
                </div>
                <a href="{{DIRPAGE.'add-carrinho/'.$produto->id}}"><i class="fal fa-shopping-cart cart"></i></a>
                </a>
            </div>
        @endforeach            
        </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a> &nbsp;
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>

@endsection