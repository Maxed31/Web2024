<?php
require_once 'Database.php';

class ReviewDAO  extends BaseDao {

    public function addReview($user_id, $product_id, $rating, $comment) {
        $stmt = $this->conn->prepare("INSERT INTO Review (user_id, product_id, rating, comment) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $product_id, $rating, $comment]);
    }

    public function getReviewsByProductId($product_id) {
        $stmt = $this->conn->prepare("SELECT * FROM Review WHERE product_id = ?");
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
