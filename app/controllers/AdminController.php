<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use App\Models\Category;
use \Jenssegers\Blade\Blade;
use \App\Models\Produto;
use \App\Models\User;

class AdminController extends Produto{
	private $blade;
	public $erros = [];

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		return $this->blade->render('admin/index');
	}

	public function produtoSingle(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			$this->index();
		}else{
			$outras_fotos = self::getOutrasFotos($id);
			$vendidos = self::getMaisVendidos();
			$dados = $this->getProduto($id);
			return $this->blade->render('user/sproduct', compact('dados', 'vendidos', 'outras_fotos'));
		}

	}


	public function cadastrarCategoria(){
		if (count($_POST) > 0) {
			if (!empty($_POST['name'])) {
				$nome = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
				$diretorio = DIRPRODUCTS."$nome/";
				$categoria = new Category;
				if($categoria->addCategoria($nome) == true){
					$diretorio = DIRPRODUCTS."$nome/";
					//Verificar a existência do diretório para salvar as imagens e informa se o caminho é um diretório
					if(!is_dir($diretorio)){ 
						mkdir($diretorio);
					}

					flash('add_yes', '<b>Categoria cadastrada com sucesso!</b>', 'alert alert-success');
					return redir("admin-categorias", false);
				}else{
					flash('add_yes', "<b>$categoria->erros!</b>", 'alert alert-success');
					return redir("admin-categorias", false);
				}
			}else{
				$erros = $this->erros;
				array_push($erros, 'Preencha todos os campos');
				return $this->blade->render('admin/categoria', compact('erros'));
			}

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











	public function categorias(){
		return $this->blade->render('admin/categoria');
	}

	public function produtos(){
		return $this->blade->render('admin/produtos');
	}

	public function stock(){
		return $this->blade->render('admin/stock');
	}

	public function users(){
		return $this->blade->render('admin/users');
	}


	public function sair(){
		session_destroy();
		return redir('entrar', false);
	}

}