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
                        
                            <th>
                                Id
                            </th>
        
                            <th>
                                Categoria
                            </th>
        
                            <th>
                                produto
                            </th>


                            <th>
                                quantidade
                            </th>

                            <th>
                                Preço uni
                            </th>
                            
                            <th>
                                Data de Cadastro
                            </th>
        
                            <th>
                                editar
                            </th>

                            <th>
                                deletar
                            </th>
                        
                    </thead>
                    <tbody>
        
                        <tr>    
                            <td>1</td>
                            <td>Acessorio</td>
                            <td>Suporte para telefone</td>
                            <td>3</td>
                            <td>1500 kz</td>
                            <td>25/03/2022</td>
                            <td>
                            <form action="" method="post">
                                    <input type="hidden"  name="id" value="">
                                    <button class="btn btn-sm btn-primary" name="editar">
                                        Editar
                                    </button>
                                </form>
                            </td>

                            <td>
                            <form action="" method="post">
                                    <input type="hidden"  name="id" value="">
                                    <button class="btn btn-sm btn-danger" name="deletar">
                                        Eliminar
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