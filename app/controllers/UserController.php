<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use App\Models\Produto;
use App\Controllers\HomeController;
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
        if($_SESSION['type_user'] != null){
            if($_SESSION['type_user'] === 0){
                return $this->blade->render('admin/index');
            }else{
                return $this->blade->render('user/index');
            }
        }
        
		return $this->blade->render('user/form-login');
	}

    public function admin(){
		return $this->blade->render('admin/index');
	}

	public function entrar(){

        $user = $this->getUser($_POST['email'], $_POST['senha']);
        
		if(empty($user)) {
			return $this->index();
		}

        if(empty($_SESSION)){session_start();};

        $_SESSION['id_user'] = $user[0]->id;
        $_SESSION['email'] = $user[0]->email;
        $_SESSION['type_user'] = $user[0]->type_user;
        $_SESSION['name_user'] = $user[0]->name_user;

        if($user[0]->type_user == 0){
            return redir('admin', false);
        }else{
            return $this->blade->render('user/index');
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

	public function finalizar(){
		$iva = $_POST['iva'];
		$subtotal = $_POST['subtotal'];
		$total = $_POST['total'];
		$cart = $this->cart;
		$allItems = $this->cart->getItems();

		return $this->blade->render('user/checkout', compact('allItems', 'cart', 'iva', 'subtotal', 'total'));		
	}

	public function limparCarrinho(){
		$this->cart->clear();

		return redir('carrinho', false);
	}

    
}