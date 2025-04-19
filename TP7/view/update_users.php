<?php
require_once '../config/config.php';
require_once '../class/Users.php';

$users = new Users();

if (isset($_POST['submit'])) {
    $users->updateUsers($_POST['id'], $_POST['nama'], $_POST['email']);
    header("Location: ../index.php?page=users");
    exit;
}

$data = $users->getUserById($_GET['id']);
?>

<h3>Update User</h3>
<form method="post">
    <input type="hidden" name="id" value="<?= $data['id_user'] ?>">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
    Email: <input type="text" name="email" value="<?= $data['email'] ?>"><br>
    <button type="submit" name="submit">Update</button>
</form>
