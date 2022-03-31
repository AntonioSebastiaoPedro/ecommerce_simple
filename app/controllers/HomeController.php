<?php
namespace App\Controllers;
use App\Models\Category;

use \Jenssegers\Blade\Blade;

class HomeController{
	private $blade;

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		//dd(Category::getNameCategory(1)[0]->name_category);
		echo($this->blade->render('user/index'));
	}
}