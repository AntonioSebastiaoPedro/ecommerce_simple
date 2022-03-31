@extends('templates.default')
@section('tittle', 'Produtos')
@section('activeProd', 'active')

@section('jumButton')
	<a class="btn btn-success" href="@php echo DIRPAGE.'addProduto'; @endphp" role="button">Adicionar Produto</a>
@endsection

@section('content')
@php echo flash('edit_yes'); echo flash('delete_yes'); @endphp

	<h3>Meus Produtos</h3>
	@if(count($dados) > 1)
	<table class="table table-bordered table-sm">
	  <thead class="thead-dark">
	    <tr>
	      	<th scope="col">Nome</th>
	      	<th scope="col">Preço</th>
	      	<th scope="col">Acções</th>
		</tr>
	  </thead>
	  <tbody>
			@foreach($dados as $produtos)
	    <tr>
	      	<td>{{$produtos->nome}}</td>
	      	<td>{{$produtos->preco}}</td>
	      	<td>
	      		<a class="btn btn-primary" href="@php echo DIRPAGE.'produto/'.$produtos->id; @endphp" role="button">Ver</a>
	      		<a class="btn btn-warning" href="@php echo DIRPAGE.'editProduto/'.$produtos->id; @endphp" role="button">Editar</a>
	      		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo">
	      			Eliminar
				</button>
			 </td>
	    </tr>
			@endforeach
	  </tbody>
	</table>
	@elseif(count($dados) == 1)
		@section('tittle', 'Produtos')
		@section('href', 'addProduto') @section('action', 'Adicionar Produto')
		<center>
			<div class="card" style="width: 18rem;">
			  <h5 class="card-header">{{$dados[0]->nome}}</h5>
			  <div class="card-body"><br>
			    <h3><b>Preço:</b> {{$dados[0]->preco}}</h3><br>
			    <a class="btn btn-warning" href="@php echo DIRPAGE.'editProduto/'.$dados[0]->id; @endphp" role="button">Editar</a>
			    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo">
	      			Eliminar
				</button>
			  </div>
			</div>
		</center>
	@else
		<div class="alert alert-warning" role="alert">
		  Não existe nenhum produto cadastrado. <a href="@php echo DIRPAGE.'addProduto'; @endphp" class="alert-link">Adicione um produto</a>
		</div>
	@endif

@endsection










<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><b>Deseja mesmo eliminar este produto?</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        <a href="@php echo DIRPAGE.'deleteProduto/'.$dados[0]->id @endphp" class="btn btn-danger">Sim, Eliminar</a>
      </div>
    </div>
  </div>
</div>