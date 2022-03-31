<?php
namespace App\Controllers;

use \Jenssegers\Blade\Blade;

class CarrinhoController{
	private $blade;

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		echo($this->blade->render('user/carrinho'));
	}
}