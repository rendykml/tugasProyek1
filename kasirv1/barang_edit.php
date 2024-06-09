<?php 
include 'config.php';

if(isset($_GET['id'])){ // Cek apakah parameter ID barang telah diterima dari URL
    $id_barang = $_GET['id']; // Mengambil nilai ID barang dari URL

    // Mengambil data barang berdasarkan ID
    $result = mysqli_query($dbconnect, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $data = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) === 0){ // Jika data barang tidak ditemukan
        echo '<script>alert("Data barang tidak ditemukan!"); window.location.href = "barang.php";</script>';
        exit;
    }
} else { // Jika parameter ID tidak ditemukan dalam URL
    echo '<script>alert("ID barang tidak ditemukan!"); window.location.href = "barang.php";</script>';
    exit;
}

if (isset($_POST['update'])){ // Cek apakah form telah disubmit dengan tombol "Update"
    // Mengambil nilai yang dikirimkan melalui form
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    
    // Melakukan update data barang ke dalam database
    mysqli_query($dbconnect, "UPDATE barang SET nama='$nama', harga='$harga', jumlah='$jumlah' WHERE id_barang='$id_barang'");

    // Mengalihkan halaman kembali ke list barang setelah berhasil melakukan update
    header("location:barang.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PointOfSale | Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Barang</h1>
        <!-- Form untuk mengedit barang -->
        <form method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama" placeholder="Nama Barang" class="form-control" value="<?= $data['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" placeholder="Harga Barang" class="form-control" value="<?= $data['harga'] ?>" required>
            </div>
            <div class="form-group">
                <label>Jumlah Stock</label>
                <input type="number" name="jumlah" placeholder="Jumlah Stock" class="form-control" value="<?= $data['jumlah'] ?>" required>
            </div>
            <br>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
            <a href="barang.php" class="btn btn-warning">Kembali</a> <!-- Tombol kembali ke list barang -->
        </form>
    </div>
</body>
</html>