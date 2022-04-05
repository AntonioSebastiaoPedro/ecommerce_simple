@extends('admin.template')

@section('body')

<h1 class="display-4 font-weight-bold text-center">PRODUTOS</h1>
                     <hr>                      
            <div class="container">

            
                
          <form action="{{DIRPAGE.'admim-cadastrar-produto'}}" class="ml-0" method="post" enctype="multipart/form-data" class="col-sm-12 offset-md-3 border ">
                <h1 class="display-5 mt-5 text-center font-weight-bold">Cadastrar produto</h1>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="categoria">Categorias</label>
                        </div>
                        <select name="categoria" class="custom-select" id="categoria">
                            <option selected>Escholha uma Categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->name_category}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="name_product" placeholder="Nome do produto">
                    </div>

                    <div class="for-group mt-5 mb-5">
                        <textarea class="form-control" name="descricao" id="" cols="60" rows="5" placeholder="Descrição do produto"></textarea>
                    </div>
                

                    <div class="for-group mt-5">
                        <input class="form-control" type="number" name="preco_de_compra" placeholder="Preço de Compra">
                    </div>
        
                    <div class="for-group mt-5">
                        <input class="form-control" type="number" name="price_unit" placeholder="Preço de venda">
                    </div>
                    <div class="for-group mt-5">
                        <input class="form-control" type="number" name="quantidade" placeholder="Quantidade do produto">
                    </div>
        
                    <div class="for-group mt-5 up">
                     
                    <div class="upload-box"> 
                        <div class="upload-img">
                            <img src="imagens/img.png" alt="">
                        </div>
                        <label for="upload-input" class="upload-label">Upload Image</label>
                        <input type="file" name="img"  id="upload-input" accept="images/*" width="200px" heigth="200px">
                    </div>
                    </div>
                    
                    <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" multiple="multiple" name="outras_imgs[]" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Escolher outras imagens</label>
                    </div>
                    
                    </div>

                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        Cadastrar
                    </button>
                </form>
            </div>
    </div>


              
        </div>
    </section>
</div>






@endsection