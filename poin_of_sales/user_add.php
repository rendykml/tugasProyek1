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



$role = mysqli_query($dbconnect, "SELECT * FROM role");

if (isset($_POST['simpan'])) {
    // echo var_dump($_POST);
    echo "Form subbmitted<br>";
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $nomor_handphone = $_POST['nomor_handphone'];
    $alamat = $_POST['alamat'];

    mysqli_query($dbconnect, "INSERT INTO user_pengguna VALUES ( '','$nama','$username','$password','$role_id', '$nomor_handphone', '$alamat')");
    $_SESSION['success'] = "Berhasil menambahkan data";
    header("location:user.php");
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
        <h1>Tambah User</h1>
        <form action="" method="post">
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nama_user" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Role Akses</label>
                <select class="form-control" name="role_id">Pilih Role Akses
                    <option value="">Pilih Role Akses</option>
                    <?php
                    while ($row = mysqli_fetch_array($role)) { ?>
                        <option value="<?= $row['id_role'] ?>"><?= $row['nama'] ?></opsion>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group">

                <label>Nomor HP</label>
                <input type="tel" name="nomor_handphone" class="form-control" placeholder="" pattern="\+628[0-9]{8,12}" required>
                <small>Format: (+62), berisi 8-12 digit</small>
                <br><br>

            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="">
            </div>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <a href="user.php" class="btn btn-warning">Kembali</a>
        </form>

    </div>
</body>

</html>