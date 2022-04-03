@extends('admin.template')

@section('body')


<h1 class="display-4 font-weight-bold text-center">Categorias</h1>
                    <hr>                      
            <div class="container">


                
                <form action="{{DIRPAGE.'admin-cadastrar-categoria'}}" method="post" class="col-sm-6 offset-md-3 border">
                <h5 class="display-5 mt-5 text-center font-weight-bold">Cadastro de categoria</h5>

                     <div class="for-group mt-5">
                        <input class="form-control" type="text" name="name" placeholder="Nome da categoria">
                    </div>
        
                    <button type="submit" class="btn btn-success btn-block mt-5 mb-3" 
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
                                Nome Categoria
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
                            <td></td>
                            <td></td>
                            <td></td>
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
    </section>
</div>






@endsection