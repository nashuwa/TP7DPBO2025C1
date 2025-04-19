<?php
require_once '../config/config.php';
require_once '../class/Users.php';

$users = new Users();

if (isset($_POST['submit'])) {
    $users->createUsers($_POST['nama'], $_POST['email']);
    header("Location: ../index.php?page=users");
    exit;
}
?>

<h3>Add User</h3>

<form method="post">
    Nama User: <input type="text" name="nama" required><br>
    Email: <input type="text" name="email" required><br>
    <button type="submit" name="submit">Add User</button>
</form>