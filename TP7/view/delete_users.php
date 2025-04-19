<?php
require_once '../config/config.php';
require_once '../class/Users.php';

if (isset($_GET['id'])) {
    $users = new Users();
    $users->deleteUsers($_GET['id']);
}

header("Location: ../index.php?page=users");
exit;