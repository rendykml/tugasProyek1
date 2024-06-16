<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

session_start();
include 'auth_admincheck.php';


$view = $dbconnect->query("SELECT * FROM produk");

if (!$view) {
    die("Error menjalankan query: " . $dbconnect->error);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Produk - Point Of Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
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
                <li class="mt-3"><a class="text-decoration-none" href="user.php" id="user-link"><i class="fa-solid fa-user"></i> User</a></li>
                <li class="mt-3"><a class="text-decoration-none" href="produk.php" id="produk-link"><i class="fa-solid fa-list-check"></i> Produk</a></li>
            </ul>
        </div>

        <div class="content flex-grow-1 p-1 rounded ">
            <nav class="navbar navbar-expand-lg p-2 bg-light" id="top_nav" >
                <div class="container-fluid">
                    <a class="navbar-brand text-black ps-4 " href="#"><i>Point Of Sales</i></a>

                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                            <li class="nav-item dropdown profile-dropdown p-1 me-2 ">
                                <a class="nav-link dropdown-toggle d-flex align-items-center p-2 text-black" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="index.php"><?= $_SESSION['nama_user']; ?></a></li>
                                    <li><a class="dropdown-item" href="index.php">user : <?= $_SESSION['username']; ?></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger " href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Main Content -->
            <div class="container mt-3 ms-3">
                <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success'] ?>
                    </div>
                <?php }
                $_SESSION['success'] = "";
                ?>
                <h1>List Produk</h1>
                <a href="produk_add.php" class="btn btn-primary">Tambah data</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID Produk</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Looping data produk
                        while ($row = $view->fetch_array()) {
                        ?>
                            <tr>
                                <td><?= $row['id_produk'] ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['harga'] ?></td>
                                <td><?= $row['jumlah'] ?></td>
                                <td class="">
                                    <!-- Link Edit dan Hapus -->
                                    <a class="btn btn-primary" href="produk_edit.php?id=<?= $row['id_produk']; ?>">Edit</a>
                                    <a class="btn btn-danger" href="produk_hapus.php?id=<?= $row['id_produk'] ?>">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /Main Content -->
        </div>
        <!-- /Content -->
    </div>

    <!-- Muat skrip di akhir body untuk memastikan DOM telah dimuat sepenuhnya sebelum mereka dijalankan -->
    <script src="style/admin.js"></script>
        </div>
    </div>

    <!-- Muat skrip di akhir body untuk memastikan DOM telah dimuat sepenuhnya sebelum mereka dijalankan -->
    
            
</body>

</html>
