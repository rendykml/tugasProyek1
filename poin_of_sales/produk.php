<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';
session_start();

$view = $dbconnect->query("SELECT * FROM produk");

if (!$view) {
    die("Error menjalankan query: " . $dbconnect->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php if(isset($_SESSION['success']) && $_SESSION['success'] != ''){?>
        <div class="alert alert-success" role="alert">
           
            <?=$_SESSION['success']?>

        </div>
        <?php }
        $_SESSION['success'] = "";
        ?>
        <h1>List Produk</h1>
        <a href="produk_add.php" class="btn btn-primary">Tambah data</a>
        <table class="table table-bordered">
            <tr>
                <th>ID Produk</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
            <?php

            while ($row = $view->fetch_array()) { ?>

                <tr>
                    <td><?= $row['id_produk'] ?></td>
                    <td><?= $row['nama_produk'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td>
                        <a href="produk_edit.php?id=<?= $row['id_produk'] ?>">Edit</a> | <a href="produk_hapus.php?id=<?= $row['id_produk'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</body>

</html>