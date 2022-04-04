<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use \Jenssegers\Blade\Blade;
use App\Models\Produto;

class AboutController extends Produto{
	private $blade;
	public $erros = [];

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		/*$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			$dados = $this->getProdutos();
		}else{
			$dados = $this->getProduto($id);
		}
		*/

		return $this->blade->render('/user/about');
	}


	public function add(){
		if (count($_POST) > 0) {
			dd('');
		}else{
			
			//return $this->blade->render('addProduto');		
		}
	}
	


	public function edit(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if (count($_POST) > 0) {
			if (!empty($_POST['nome'] or $_POST['preco'])) {
				$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
				$preco = filter_input(INPUT_POST, 'preco', FILTER_DEFAULT);
				$this->updateProduto($nome, $preco, $id);
				flash('edit_yes', '<b>Actualização feita com sucesso!</b>', 'alert alert-success');
				redir("produto", false);
			}else{
				$erros = $this->erros;
				array_push($erros, 'Preencha todos os campos');
				return $this->blade->render('addProduto', compact('erros'));		
			}

		}else{
			$dados = $this->getProduto($id)[0];
			return $this->blade->render('addProduto', compact('dados'));		
		}
	}


	public function delete(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		$this->deleteProduto($id);
		flash('delete_yes', '<b>Produto eliminado com sucesso!</b>', 'alert alert-success');
				redir("produto", false);

	}

}