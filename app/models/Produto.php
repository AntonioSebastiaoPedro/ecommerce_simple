<?php
namespace App\Models;

use PDO;

class Produto extends Conexao{

	public function getProdutos(){
		$query = "SELECT * FROM products WHERE quantidade <> 0";
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


	public function addProduto($name_product, $price_unit, $preco_de_compra, $quantidade, $id_category, $id_user, $img, $details){

		$query = "INSERT INTO products(name_product, price_unit, preco_de_compra, quantidade, id_category, id_user, img, details)
		VALUES(?,?,?,?,?,?,?,?)";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $name_product);
		$stmt->bindValue(2, $price_unit);
		$stmt->bindValue(3, $preco_de_compra);
		$stmt->bindValue(4, $quantidade);
		$stmt->bindValue(5, $id_category);
		$stmt->bindValue(6, $id_user);
		$stmt->bindValue(7, $img);
		$stmt->bindValue(8, $details);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			$max = $this->setConn()->prepare("SELECT MAX(id) as id FROM products");
			$max->execute();
			$id = $max->fetchAll(\PDO::FETCH_OBJ);
			return ($id[0]->id);
		}else{
			return false;
		}
	}

	public function addOthersImgs($idProduto, $imgs){
		foreach ($imgs as $img) {
			$query = "INSERT INTO others_imgs (idProduct, img) Values(?,?)";
			$stmt = $this->setConn()->prepare($query);
			$stmt->bindValue(1, $idProduto);
			$stmt->bindValue(2, $img);
			$stmt->execute();
		}
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
		$query = "DELETE FROM  products WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$this->setConn()->prepare("DELETE FROM others_imgs WHERE idProduct = ".$id)->execute();
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

	public static function countProducts(){
		$query = "SELECT * FROM products";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->rowCount();
	}

	public static function countStock(){
		$query = "SELECT SUM(quantidade) quantidade FROM products";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC)['quantidade'];
	}
	



}