@extends('admin.template')

@section('body')

<h1 class="display-4 font-weight-bold text-center">PRODUTOS</h1>
                     <hr>                      
            <div class="container">

            
                
          <form action="" method="post" class="col-sm-6 offset-md-3 border ">
                <h1 class="display-5 mt-5 text-center font-weight-bold">Cadastrar produto</h1>
                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="nome" placeholder="Nome do produto">
                    </div>

                    <div class="for-group mt-5 mb-5">
                    <textarea class="form-control" name="descricao" id="" cols="60" rows="5" placeholder="descrição do produto"></textarea>
                    </div>
                

                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="" placeholder="preço unitario">
                    </div>
        
                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="" placeholder="preço de venda">
                    </div>
        
                    <div class="for-group mt-5 up">
                     
                    <div class="upload-box"> 
        <div class="upload-img">
            <img src="imagens/img.png" alt="">
        </div>
        <label for="upload-input" class="upload-label">Upload Image</label>
        <input type="file"  id="upload-input" accept="images/*" width="200px" heigth="200px">
    </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-5 mb-5" 
                    name="btn">
                        Cadastrar
                    </button>
                </form>
        


        
                <table class="table table-light mt-5">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
        
                            <th>
                                Nome do produto
                            </th>
        
                            <th>
                                Imagem
                            </th>
        

                            <th>
                                preço unitario
                            </th>
                            
                            <th>
                                preço venda
                            </th>
        
                            <th>
                                categ
                            </th>
        
        
                            <th>
                                Data de Cadastro
                            </th>
        
                            <th>
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
        
                        <tr>    
                            <td>1</td>
                            <td>suporte</td>
                            <td><img src="imagens/acessorio-2.png" alt="" width="100px" heigth="100px"></td>
                            <td>4000 AOA</td>
                            <td>10000 AOA</td>
                            <td>acessorio</td>
                            <td>25/03/2022</td>
                            <td>
                            <form action="" method="post">
                                    <input type="hidden"  name="id" value="">
                                    <button class="btn btn-sm btn-danger" name="deletar">
                                        Eliminar
                                    </button>
                                     
                                    <button class="btn btn-sm btn-primary" name="editar">
                                        Editar
                                    </button>
        
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>


              
        </div>
    </section>
</div>






@endsection