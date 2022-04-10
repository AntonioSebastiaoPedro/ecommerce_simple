<?php
namespace App\Models;

use PDO;

class User extends Conexao{
	public $erros = [];

	public static function getUsers(){
		$query = "SELECT * FROM users";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getUser($email, $senha){
		$query = "SELECT * FROM users WHERE email = ? AND senha = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function getUserById($id){
		$query = "SELECT name_user FROM users WHERE id = ? ";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}


	public static function addUser($nome, $email, $senha){

		$query1 = "SELECT name_user FROM users WHERE id = ? ";
		$user = self::setConn()->prepare($query1);
		$user->bindValue(1, $email);
		$user->execute();

		if ($user->rowCount() > 0) {
			array_push(self::$erros, "Já existe um usuário com este email");
			return false;
		}else{
			$query = "INSERT INTO users(type_user, name_user, email, senha) VALUES(?,?,?,?)";
			$stmt = self::setConn()->prepare($query);
			$stmt->bindValue(1, 1);
			$stmt->bindValue(2, $nome);
			$stmt->bindValue(3, $email);
			$stmt->bindValue(4, $senha);
			$stmt->execute();

		return true;
		}
	}
	

	public function updateUser($nome, $preco, $id){
		$query = "UPDATE users SET nome=?, preco=? WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $preco);
		$stmt->bindValue(3, $id);
		$stmt->execute();
	}
	


	public function deleteUser($id){
		$query = "DELETE FROM  users WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}



	public static function countUsers(){
		$query = "SELECT * FROM users";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->rowCount();
	}
	



}