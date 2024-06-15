<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

session_start();
include 'auth_kasircheck.php';


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
    <link rel="stylesheet" href="style/admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="main-container d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4">
                <h1 class="fs-4">
                    <span class="bg-white text-dark rounded shadow px-2 me-2">POS</span>
                    <span class="text-white">Point of Sale</span>
                </h1>
            </div>
            <ul class="list-unstyled px-2">
                <li class="mt-3"><a class="text-decoration-none text-white" href="index.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="mt-3"><a class="text-decoration-none text-white" href="user.php"><i class="fa-solid fa-user"></i> User</a></li>
                <li class="mt-3"><a class="text-decoration-none text-white" href="produk.php"><i class="fa-solid fa-list-check"></i> Produk</a></li>
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

            <!-- Main Content -->
            <div class="container mt-3">
                <h1>List Produk</h1>
                <a href="produk_add.php" class="btn btn-primary">Tambah data</a>
                <table class="table table-bordered mt-3">
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
</body>

</html>