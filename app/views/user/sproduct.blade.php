@extends('user.template')


@section('body')
    <section id="prodetails" class="section-p1">
    @foreach($dados as $produto)
        <div class="single-pro-image">
            <img src="img/products/produto-unico-1.png" width="100%" id="MainImg" alt="">

            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="img/products/produto-unico-1.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/produto-unico-2.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/produto-unico-3.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/produto-unico-4.png" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>

        <div class="single-pro-details">
            <h6>{{App\Models\Category::getNameCategory($produto->id_category)[0]->name_category}}</h6>
            <h4>{{$produto->name_product}}</h4>
            <h2>{{$produto->price_unit}}</h2>

            <input type="number" value="1">
            <button class="normal">Add Carrinho</button>
            <h4>Detalhes do Produto</h4>
            <span>{{$produto->details}}</span>
        </div>
    @endforeach
    </section>

    <section id="producto1" class="section-p1">
        <h2>Mais vendidos </h2>
        <p>Produtos em alta</p>
        <div class="pro-container">
        @foreach($dados as $produto)
            <a href="{{ DIRPAGE.'produto/'.$produto->id }}">
            <div class="pro" >
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
            </div>
            </a>
        @endforeach            
        </div>
    </section>


@endsection
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
    </script>


    <script src="script.js"></script>
</body>

</html>