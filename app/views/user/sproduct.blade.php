@extends('user.template')


@section('body')
    <section id="prodetails" class="section-p1">
    @foreach($dados as $produto)
        <div class="single-pro-image">
            <img src="{{ DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto->id_category)[0]->name_category.'/'.$produto->name_product.'/'.$produto->img}}" width="100%" id="MainImg" alt="">
                <div class="small-img-group">
            @if(!empty($outras_fotos))
                @foreach($outras_fotos as $img)
                    <div class="small-img-col">
                        <img src="{{DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto->id_category)[0]->name_category.'/'.$produto->name_product.'/'.$img->img}}" width="100%" class="small-img" alt="">
                    </div>
                @endforeach
                </div>
            @else

            @endif
        </div>

        <div class="single-pro-details">
            <form action="{{DIRPAGE.'add-carrinho/'.$produto->id}}" method="post">
                <h6>{{App\Models\Category::getNameCategory($produto->id_category)[0]->name_category}}</h6>
                <h4>{{$produto->name_product}}</h4>
                <h2>{{number_format($produto->price_unit, '2', ',', '.')}} kz</h2>

                <input type="number" value="1" name="quant">
                <button type="submit" class="normal">Adicionar no Carrinho</button>
                <h4>Detalhes do Produto</h4>
                <span>{{$produto->details}}</span>
            </form>
        </div>
    @endforeach
    </section>

    <section id="producto1" class="section-p1">
        <h2>Mais vendidos </h2>
        <p>Produtos em alta</p>
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
                    <h4>{{number_format($produto->price_unit, '2', ',', '.')}} kz</h4>
                </div>
                <a href="{{DIRPAGE.'add-carrinho/'.$produto->id}}"><i class="fal fa-shopping-cart cart"></i></a>
            </a>
            </div>
        @endforeach            
        </div>
    </section>


@endsection
@section('js')
    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
        smallimg[4].onclick = function() {
            MainImg.src = smallimg[4].src;
        }
    </script>
@endsection