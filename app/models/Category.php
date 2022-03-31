<?php
namespace App\Models;

class Category extends Conexao{

    public static function getNameCategory($idCategory){
        $query = "SELECT name_category FROM categories WHERE id = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, $idCategory);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
        dd($dados);
    }

	public function getProdutos(){
		$query = "SELECT * FROM products";
		$stmt = $this->setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getProduto($id){
		$query = "SELECT * FROM produtos WHERE id = ?";
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

	



}