<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use App\Models\Produto;
use \Jenssegers\Blade\Blade;
use Src\Classes\Cart;

class CarrinhoController extends Cart{
	private $blade;
	public $cart;

	public function __construct(){
		$this->cart = new Cart([
			'cartMaxItem'      => 0,
			
			'itemMaxQuantity'  => 0,
			
			'useCookie'        => false,
		  ]);
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		$allItems = $this->cart->getItems();
		return $this->blade->render('user/carrinho', compact('allItems'));
	}

	public function addProduto(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			return $this->index();
		}
		
		$item = new Produto;
		$produto = $item->getProduto($id);

		$this->cart->add($produto[0]->id, 1, [
			'name_product'  => $produto[0]->name_product,
			'price_unit'  => $produto[0]->price_unit,
			'img'   => $produto[0]->img,
			'quatidade' => 1
		]);

		$allItems = $this->cart->getItems();
		return $this->blade->render('user/carrinho', compact('allItems'));
		
	}
}