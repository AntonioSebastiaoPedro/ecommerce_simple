<?php
namespace App\Models;

use PDO;

class Category extends Conexao{
	public $erros = [];

    public static function getNameCategory($idCategory){
        $query = "SELECT name_category FROM categories WHERE id = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, $idCategory);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

	public static function getCategories(){
		$query = "SELECT * FROM categories";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function addCategoria($nome){
		$query1 = "SELECT * FROM categories WHERE name_category = ?";
		$stmt = $this->setConn()->prepare($query1);
		$stmt->bindValue(1, $nome);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			array_push($this->erros, "Já existe uma categoria com esse nome.");
			return false;
		}

		$query2 = "INSERT INTO categories(name_category) VALUES(?)";
		$stmt = $this->setConn()->prepare($query2);
		$stmt->bindValue(1, $nome);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			return true;
		}
	}
	

	public function updateCategoria($nome, $id){
		$query = "UPDATE categories SET name_category=? WHERE id = ".$id;
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $nome);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			return true;
		}
	}

	public static function renomear($id, $old_caminho, $new_caminho){
			
		$query = "SELECT name_category FROM categories WHERE id = ".$id;
			$stmt = self::setConn()->prepare($query);
			$stmt->execute();

			rename($old_caminho, $new_caminho);
	}


	public static function getCategoria($id){
		$query = "SELECT * FROM categories WHERE id = ".$id;
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	


	public function deleteCategory($id){
		$query = "DELETE FROM categories WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}

	public static function countCategories(){
		$query = "SELECT * FROM categories";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $stmt->rowCount();
	}

	



}