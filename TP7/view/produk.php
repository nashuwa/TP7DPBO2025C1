<?php
require_once 'config/config.php';
require_once 'class/Produk.php';

$produk = new Produk();
$listProduk = [];

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $listProduk = $produk->searchProduk($_GET['q']);
} else {
    $listProduk = $produk->getAllProduk();
}
?>

<h3>List Produk</h3>

<form method="GET" action="">
    <input type="hidden" name="page" value="produk">
    <input type="text" name="q" placeholder="Cari nama produk atau brand..." value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
    <button type="submit" class="btn btn-add">Cari</button>
</form>

<p><a href="view/add_produk.php" class="btn btn-add">Tambah Produk</a></p>

<?php if (isset($_GET['q'])): ?>
    <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['q']) ?></strong></p>
<?php endif; ?>

<?php if (count($listProduk) > 0): ?>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listProduk as $p): ?>
        <tr>
            <td><?= $p['id_produk'] ?></td>
            <td><?= $p['brand'] ?></td>
            <td><?= $p['nama_produk'] ?></td>
            <td><?= $p['kategori'] ?></td>
            <td>Rp<?= number_format($p['harga'], 2, ',', '.') ?></td>
            <td><?= $p['stok'] ?></td>
            <td><a href="view/update_produk.php?id=<?= $p['id_produk'] ?>" class="btn btn-update">Update</a></td>
            <td><a href="view/delete_produk.php?id=<?= $p['id_produk'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus produk ini?')">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Tidak ada produk yang ditemukan.</p>
<?php endif; ?>
