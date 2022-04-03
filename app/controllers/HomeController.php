<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Produto;

use \Jenssegers\Blade\Blade;

class HomeController{
	private $blade;

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		$vendidos = Produto::getMaisVendidos();
		$recentes = Produto::getMaisRecentes();
		return $this->blade->render('user/index', compact('vendidos', 'recentes'));
	}
}