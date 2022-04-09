<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use \Jenssegers\Blade\Blade;
use \App\Models\Produto;

class ProdutoController extends Produto{
	private $blade;
	public $erros = [];

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			$dados = $this->getProdutos();
		}else{
			$dados = $this->getProduto($id);
		}
		

		return $this->blade->render('user/shop', compact('dados'));
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


	public function delete(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		$this->deleteProduto($id);
	}

}