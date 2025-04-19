<?php
require_once 'class/Produk.php';
require_once 'class/Review.php';
require_once 'class/Users.php';

$produk = new Produk();
$review = new Review();
$users = new Users();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <nav>
            <a href="?page=produk" class="btn btn-add">Daftar Produk</a> |
            <a href="?page=review" class="btn btn-add">Daftar Review</a> |
            <a href="?page=users" class="btn btn-add">Daftar Pengguna</a>
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'produk') include 'view/produk.php';
            elseif ($page == 'review') include 'view/review.php';
            elseif ($page == 'users') include 'view/users.php';
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>