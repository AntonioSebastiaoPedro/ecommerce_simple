<?php
namespace App\Models;

class User extends Conexao{

	public function getUsers(){
		$query = "SELECT * FROM users";
		$stmt = $this->setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getUser($email, $senha){
		$query = "SELECT * FROM users WHERE email = ? AND senha = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function addUser($nome, $email, $senha){

		$user = $this->setConn()->prepare("SELECT * FROM users WHERE email = ".$email);
		$user->execute();

		if ($user->rowCount() > 0) {
			return false;
		}

		$query = "INSERT INTO users(type_user, name_user, email, senha) VALUES(?,?,?,?)";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, 1);
		$stmt->bindValue(2, $nome);
		$stmt->bindValue(3, $email);
		$stmt->bindValue(4, $senha);
		$stmt->execute();

		return true;
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


	public static function getMaisVendidos(){
		$query = "SELECT * FROM users ORDER BY sales DESC LIMIT 4";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function getMaisRecentes(){
		$query = "SELECT * FROM users ORDER BY date_create DESC LIMIT 4";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function getOutrasFotos($idUser){
		$query = "SELECT others_imgs.img FROM others_imgs INNER JOIN users ON others_imgs.idProduct = users.id WHERE users.id = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, $idUser);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
	



}