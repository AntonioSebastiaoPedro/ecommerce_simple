<?php
namespace App\Models;

use PDO;

class Sale extends Conexao{
	public $erros = [];
    public $id_encomenda;


	public static function adminSale($id_encomenda, $id_user){

		$query1 = "INSERT INTO sales(id_encomenda, id_user) VALUES(?,?)";
		$stmt1 = self::setConn()->prepare($query1);
		$stmt1->bindValue(1, $id_encomenda);
		$stmt1->bindValue(2, $id_user);
		$stmt1->execute();

        $query2 = "SELECT * FROM products INNER JOIN products_order ON products.id = products_order.id_produto
                   WHERE products_order.id_encomenda = ". $id_encomenda;
		$stmt2 = self::setConn()->prepare($query2);
        $stmt2->execute();

		if($stmt2->rowCount() > 0){
			foreach($stmt2->fetchAll(PDO::FETCH_OBJ) as $produto){
                $stmt = self::setConn()->prepare("UPDATE products SET quantidade = {$produto->quantidade}-{$produto->quant}, sales = {$produto->sales}+{$produto->quant} WHERE id = {$produto->id_produto}");
                $stmt->execute();
            }

            $query3 = "UPDATE orders SET status_entrega = ?, status_pago = ? WHERE id = ". $id_encomenda;
            $stmt3 = self::setConn()->prepare($query3);
            $stmt3->bindValue(1, "Entregue");
            $stmt3->bindValue(2, "Pago");
            $stmt3->execute();
		}

	}


    public static function countSales(){
		$query = "SELECT * FROM sales";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->rowCount();
	}
	


	public static function countOrders(){
		$query = "SELECT * FROM orders";
		$stmt = self::setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->rowCount();
	}
	



}