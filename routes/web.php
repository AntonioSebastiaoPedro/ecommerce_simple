<?php
$routes = new App\Controllers\RoutesController;
$routes->getRoute('', 'HomeController@index');
$routes->getRoute('loja', 'ProdutoController@index');
$routes->getRoute('produto', 'ProdutoController@produtoSingle');
$routes->getRoute('editProduto', 'ProdutoController@edit');
$routes->getRoute('deleteProduto', 'ProdutoController@delete');

$routes->getRoute('sobre-nos', 'AboutController@index');

$routes->getRoute('carrinho', 'CarrinhoController@index');
$routes->getRoute('add-carrinho', 'CarrinhoController@addProduto');
$routes->getRoute('remove-carrinho', 'CarrinhoController@removeProduto');
$routes->getRoute('finalizar-compra', 'CarrinhoController@finalizar');
$routes->getRoute('limpar-carrinho', 'CarrinhoController@limparCarrinho');

$routes->getRoute('entrar', 'UserController@index');
$routes->getRoute('login', 'UserController@entrar');
$routes->getRoute('admin', 'UserController@admin');


$routes->getRoute('admin-sair', 'AdminController@sair');
$routes->getRoute('admin-produtos', 'AdminController@produtos');
$routes->getRoute('admin-categorias', 'AdminController@categorias');
$routes->getRoute('admin-stock', 'AdminController@stock');
$routes->getRoute('admin-users', 'AdminController@users');
$routes->getRoute('admim-cadastrar-produto', 'AdminController@cadastrarProduto');
$routes->getRoute('admin-cadastrar-categoria', 'AdminController@cadastrarCategoria');