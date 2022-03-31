<?php
namespace App\Models;

abstract class Conexao{

	protected static function setConn(){
		try {
			return $conn = new \PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', USER, PASS);
		} catch (\PDOException $e) {
			return $e->getMessage();
		}
	}

}