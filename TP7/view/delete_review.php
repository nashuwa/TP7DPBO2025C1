<?php
require_once '../config/config.php';
require_once '../class/Review.php';

if (isset($_GET['id'])) {
    $review = new Review();
    $review->deleteReview($_GET['id']);
}

header("Location: ../index.php?page=review");
exit;