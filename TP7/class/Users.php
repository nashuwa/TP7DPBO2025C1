<?php
require_once __DIR__ . '/../config/config.php';

class Users {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id_user) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id_user = ?");
        $stmt->execute([$id_user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function updateUsers($id_user, $nama, $email) {
        $stmt = $this->db->prepare("UPDATE users SET nama = ?, email = ? WHERE id_user = ?");
        return $stmt->execute([$nama, $email, $id_user]);
    }

    public function createUsers($nama, $email) {
        $stmt = $this->db->prepare("INSERT INTO users (nama, email) VALUES (?, ?)");
        return $stmt->execute([$nama, $email]);
    }

    public function deleteUsers($id_user) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id_user = ?");
        return $stmt->execute([$id_user]);
    }
    
    public function searchUsers($keyword) {
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare("SELECT * FROM users WHERE nama LIKE ? OR email LIKE ?");
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>