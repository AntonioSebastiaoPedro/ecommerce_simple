<?php
namespace App\Models;

use PDO;

class Order extends Conexao{
	public $erros = [];
    public $id_encomenda;

    public function addEncomenda($id_user, $morada, $total, $status_entrega, $status_pago, $tipo_pagamento){
		$query1 = "INSERT INTO orders (id_user, morada, total, status_entrega, status_pago, tipo_pagamento)
                            VALUES(?,?,?,?,?,?)";
		$stmt = $this->setConn()->prepare($query1);
		$stmt->bindValue(1, $id_user);
        $stmt->bindValue(2, $morada);
        $stmt->bindValue(3, $total);
        $stmt->bindValue(4, $status_entrega);
        $stmt->bindValue(5, $status_pago);
        $stmt->bindValue(6, $tipo_pagamento);
		$stmt->execute();
        
		if ($stmt->rowCount() > 0) {
            $max = $this->setConn()->prepare("SELECT MAX(id) as id FROM orders");
            $max->execute();
            return $this->id_encomenda = $max->fetch(PDO::FETCH_ASSOC)['id'];
            
		}
	}

    public function addProductsOrder($id_produto, $quantidade, $subtotal){
        $query1 = "INSERT INTO products_order (id_encomenda, id_produto, quant, subtotal)
                            VALUES(?,?,?,?)";
		$stmt = $this->setConn()->prepare($query1);
		$stmt->bindValue(1, $this->id_encomenda);
        $stmt->bindValue(2, $id_produto);
        $stmt->bindValue(3, $quantidade);
        $stmt->bindValue(4, $subtotal);
		$stmt->execute();
    }

    

	public static function getOrders(){
		$query = "SELECT * FROM orders";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

    public static function getUserOrders(){
		$query = "SELECT * FROM orders INNER JOIN products_order ON orders.id = products_order.id_encomenda
				  INNER JOIN products ON products_order.id_produto = products.id;
				  WHERE id_user = ".$_SESSION['id_user']. " AND status_entrega <> ? OR status_entrega = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, "Entregue");
		$stmt->bindValue(2, "Cancelado");
		$stmt->execute();
        
		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function getOneUserOrders(){
		$query = "SELECT * FROM orders INNER JOIN products_order ON orders.id = products_order.id_encomenda
				  INNER JOIN products ON products_order.id_produto = products.id;
				  WHERE id_user = ".$_SESSION['id_user']. " AND status_entrega <> ? OR status_entrega = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, "Entregue");
		$stmt->bindValue(2, "Cancelado");
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
	

	public function updateProduto($nome, $preco, $id){
		$query = "UPDATE produtos SET nome=?, preco=? WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $preco);
		$stmt->bindValue(3, $id);
		$stmt->execute();
	}
	


	public function deleteCategory($id){
		$query = "DELETE FROM categories WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}

	



}