<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use App\Models\Produto;
use App\Models\Category;
use App\Models\Order;
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

		flash('add_yes', '<b>Produto adicionado ao carrinho com sucesso!</b>', 'alert alert-success');
		return redir('loja', false);
		
	}

	public function removeProduto()
	{
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			return $this->index();
		}

		$this->cart->remove($id);

		flash('delete_yes', '<b>Produto removido ao carrinho com sucesso!</b>', 'alert alert-success');

		return $this->index();
	}

	public function finalizar(){
		$iva = $_POST['iva'];
		$subtotal = $_POST['subtotal'];
		$total = $_POST['total'];
		$cart = $this->cart;
		$allItems = $this->cart->getItems();

		return $this->blade->render('user/checkout', compact('allItems', 'cart', 'iva', 'subtotal', 'total'));		
	}

	public function checkout(){
		$allItems = $this->cart->getItems();
		$total = $this->cart->getAttributeTotal('price_unit') + $this->cart->getAttributeTotal('price_unit')*14/100;

		$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
		$morada = filter_input(INPUT_POST, 'morada', FILTER_DEFAULT);
		$pagamento = filter_input(INPUT_POST, 'pagamento', FILTER_DEFAULT);

		$encomenda = new Order;
		$encomenda->addEncomenda($_SESSION['id_user'], $morada, $total, "Por Entregar", "Por Pagar", $pagamento);

		foreach ($allItems as $items) {
			foreach ($items as $item) {
				$subtotal = $item['attributes']['price_unit'] * $item['quantity'];
				$encomenda->addProductsOrder($item['id'], $item['quantity'], $subtotal);
			}
		}
		$this->cart->clear();
		flash('add_yes', '<b>Encomenda feita com sucesso!</b>', 'alert alert-success');
		return redir('encomenda', false);
	}

	public function encomenda(){
		$order = new Order;
		if(empty($encomenda = $order::getUserOrders())){
			return $this->blade->render('user/encomenda');
		}

		$tipo_pagamento = ($order::getUserOrders()[0]->tipo_pagamento == "Tranferência") ? "Tranferência" : "Na Entrega";
		
		return $this->blade->render('user/encomenda', compact('encomenda', 'tipo_pagamento'));
	}

	public function cancelEncomenda(){
		$order = new Order;
		$order->cancelUserOrder($_SESSION['id_user']);
		flash('add_yes', '<b>Encomenda cancelada com sucesso!</b>', 'alert alert-success');
		$this->limparCarrinho();
	}

	public function limparCarrinho(){
		$this->cart->clear();

		return redir('carrinho', false);
	}
}