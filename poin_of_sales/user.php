<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';


session_start();

// membatasi hak akses
if (isset($_SESSION['userid']))
// if ($_SESSION['auth'] == 'Yes') 
{
    if ($_SESSION['role_id'] == 2) {
        header("location:kasir.php");
    }
} else {
    $_SESSION['error'] = '<i>*Login terlebih dahulu!</i>';
    header("location:login.php");
}

$view = $dbconnect->query("SELECT u.*, r.nama as nama_role FROM user_pengguna as u INNER JOIN role as r ON u.role_id = r.id_role");

if (!$view) {
    die("Error menjalankan query: " . $dbconnect->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
            <div class="alert alert-success" role="alert">

                <?= $_SESSION['success'] ?>

            </div>
        <?php }
        $_SESSION['success'] = "";
        ?>
        <h1>List User</h1>
        <a href="user_add.php" class="btn btn-primary">Tambah data</a>
        <table class="table table-bordered">
            <tr>
                <th>ID Users</th>
                <th>Nama_User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role Akses</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <?php

            while ($row = $view->fetch_array()) { ?>

                <tr>
                    <td><?= $row['id_user'] ?></td>
                    <td><?= $row['nama_user'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['password'] ?></td>
                    <td><?= $row['nama_role'] ?></td>
                    <td><?= $row['nomor_handphone'] ?></td>
                    <td><?= $row['alamat'] ?></td>

                    <td>
                        <a href="user_edit.php?id=<?= $row['id_user'] ?>" class="btn btn-primary">Edit</a> <a href="user_hapus.php?id=<?= $row['id_user'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</body>

</html>