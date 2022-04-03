@extends('admin.template')

@section('body')
<h1 class="display-4 font-weight-bold text-center">STOCK</h1>
                    <hr>                      
<div class="container">

            
<button class="btn btn-sm btn-primary" name="adicionar">
                                        adicionar stock
                                    </button>
        

        
                <table class="table table-bordered table-hover mt-5">
                    <thead>
                            <th>Imagem</th>

                            <th>Categoria</th>
        
                            <th>Produto</th>

                            <th>Quantidade</th>

                            <th>Preço de Compra</th>
                            
                            <th>Preço de Venda</th>
        
                            <th>Operações</th>

                        
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                        <tr>    
                            <td><img width="50" height="70" src="{{DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto->id_category)[0]->name_category.'/'.$produto->name_product.'/'.$produto->img}}"></td>
                            <td>{{App\Models\Category::getNameCategory($produto->id_category)[0]->name_category}}</td>
                            <td>{{$produto->name_product}}</td>
                            <td>{{$produto->quantidade}}</td>
                            <td>{{number_format($produto->preco_de_compra), 2, ',', '.'}} kz</td>
                            <td>{{number_format($produto->price_unit), 2, ',', '.'}} kz</td>
                            <td>
                                <a href="#"><button class="btn btn-sm btn-primary">Editar</button></a>
                                <a href="#"><button class="btn btn-sm btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
        </div>
    </section>
</div>






@endsection