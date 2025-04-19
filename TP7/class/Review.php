<?php
require_once __DIR__ . '/../config/config.php';

class Review {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllReview() {
        $stmt = $this->db->query("SELECT * FROM review");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReviewById($id_review) {
        $stmt = $this->db->prepare("SELECT * FROM review WHERE id_review = ?");
        $stmt->execute([$id_review]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllReviewName() {
        $stmt = $this->db->query("SELECT 
            r.id_review,
            u.nama,
            p.nama_produk,
            r.rating,
            r.komentar,
            r.tanggal
            FROM review r
            JOIN users u ON r.id_user = u.id_user
            JOIN produk p ON r.id_produk = p.id_produk");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function updateReview($id_review, $rating, $komentar) {
        $stmt = $this->db->prepare("UPDATE review SET rating = ?, komentar = ? WHERE id_review = ?");
        return $stmt->execute([$rating, $komentar, $id_review]);
    }

    public function createReview($id_user, $id_produk, $rating, $komentar, $tanggal) {
        $stmt = $this->db->prepare("INSERT INTO review (id_user, id_produk, rating, komentar, tanggal) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$id_user, $id_produk, $rating, $komentar, $tanggal]);
    }

    public function deleteReview($id_review) {
        $stmt = $this->db->prepare("DELETE FROM review WHERE id_review = ?");
        return $stmt->execute([$id_review]);
    }

    public function searchReview($keyword) {
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare("SELECT 
            r.id_review,
            u.nama,
            p.nama_produk,
            r.rating,
            r.komentar,
            r.tanggal
            FROM review r
            JOIN users u ON r.id_user = u.id_user
            JOIN produk p ON r.id_produk = p.id_produk
            WHERE r.komentar LIKE ? OR p.nama_produk LIKE ? OR u.nama LIKE ?");
        $stmt->execute([$keyword, $keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>