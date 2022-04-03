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
                            <th>Nome da Categoria</th>
        
                            <th>Data de Cadastro</th>
        
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($categorias))
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->name_category}}</td>
                            <td>{{$categoria->data_create}}</td>
                            <td>
                                <a href="{{DIRPAGE.'admin-editar-categoria'}}"><button class="btn btn-md btn-warning">
                                    Editar
                                </button></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        
        </div>
    </section>
</div>






@endsection