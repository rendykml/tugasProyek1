<?php 
include 'config.php';
$view = $dbconnect->query("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PointOfSale | List Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>List Barang</h1>
        <a href="/kasirv1/barang_add.php" class="btn btn-primary btn-sm">Tambah Data</a>
        <table class="table table-bordered">
            <tr>
                <th>ID Barang</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah Stok</th>
                <th>Aksi</th>
            </tr>
            <?php 
            while ($row = $view->fetch_array()){ ?>
                <tr>
                    <td><?= $row['id_barang']?></td>
                    <td><?= $row['nama']?></td>
                    <td><?= $row['harga']?></td>
                    <td><?= $row['jumlah']?></td>
                    <td>
                        <a href="/kasirv1/barang_edit.php?id=<?= $row['id_barang'] ?>">Edit</a> |
                        <!-- Menambahkan konfirmasi JavaScript saat tombol Hapus ditekan -->
                        <a href="/kasirv1/barang_hapus.php?id=<?= $row['id_barang'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    
</body>
</html>