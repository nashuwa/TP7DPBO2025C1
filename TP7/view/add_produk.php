<?php
require_once '../config/config.php';
require_once '../class/Produk.php';

$produk = new Produk();

if (isset($_POST['submit'])) {
    $produk->createProduk($_POST['brand'], $_POST['nama_produk'], $_POST['kategori'], $_POST['harga'], $_POST['stok']);
    header("Location: ../index.php?page=produk");
    exit;
}
?>

<h3>Add Produk</h3>
<form method="post">
    Brand: <input type="text" name="brand" required><br>
    Nama Produk: <input type="text" name="nama_produk" required><br>
    Kategori: <input type="text" name="kategori" required><br>
    Harga: <input type="number" name="harga" required><br>
    Stok: <input type="number" name="stok" required><br>
    <button type="submit" name="submit">Add Product</button>
</form>