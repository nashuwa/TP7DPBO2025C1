<?php
require_once 'config/config.php';
require_once 'class/Review.php';

$review = new Review();
$listReview = [];

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $listReview = $review->searchReview($_GET['q']);
} else {
    $listReview = $review->getAllReviewName();
}
?>

<h3>List Review</h3>

<form method="GET" action="">
    <input type="hidden" name="page" value="review">
    <input type="text" name="q" placeholder="Cari nama produk, nama user, atau komentar..." value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
    <button type="submit" class="btn btn-add">Cari</button>
</form>

<p><a href="view/add_review.php" class="btn btn-add">Tambah Review</a></p>

<?php if (isset($_GET['q'])): ?>
    <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['q']) ?></strong></p>
<?php endif; ?>

<?php if (count($listReview) > 0): ?>
<table border="1">
    <tr>
        <th>ID Review</th>
        <th>Nama User</th>
        <th>Nama Produk</th>
        <th>Rating</th>
        <th>Komentar</th>
        <th>Tanggal</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($listReview as $r): ?>
    <tr>
        <td><?= $r['id_review'] ?></td>
        <td><?= $r['nama'] ?></td>
        <td><?= $r['nama_produk'] ?></td>
        <td><?= $r['rating'] ?></td>
        <td><?= $r['komentar'] ?></td>
        <td><?= $r['tanggal'] ?></td>
        <td><a href="view/update_review.php?id=<?= $r['id_review'] ?>" class="btn btn-update">Update</a></td>
        <td><a href="view/delete_review.php?id=<?= $r['id_review'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus review ini?')">Delete</a></td>

    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
    <p>Tidak ada review yang ditemukan.</p>
<?php endif; ?>
