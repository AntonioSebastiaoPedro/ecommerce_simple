<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use App\Models\Produto;
use App\Models\Category;
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
		$cart = $this->cart;

		//dd($cart->getAttributeTotal('price_unit'));

		$allItems = $this->cart->getItems();
		return $this->blade->render('user/carrinho', compact('allItems', 'cart'));
	}

	public function addProduto(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			return $this->index();
		}
		
		$item = new Produto;
		$produto = $item->getProduto($id);
		//dd(number_format($this->cart->getAttributeTotal('price_unit'), 2, ',', '.'));
		$this->cart->add($produto[0]->id, 1, [
			'name_product'  => $produto[0]->name_product,
			'price_unit'  => $produto[0]->price_unit,
			'id_category' => $produto[0]->id_category,
			'img'   => $produto[0]->img,
			'subtotal'   => $produto[0]->quatity * $produto[0]->price_unit
		]);

		return redir('loja', false);
		
	}

	public function removeProduto()
	{
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			return $this->index();
		}

		$this->cart->remove($id);

		$this->index();
	}

	public function limparCarrinho(){
		$this->cart->clear();
	}
}