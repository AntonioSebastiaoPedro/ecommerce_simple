<?php
//require 'vendor/autoload.php';
use App\Models\Category;

function redir($caminho, $php = true){
	if ($php) {
		header("Location:".DIRPAGE.$caminho.'.php');
	}else{
		header("Location:".DIRPAGE.$caminho);
	}
}


function dd($var){
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	exit;
}
