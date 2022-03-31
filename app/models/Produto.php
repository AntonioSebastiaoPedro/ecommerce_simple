<?php
namespace App\Models;

class Produto extends Conexao{

	public function getProdutos(){
		$query = "SELECT * FROM products";
		$stmt = $this->setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getProduto($id){
		$query = "SELECT * FROM products WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function addProduto($nome, $preco){
		$query = "INSERT INTO produtos(nome, preco) VALUES(?,?)";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $preco);
		$stmt->execute();
	}
	

	public function updateProduto($nome, $preco, $id){
		$query = "UPDATE produtos SET nome=?, preco=? WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $preco);
		$stmt->bindValue(3, $id);
		$stmt->execute();
	}
	


	public function deleteProduto($id){
		$query = "DELETE FROM  produtos WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}


	public static function getMaisVendidos(){
		$query = "SELECT * FROM products ORDER BY sales DESC LIMIT 4";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function getMaisRecentes(){
		$query = "SELECT * FROM products ORDER BY date_create DESC LIMIT 4";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function getOutrasFotos($idProduto){
		$query = "SELECT others_imgs.img FROM others_imgs INNER JOIN products ON others_imgs.idProduct = products.id WHERE products.id = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, $idProduto);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
	



}