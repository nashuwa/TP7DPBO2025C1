<?php
require_once 'config/config.php';
require_once 'class/Users.php';

$users = new Users();
$listUsers = [];

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $listUsers = $users->searchUsers($_GET['q']);
} else {
    $listUsers = $users->getAllUsers();
}
?>

<link rel="stylesheet" href="../style.css">
<h3>List Users</h3>

<form method="GET" action="">
    <input type="hidden" name="page" value="users">
    <input type="text" name="q" placeholder="Cari nama user..." value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
    <button type="submit" class="btn btn-add">Cari</button>
</form>

<p><a href="view/add_users.php" class="btn btn-add">Tambah User</a></p>

<?php if (isset($_GET['q'])): ?>
    <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['q']) ?></strong></p>
<?php endif; ?>

<?php if (count($listUsers) > 0): ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($listUsers as $u): ?>
    <tr>
        <td><?= $u['id_user'] ?></td>
        <td><?= $u['nama'] ?></td>
        <td><?= $u['email'] ?></td>
        <td><a href="view/update_users.php?id=<?= $u['id_user'] ?>" class="btn btn-update">Update</a></td>
        <td><a href="view/delete_users.php?id=<?= $u['id_user'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus user ini?')">Delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
    <p>Tidak ada user yang ditemukan.</p>
<?php endif; ?>
