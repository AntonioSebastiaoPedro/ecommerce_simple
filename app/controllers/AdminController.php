<?php
namespace App\Controllers;

use App\Controllers\RoutesController as Rota;
use App\Models\Category;
use \Jenssegers\Blade\Blade;
use \App\Models\Produto;
use Src\Classes\Upload;
use \App\Controllers\ProdutoController;
use App\Models\Order;
use App\Models\Sale;
use App\Models\User;

class AdminController extends Produto{
	private $blade;
	public $erros = [];

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		$encomendas = Order::countOrders();
		$caterorias = Category::countCategories();
		$produtos = Produto::countProducts();
		$stock = Produto::countStock();
		$users = User::countUsers();
		$sales = Sale::countSales();
		return $this->blade->render('admin/index', compact('encomendas', 'caterorias', 'produtos', 'stock', 'users', 'sales'));
	}

	public function cadastrarProduto()
	{
		if (count($_POST) > 0) {
			if (isset($_FILES['img']) and !empty($_FILES['img']['name'])) {
				$caminho = DIRREQ.'public/img/img/products/'.Category::getNameCategory($_POST['categoria'])[0]->name_category.'/'.$_POST['name_product'].'/';
				if (!is_dir($caminho)) {
					mkdir($caminho);
				}
				$up_img = Upload::UpImg($caminho, $_FILES['img']);
					$name_product = filter_input(INPUT_POST, 'name_product', FILTER_DEFAULT);
					$price_unit = filter_input(INPUT_POST, 'price_unit', FILTER_SANITIZE_NUMBER_INT);
					$preco_de_compra =  filter_input(INPUT_POST, 'preco_de_compra', FILTER_SANITIZE_NUMBER_INT);
					$quantidade =  filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
					$id_category =  filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
					$id_user = $_SESSION['id_user'];
					$img = $_FILES['img']['name'];
					$details = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
					
					$id = $this->addProduto($name_product, $price_unit, $preco_de_compra, $quantidade, $id_category, $id_user, $img, $details);
						if(isset($_FILES['outras_imgs'])){
							$outras_imgs = Upload::UpOthersImgs($caminho, $_FILES['outras_imgs']);
							$this->addOthersImgs($id, $_FILES['outras_imgs']['name']);
							return redir('admin-produtos', false);
						}
					flash('add_yes', '<b>Produto cadastrado com sucesso!</b>', 'alert alert-success');

			}

			return redir('admin-produtos', false);
		}
	}


	public function editarProduto()
	{
		$product = new Produto;
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if (count($_POST) > 0) {

			$idProduto = $_POST['id'];
			
			$name_product = filter_input(INPUT_POST, 'name_product', FILTER_DEFAULT);
			$price_unit = filter_input(INPUT_POST, 'price_unit', FILTER_SANITIZE_NUMBER_INT);
			$preco_de_compra =  filter_input(INPUT_POST, 'preco_de_compra', FILTER_SANITIZE_NUMBER_INT);
			$quantidade =  filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
			$id_category =  filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
			$id_user = $_SESSION['id_user'];
			$img = $_FILES['img']['name'];
			$details = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);

			$old_img = Produto::getImg($idProduto);
			$old_imgs = Produto::getOthersImg($idProduto);
			$old_name = Produto::getName($idProduto);
			$caminho = DIRREQ.'public/img/img/products/'.Category::getNameCategory($id_category)[0]->name_category.'/'.$name_product.'/';
			$old_caminho = DIRREQ.'public/img/img/products/'.Category::getNameCategory($id_category)[0]->name_category.'/'.$old_name.'/';
			if ($old_name != $name_product) {
				if (!is_dir($caminho)) {
					mkdir($caminho);
				}
				foreach($old_imgs as $imagem){
					copy($old_caminho.$imagem->img, $caminho.$imagem->img);
				}
				copy($old_caminho.$old_img, $caminho.$old_img);

				delTree($old_caminho);

			}

			if (isset($_FILES['img']) and !empty($_FILES['img']['name'])) {
				$up_img = Upload::UpImg($caminho, $_FILES['img']);
					$this->updateProduto($name_product, $price_unit, $preco_de_compra, $quantidade, $id_user, $img, $details, $idProduto);
			}else{
				$this->updateProduto($name_product, $price_unit, $preco_de_compra, $quantidade, $id_user, null, $details, $idProduto);
			}
			
			if(isset($_FILES['outras_imgs'])){
				$outras_imgs = Upload::UpOthersImgs($caminho, $_FILES['outras_imgs']);
				$this->addOthersImgs($idProduto, $_FILES['outras_imgs']['name']);
			}

			flash('add_yes', '<b>Produto actualizado com sucesso!</b>', 'alert alert-success');
			return redir('admin-stock', false);
		}else{
			$produto = $product->getProduto($id);
			$categorias = Category::getCategories();
			return $this->blade->render('admin/produtos', compact('produto', 'categorias'));

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
	


	public function editarCategoria(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		$categoria = new Category;
		if (count($_POST) > 0) {
			if (!empty($_POST['nome'])) {
				$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
				$categoria::renomear($id, DIRREQ.'public/img/img/products/'.$categoria::getNameCategory($id)[0]->name_category, DIRREQ.'public/img/img/products/'.$nome);
				$categoria->updateCategoria($nome, $id);
				flash('edit_yes', '<b>Categoria editada com sucesso!</b>', 'alert alert-success');
				redir("admin-categorias", false);
			}else{
				$erros = $this->erros;
				array_push($erros, 'Preencha todos os campos');
				return $this->blade->render('admin/categoria', compact('erros'));		
			}
		}else{
			$dados = Category::getCategoria($id);
			return $this->blade->render('admin/categoria', compact('dados'));		
		}
	}


	public function delete(){
		$produto = new ProdutoController;
		$produto->delete();
		flash('delete_yes', '<b>Produto eliminado com sucesso!</b>', 'alert alert-success');
		redir("admin-stock", false);
	}


	public function categorias(){
		$categorias = Category::getCategories();
		return $this->blade->render('admin/categoria', compact('categorias'));
	}

	public function produtos(){

		$categorias = Category::getCategories();

		return $this->blade->render('admin/produtos', compact('categorias'));
	}

	public function stock(){
		$produtos = $this->getProdutos();
		return $this->blade->render('admin/stock', compact('produtos'));
	}

	public function users(){
		$users = User::getUsers();
		return $this->blade->render('admin/users', compact('users'));
	}

	public function deleteUsuario(){
		$id_user = Rota::parseUrl()[1];
		User::deleteUser($id_user);
		flash('add_yes', '<b>Usuário eliminado com sucesso!</b>', 'alert alert-success');
		return redir('admin-users', false);
	}

	public function encomendas(){
		if(is_null($orders = Order::getOrders())){
			return $this->blade->render('admin/encomendas');
		}
		return $this->blade->render('admin/encomendas', compact('orders'));
	}

	public function vendas(){
		if(is_null($sales = Sale::getSales())){
			return $this->blade->render('admin/vendas');
		}
		return $this->blade->render('admin/vendas', compact('sales'));
	}

	public function detalhesVenda(){
		$id_venda = Rota::parseUrl()[1];
		$sale = Sale::getSale($id_venda);
		$id_encomenda = Rota::parseUrl()[2];
		$encomenda = Order::getOrder($id_encomenda);
		$details = Sale::getDetails($id_encomenda);
		return $this->blade->render('admin/detalhes-venda', compact('encomenda', 'details', 'id_venda', 'sale'));
	}

	public function encomendaPaga(){
		$id = Rota::parseUrl()[1];
		$order = Order::adminSaleOrder($id);
		flash('add_yes', '<b>Encomenda cancelada com sucesso!</b>', 'alert alert-success');
		return \redir("admin-encomendas", false);
	}

	public function encomendaEntregue(){
		$id_encomenda = Rota::parseUrl()[1];
		$id_user = Rota::parseUrl()[2];
		Sale::adminSale($id_encomenda, $id_user);
		flash('add_yes', '<b>Encomenda Marcada como vendido com sucesso!</b>', 'alert alert-success');
		return \redir("admin-encomendas", false);
	}

	public function encomendaCancelar(){
		$id = Rota::parseUrl()[1];
		$order = Order::adminCancelrOrder($id);
		flash('add_yes', '<b>Encomenda Cancelada com sucesso!</b>', 'alert alert-success');
		return \redir("admin-encomendas", false);
	}

	public function sair(){
		session_destroy();
		return redir('entrar', false);
	}

}