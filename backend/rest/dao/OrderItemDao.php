<?php
require_once 'Database.php';

class OrderItemDAO extends BaseDao {

    public function addItemToOrder($order_id, $product_id, $quantity, $price) {
        $stmt = $this->conn->prepare("INSERT INTO Order_Item (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$order_id, $product_id, $quantity, $price]);
    }

    public function getItemsByOrderId($order_id) {
        $stmt = $this->conn->prepare("SELECT * FROM Order_Item WHERE order_id = ?");
        $stmt->execute([$order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
