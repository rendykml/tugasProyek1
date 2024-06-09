<?php 

include 'config.php';


if (isset($_POST['simpan'])){
     // echo var_dump($post);
     
     $nama = $_POST['nama'];
     $harga = $_POST['harga'];
     $jumlah = $_POST['jumlah'];
     
     // Menyimpan ke database
     mysqli_query($dbconnect, "INSERT INTO barang VALUES('','$nama','$harga','$jumlah')");

     // Mengalihkan halaman ke list barang
     header("location:barang.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PointOfSale | Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <form method="post">
            <div class="form-group">
                <label >Nama Barang</label>
                <input type="text" name="nama" placeholder="Nama Barang" class="form-control">
            </div>
            <div class="form-group">
                <label >Harga</label>
                <input type="number" name="harga" placeholder="Harga Barang" class="form-control">
            </div>
            <div class="form-group">
                <label >Jumlah Stock</label>
                <input type="number" name="jumlah" placeholder="Jumlah Stock" class="form-control">
            </div>
            <br>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
            <a href="/kasirv1/barang.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
    
</body>
</html>