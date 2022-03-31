@extends('templates.default')
@section('content')

@if(!empty($erros))
	@foreach($erros as $erro)
		<ul class="nav flex-column">
		  <li class="nav-item">
		  	<div class="alert alert-danger" role="alert">
				<b> {{$erro}} </b>
			</div>
		  </li>
		</ul>
	@endforeach
@endif
@php
	echo flash('add_yes');
@endphp

@if(isset($dados))
  @section('tittle', 'Editar Produto')
  
  <form method="POST" action="@php echo DIRPAGE.'editProduto/'.$dados->id @endphp">
@else
  @section('tittle', 'Adicionar Produtos')

  <form method="POST">
@endif
  <div class="form-group row">
    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$dados->nome ?? ''}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="preco" class="col-sm-2 col-form-label">Preço</label>
    <div class="col-sm-10">
      <input type="text" name="preco" class="form-control" id="preco" placeholder="Preço" value="{{$dados->preco ?? ''}}">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-md-4">
      <button type="submit" class="btn btn-success btn-lg">Enviar</button>
    </div>
  </div>
</form>
@endsection