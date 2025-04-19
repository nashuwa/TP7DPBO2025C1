<?php
require_once '../config/config.php';
require_once '../class/Produk.php';

$produk = new Produk();

if (isset($_POST['submit'])) {
    $produk->updateProduk($_POST['id'], $_POST['brand'], $_POST['nama_produk'], $_POST['kategori'], $_POST['harga'], $_POST['stok']);
    header("Location: ../index.php?page=produk");
    exit;
}

$data = $produk->getProdukById($_GET['id']);
?>

<h3>Update Produk</h3>
<form method="post">
    <input type="hidden" name="id" value="<?= $data['id_produk'] ?>">
    Brand: <input type="text" name="brand" value="<?= $data['brand'] ?>"><br>
    Nama Produk: <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>"><br>
    Kategori: <input type="text" name="kategori" value="<?= $data['kategori'] ?>"><br>
    Harga: <input type="number" name="harga" value="<?= $data['harga'] ?>"><br>
    Stok: <input type="number" name="stok" value="<?= $data['stok'] ?>"><br>
    <button type="submit" name="submit">Update</button>
</form>
