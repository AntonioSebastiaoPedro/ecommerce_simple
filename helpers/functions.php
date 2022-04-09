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

function delTree($dir) { 
	$files = array_diff(scandir($dir), array('.','..')); 
	foreach ($files as $file) { 
	  (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	} 
	return rmdir($dir); 
  }

  //delTree('caminho/da/pasta/aqui');
