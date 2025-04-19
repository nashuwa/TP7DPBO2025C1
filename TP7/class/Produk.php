<?php
require_once __DIR__ . '/../config/config.php';

class Produk {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllProduk() {
        $stmt = $this->db->query("SELECT * FROM produk");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProdukById($id_produk) {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id_produk = ?");
        $stmt->execute([$id_produk]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduk($id_produk, $brand, $nama_produk, $kategori, $harga, $stok) {
        $stmt = $this->db->prepare("UPDATE produk SET brand = ?, nama_produk = ?, kategori = ?, harga = ?, stok = ? WHERE id_produk = ?");
        return $stmt->execute([$brand, $nama_produk, $kategori, $harga, $stok, $id_produk]);
    }

    public function createProduk($brand, $nama_produk, $kategori, $harga, $stok) {
        $stmt = $this->db->prepare("INSERT INTO produk (brand, nama_produk, kategori, harga, stok) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$brand, $nama_produk, $kategori, $harga, $stok]);
    }

    public function deleteProduk($id_produk) {
        $stmt = $this->db->prepare("DELETE FROM produk WHERE id_produk = ?");
        return $stmt->execute([$id_produk]);
    }

    public function searchProduk($keyword) {
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE nama_produk LIKE ? OR brand LIKE ?");
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>