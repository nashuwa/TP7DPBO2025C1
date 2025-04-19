<?php
require_once '../config/config.php';
require_once '../class/Review.php';

$review = new Review();

if (isset($_POST['submit'])) {
    $review->updateReview($_POST['id_review'], $_POST['rating'], $_POST['komentar']);
    header("Location: ../index.php?page=review");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $allReview = $review->getAllReviewName();
    $data = null;

    foreach ($allReview as $r) {
        if ($r['id_review'] == $id) {
            $data = $r;
            break;
        }
    }

    if (!$data) {
        echo "Review tidak ditemukan.";
        exit;
    }
}
?>

<h3>Update Review</h3>
<form method="post">
    <input type="hidden" name="id_review" value="<?=$data['id_review']?>">
    Rating: <input type="number" name="rating" min="1" max="5" value="<?=$data['rating']?>" required><br>
    Komentar: <textarea name="komentar" required><?=$data['komentar']?></textarea><br>
    <button type="submit" name="submit">Update</button>
</form>
