<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';


session_start();

include 'auth_admincheck.php';

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
    <link rel="stylesheet" href="style/admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-container d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4">
                <h1 class="fs-4">
                    <span class="text-dark rounded shadow px-2 me-2"id='orange' >POS</span>
                    <span class="text-white"><i> Point of Sale</i></span>
                </h1>
            </div>
            <ul class="list-unstyled px-2">
                <li class="mt-3"><a class="text-decoration-none " href="index.php" id="dashboard-link" ><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="mt-3"><a class="text-decoration-none " href="user.php" id="user-link" ><i class="fa-solid fa-user"></i> User</a></li>
                <li class="mt-3"><a class="text-decoration-none " href="produk.php" id="produk-link" ><i class="fa-solid fa-list-check"></i> Produk</a></li>
            </ul>
        </div>
        <!-- /Sidebar -->

        <!-- Content -->
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Admin</a>
                    <!-- Nama User -->
                    <a class="nav-link"><?= $_SESSION['nama_user']; ?></a>

                    <!-- Navbar Toggler -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar Content -->
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- Username -->
                            <li class="nav-item">
                                <a class="nav-link active">
                                    Username: <?= $_SESSION['username']; ?>
                                </a>
                            </li>
                            <!-- Logout Button -->
                            <li class="nav-item">
                                <form method="post" action="logout.php">
                                    <button type="submit" class="btn btn-link text-decoration-none">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
                    <div class="alert alert-success" role="alert">

                        <?= $_SESSION['success'] ?>

                    </div>
                <?php }
                $_SESSION['success'] = "";
                ?>
                <h1 class="mt-3">List User</h1>
                <a href="user_add.php" class="btn btn-primary">Tambah data</a>
                <table class="table table-bordered mt-3">
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
            <!-- /Content -->
        </div>
        <script src="style/admin.js"></script>
</body>

</html>