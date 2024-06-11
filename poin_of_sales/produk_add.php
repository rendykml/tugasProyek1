<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

if (isset($_POST['simpan'])) {
    // echo var_dump($_POST);
    echo "Form subbmitted<br>";
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($dbconnect, "INSERT INTO produk VALUES ('','$nama','$harga','$jumlah')");

    header("location:produk.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Tambha Produk</h1>
        <form action="" method="post">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="harga Produk">
            </div>
            <div class="form-group">
                <label>jumlah stock</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah stock">
            </div>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="produk.php" class="btn btn-warning">Kembali</a>
        </form>

    </div>
</body>

</html>