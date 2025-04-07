<?php
require_once __DIR__ . '/../config.php';

class UserDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function createUser($username, $email, $password, $role) {
        $stmt = $this->conn->prepare("INSERT INTO User (username, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$username, $email, $password, $role]);
    }

    public function getUserById($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM User WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $stmt = $this->conn->query("SELECT * FROM User");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
