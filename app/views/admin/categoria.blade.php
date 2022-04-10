@extends('admin.template')

@section('body')
    <div class="container">

        @if (isset($dados))
            <form action="{{ DIRPAGE . 'admin-editar-categoria/' . $dados['id'] }}" method="post"
                class="col-sm-6 offset-md-3 border">
                <h5 class="display-5 mt-5 text-center font-weight-bold">Editar de Categoria</h5>
            @else
                <form action="{{ DIRPAGE . 'admin-cadastrar-categoria' }}" method="post" class="col-sm-6 offset-md-3 border">
                    <h5 class="display-5 mt-5 text-center font-weight-bold">Cadastro de Categoria</h5>
        @endif
        <div class="for-group mt-5">
            <input class="form-control" type="text" value="{{ $dados['name_category'] ?? '' }}" name="nome"
                placeholder="Nome da categoria">
        </div>

        <button type="submit" class="btn btn-success btn-block mt-5 mb-3" name="btn">
            {{ $nome = isset($dados) ? 'Actualizar' : 'Cadastrar' }}
        </button>
        </form>
        <hr>
        <h2 class="font-weight-bold text-center mt-4">Categorias</h2>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nome da Categoria</th>

                    <th>Data de Cadastro</th>

                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>
                @if (isset($categorias))
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->name_category }}</td>
                            <td>{{ $categoria->data_create }}</td>
                            <td>
                                <a href="{{ DIRPAGE . 'admin-editar-categoria/' . $categoria->id }}"><button
                                        class="btn btn-md btn-warning">
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
