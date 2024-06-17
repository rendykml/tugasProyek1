<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';
session_start();
include 'auth_admincheck.php';



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
    $_SESSION['success'] = "Berhasil menambahkan user";
    header("location:user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale - Tambah User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="style/admin.js"></script>
</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar bg-dark text-white" id="side_nav">
            <div class="header-box px-1 mt-4 mb-5">
                <h1 class="fs-4">
                    <span class="text-dark rounded shadow px-2 ms-1 me-1" id="orange">POS</span>
                    <span class="text-white"><i>Menu Admin</i></span>
                </h1>
            </div>
            <ul class="list-unstyled px-2">
                <li class="mt-3"><a class="text-decoration-none" href="index.php" id="dashboard-link"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="mt-3"><a class="text-decoration-none" href="user.php" id="user-link"><i class="fa-solid fa-users"></i> Users</a></li>
                <li class="mt-3"><a class="text-decoration-none" href="produk.php" id="produk-link"><i class="fa-solid fa-list-check"></i> Produk</a></li>
            </ul>
        </div>

        <div class="content flex-grow-1 p-1">
            <nav class="navbar navbar-expand-lg m-2 p-2 bg-light" id="top_nav">
                <div class="container-fluid">
                    <a class="navbar-brand text-black ps-4" href="index.php"><h4><i>Point Of Sales</i></h4></a>

                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown profile-dropdown p-1 me-2">
                                <a class="nav-link dropdown-toggle d-flex align-items-center p-2 text-black" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="index.php"><?= $_SESSION['nama_user']; ?></a></li>
                                    <li><a class="dropdown-item" href="index.php">user : <?= $_SESSION['username']; ?></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-3 mx-2 bg-light p-4 ">
                <h1>Tambah User</h1>
                <form class="" action="" method="post">
                    <div class="form-group mt-1 ">
                        <label>Nama User</label>
                        <input type="text" name="nama_user" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group mt-1 ">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group mt-1 ">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group mt-1 ">
                        <label>Role Akses</label>
                        <select class="form-control" name="role_id" required>
                            <option value="">Pilih Role Akses</option>
                            <?php
                            while ($row = mysqli_fetch_array($role)) { ?>
                                <option value="<?= $row['id_role'] ?>"><?= $row['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mt-1 ">
                        <label><i class="fa-solid fa-phone"></i> Nomor HP</label>
                        <input type="tel" name="nomor_handphone" class="form-control" placeholder="" pattern="\+628[0-9]{8,12}" required>
                        <small>Format: +628 (contoh: +62881122334), harus 8-12 digit</small>
                        <br><br>
                    </div>
                    <div class="form-group mt-1 ">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="" required>
                    </div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                    <a href="user.php" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>