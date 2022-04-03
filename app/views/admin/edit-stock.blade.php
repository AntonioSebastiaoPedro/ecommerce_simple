@extends('admin.template')

@section('body')

<h1 class="display-4 font-weight-bold text-center">STOCK</h1>
                    <hr>                      
<div class="container">

            
                
        

<form action="" method="post" class="col-sm-6 offset-md-3 border rounded ">
                <h1 class="display-5 mt-5 text-center font-weight-bold">Editar Stock</h1>



                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="categoria" placeholder="Categoria">
                    </div>          
                    
                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="nome-produto" placeholder="nome do produto">
                    </div>

                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="quantidade" placeholder="quantidade">
                    </div>

                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="quantidade" placeholder="Preço Unitário">
                    </div>



                    <button type="submit" class="btn btn-success btn-block mt-5 mb-5" 
                    name="btn">
                        Editar
                    </button>
                </form>
                





            </div>
    </div>
        </div>
    </section>
</div>






@endsection