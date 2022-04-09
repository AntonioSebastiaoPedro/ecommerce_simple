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
		$query = "SELECT * FROM orders WHERE NOT status_entrega = 'Entregue'";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();
        
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

    public static function getUserOrders(){
		$query = "SELECT * FROM orders
				  WHERE id_user = {$_SESSION['id_user']} AND status_entrega = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, 'Por Entregar');
		$stmt->execute();
        
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function getOrder($id_encomenda){
		$query = "SELECT * FROM orders
				  WHERE id = {$id_encomenda}";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();
        
		return $stmt->fetch(\PDO::FETCH_OBJ);
	}


	public static function getProductsOfOrder($id_encomenda){
		$query = "SELECT * FROM products INNER JOIN products_order ON products.id = products_order.id_produto
                   WHERE products_order.id_encomenda = {$id_encomenda}";
		$stmt = self::setConn()->prepare($query);
        $stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function countUserOrders(){
		$query = "SELECT * FROM orders WHERE id_user = {$_SESSION['id_user']} AND status_entrega = ?";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, "Por Entregar");
		$stmt->execute();

		return $dados = $stmt->rowCount();
	}

	public static function adminCancelrOrder($id_encomenda){
		$query = "UPDATE orders SET status_entrega = ? WHERE id = ". $id_encomenda;
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, "Cancelado");
		$stmt->execute();
        if($stmt->rowCount() > 0){
			return true;
		}
	}
	

	public static function adminSaleOrder($id_encomenda){
		$query = "UPDATE orders SET status_pago = ? WHERE id = ". $id_encomenda;
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, "Pago");
		$stmt->execute();
        if($stmt->rowCount() > 0){
			return true;
		}
	}
	
	public static function cancelUserOrder($id_encomenda){
		$query = "UPDATE orders SET status_entrega = ? WHERE id = {$id_encomenda}";
		$stmt = self::setConn()->prepare($query);
		$stmt->bindValue(1, "Cancelado");
		$stmt->execute();
        
		return true;
	}
	

	public static function countOrders(){
		$query = "SELECT * FROM orders";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->rowCount();
	}
	



}