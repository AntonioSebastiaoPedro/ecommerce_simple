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
$routes->getRoute('limpar', 'CarrinhoController@limparCarrinho');