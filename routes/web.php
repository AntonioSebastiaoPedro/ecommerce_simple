<?php
$routes = new App\Controllers\RoutesController;
$routes->getRoute('', 'HomeController@index');
$routes->getRoute('loja', 'ShopController@index');
$routes->getRoute('produto', 'ShopController@produtoSingle');
$routes->getRoute('editProduto', 'ShopController@edit');
$routes->getRoute('deleteProduto', 'ShopController@delete');

$routes->getRoute('sobre-nos', 'AboutController@index');

$routes->getRoute('carrinho', 'CarrinhoController@index');