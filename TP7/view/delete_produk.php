<?php
require_once '../config/config.php';
require_once '../class/Produk.php';

if (isset($_GET['id'])) {
    $produk = new Produk();
    $produk->deleteProduk($_GET['id']);
}

header("Location: ../index.php?page=produk");
exit;