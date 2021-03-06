<?php
$routes = new App\Controllers\RoutesController;
$routes->getRoute('', 'HomeController@index');
$routes->getRoute('loja', 'ProdutoController@index');
$routes->getRoute('produto', 'ProdutoController@produtoSingle');
$routes->getRoute('editProduto', 'ProdutoController@edit');
$routes->getRoute('deleteProduto', 'ProdutoController@delete');

$routes->getRoute('sobre-nos', 'UserController@about');

$routes->getRoute('carrinho', 'CarrinhoController@index');
$routes->getRoute('add-carrinho', 'CarrinhoController@addProduto');
$routes->getRoute('update-carrinho', 'CarrinhoController@updateProduto');
$routes->getRoute('remove-carrinho', 'CarrinhoController@removeProduto');
$routes->getRoute('finalizar-compra', 'CarrinhoController@finalizar');
$routes->getRoute('checkout', 'CarrinhoController@checkout');
$routes->getRoute('limpar-carrinho', 'CarrinhoController@limparCarrinho');
$routes->getRoute('encomenda', 'CarrinhoController@encomenda');
$routes->getRoute('cancelar-encomenda', 'CarrinhoController@cancelEncomenda');

$routes->getRoute('entrar', 'UserController@index');
$routes->getRoute('login', 'UserController@entrar');
$routes->getRoute('sair', 'UserController@sair');
$routes->getRoute('criar-conta', 'UserController@criarConta');

$routes->getRoute('admin', 'AdminController@index');
$routes->getRoute('admin-sair', 'AdminController@sair');
$routes->getRoute('admin-produtos', 'AdminController@produtos');
$routes->getRoute('admin-categorias', 'AdminController@categorias');
$routes->getRoute('admin-vendas', 'AdminController@vendas');
$routes->getRoute('admin-detalhes-venda', 'AdminController@detalhesVenda');
$routes->getRoute('admin-stock', 'AdminController@stock');
$routes->getRoute('admin-users', 'AdminController@users');
$routes->getRoute('admin-delete-user', 'AdminController@deleteUsuario');
$routes->getRoute('admim-cadastrar-produto', 'AdminController@cadastrarProduto');
$routes->getRoute('admin-eliminar-produto', 'AdminController@delete');
$routes->getRoute('admin-cadastrar-categoria', 'AdminController@cadastrarCategoria');
$routes->getRoute('admin-editar-produto', 'AdminController@editarProduto');
$routes->getRoute('admin-editar-categoria', 'AdminController@editarCategoria');
$routes->getRoute('admin-encomendas', 'AdminController@encomendas');
$routes->getRoute('admin-cancelar-encomenda', 'AdminController@encomendaCancelar');
$routes->getRoute('admin-entregue', 'AdminController@EncomendaEntregue');
$routes->getRoute('admin-pago', 'AdminController@encomendaPaga');