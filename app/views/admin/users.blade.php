@extends('admin.template')

@section('body')             

            <section class="working-panel">
                <div class="container-fluid">
                    <h1 class="display-4">Usuários</h1>
                    <hr>                      
                    <div class="container">
                    <table class="table table-light mt-5">
                        <thead>
                            <tr>
                                <th>ID do Usuário</th>
                                <th>Tipo de Usuário</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$type = ($usuario->type_user == 0) ? "Administrador" : "Cliente"}}</td>
                                <td>{{$usuario->name_user}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    <a href="{{DIRPAGE.'admin-delete-user/'.$usuario->id}}"><button class="btn btn-sm btn-warning" >Editar</button></a>
                                    <a href="{{DIRPAGE.'admin-delete-user/'.$usuario->id}}"><button class="btn btn-sm btn-danger">Eliminar</button></a>
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
    </div>


    @endsection