<?php
include 'config.php';
session_start();

include 'auth_kasircheck.php';

$produk = mysqli_query($dbconnect, "SELECT * FROM produk");
// print_r($_SESSION);
$sum = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $sum += $value['harga'] * (int)$value['jumlah'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Kasir</h1>
                <h2>Hi <?= $_SESSION['nama_user'] ?></h2>
                <a href="logout.php">logout</a> |
                <a href="reset_keranjang.php">Reset Keranjang</a>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-8">
                <form method="post" action="keranjang_action.php" class="form-inline">
                    <div class="input-group mb-3">
                        <select class="form-control" name="id_produk">
                            <option value="">Pilih Produk</option>
                            <?php while ($row = mysqli_fetch_array($produk)) { ?>
                                <option value="<?= $row['id_produk'] ?>"><?= $row['nama_produk'] ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="input-group">
                        <input type="number" name="jumlah" class="form-control" placeholder="jumlah">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </span>
                    </div>
                </form>
                <br>
                <form method="post" action="keranjang_update.php">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </tr>
                        <?php if (isset($_SESSION['cart'])) { ?>
                            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['nama'] ?></td>
                                    <td align="right"><?= number_format($value['harga']) ?></td>
                                    <td class="col-md-2"><input type="number" name="jumlah[]" value="<?= (int)$value['jumlah'] ?>" class="form-control"></td>
                                    <td align="right"><?= number_format((int)$value['jumlah'] * $value['harga']) ?></td>
                                    <td><a href="keranjang_hapus.php?id=<?= $value['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                    <button type="submit" class="btn btn-success">Perbaharui</button>
                </form>
            </div>
            <div class="col-md-4">
                <h3>Total <?= number_format($sum) ?></h3>

            </div>
        </div>
    </div>

</body>

</html>