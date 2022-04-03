@extends('admin.template')

@section('body')



<h1 class="display-4 font-weight-bold text-center">Categorias</h1>
                    <hr>                      
            <div class="container">


                
                <form action="" method="post" class="col-sm-6 offset-md-3 border">
                <h5 class="display-5 mt-5 text-center font-weight-bold">Editar categoria</h5>

                     <div class="for-group mt-5">
                        <input class="form-control" type="text" name="nome" placeholder="Nome da categoria">
                    </div>
        
                    <button type="submit" class="btn btn-success btn-block mt-5 mb-3" 
                    name="btn">
                        editar
                    </button>
                </form>
        
        
            
            </div>
        
        </div>
    </section>
</div>





@endsection