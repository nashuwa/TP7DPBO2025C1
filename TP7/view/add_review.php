<?php
require_once '../config/config.php';
require_once '../class/Review.php';

$review = new Review();

if (isset($_POST['submit'])) {
    $review->createReview($_POST['id_user'], $_POST['id_produk'], $_POST['rating'], $_POST['komentar'], date('Y-m-d'));
    header("Location: ../index.php?page=review");
    exit;
}

?>

<h3>Add Review</h3>
<form method="post">
    ID User: <input type="number" name="id_user" required><br>
    ID Produk: <input type="number" name="id_produk" required><br>
    Rating: <input type="number" name="rating" min="1" max="5" required><br>
    Komentar: <textarea name="komentar" required></textarea><br>
    <button type="submit" name="submit">Add Product</button>
</form>