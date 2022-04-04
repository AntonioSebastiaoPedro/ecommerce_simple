<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use App\Models\Order;
use App\Controllers\HomeController;
use App\Models\Category;
use App\Models\Produto;
use App\Models\User;
use \Jenssegers\Blade\Blade;
use Src\Classes\Cart;

class UserController extends User{
    public $erros = [];
	private $blade;
	public $cart;

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
        if(isset($_SESSION['type_user']) AND $_SESSION['type_user'] != null){
            if($_SESSION['type_user'] === 0){
                return $this->blade->render('admin/index');
            }else{
                $home = new HomeController;
                return $home->index();
            }
        }
        
		return $this->blade->render('user/form-login');
	}

    public function admin(){
		$encomendas = Order::countOrders();
		$caterorias = Category::countCategories();
		$produtos = Produto::countProducts();
		$stock = Produto::countStock();
		$users = User::countUsers();
		return $this->blade->render('admin/index', compact('encomendas', 'caterorias', 'produtos', 'stock', 'users'));
	}

	public function entrar(){

        $user = $this->getUser($_POST['email'], $_POST['senha']);
        
		if(empty($user)) {
			return $this->index();
		}

        if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

        $_SESSION['id_user'] = $user[0]->id;
        $_SESSION['email'] = $user[0]->email;
        $_SESSION['type_user'] = $user[0]->type_user;
        $_SESSION['name_user'] = $user[0]->name_user;

        if($user[0]->type_user == 0){
            return redir('admin', false);
        }else{
			$home = new HomeController;
            return $home->index();
        }
		
	}

	public function criarConta(){
		if (isset($_POST['add'])) {
			$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
			$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

			if($this->addUser($nome, $email, $senha)){
				$user = $this->getUser($email, $senha);
				$_SESSION['id_user'] = $user[0]->id;
				$_SESSION['email'] = $user[0]->email;
				$_SESSION['type_user'] = $user[0]->type_user;
				$_SESSION['name_user'] = $user[0]->name_user;

				$home = new HomeController;
				$home->index();
			}
		}else{
			return $this->blade->render('user/form-cadastro');
		}
	}

	public function removeProduto()
	{
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			return $this->index();
		}

		$this->cart->remove($id);

		return $this->index();
	}


	public function about(){
		return $this->blade->render('/user/about');
	}

	public function sair(){
		session_destroy();

		return redir('entrar', false);
	}

    
}