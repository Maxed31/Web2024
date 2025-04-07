<?php
require_once 'BaseDao.php';

class ProductDAO extends BaseDao {

    public function getAllProducts() {
        $stmt = $this->conn->query("SELECT * FROM Product");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($product_id) {
        $stmt = $this->conn->prepare("SELECT * FROM Product WHERE product_id = ?");
        $stmt->execute([$product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($name, $description, $price, $stock, $category) {
        $stmt = $this->conn->prepare("INSERT INTO Product (name, description, price, stock, category) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $price, $stock, $category]);
    }
}
?>
