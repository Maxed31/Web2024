<?php
require_once 'BaseDao.php';

class OrderDAO extends BaseDao {

    public function createOrder($user_id, $total_price) {
        $stmt = $this->conn->prepare("INSERT INTO `Order` (user_id, total_price) VALUES (?, ?)");
        $stmt->execute([$user_id, $total_price]);
        return $this->conn->lastInsertId();
    }

    public function getOrdersByUserId($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM `Order` WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
