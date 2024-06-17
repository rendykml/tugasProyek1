<?php
session_start();

include 'auth_admincheck.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale</title>
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

        <div class="content flex-grow-1 p-1 ">
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

            <!-- New container for welcome message and actions -->
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="p-4  bg-light rounded">
                            <h2 class="mb-1">Selamat datang</h2>
                            <h2><?= $_SESSION['nama_user']; ?>! <i class="fa-solid fa-hands"></i></h2>
                            <p>Silakan tambahkan pengguna atau produk:</p>
                            <div class="d-flex">
                                <a href="user_add.php" class="btn btn-primary ms-2 me-2">Tambah User</a>
                                <a href="produk_add.php" class="btn btn-success">Tambah Produk</a>
                                <a href="logout.php" class="btn btn-danger ms-auto ">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of new container -->
        </div>
    </div>

    <!-- Load scripts at the end of body to ensure DOM is fully loaded before running them -->

</body>

</html>