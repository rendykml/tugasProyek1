<<?php
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
        $_SESSION['error'] = 'anda harus login terlebih dahulu';
        header("location:login.php");
    }



    $role = mysqli_query($dbconnect, "SELECT * FROM role ");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $result = mysqli_query($dbconnect, "SELECT * FROM user_pengguna WHERE id_user='$id'");
        $data = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) === 0) { // Jika data user tidak ditemukan
            echo '<script>alert("Data user tidak ditemukan!"); window.location.href = "user.php";</script>';
            exit;
        }
    } else { // Jika parameter ID user tidak ditemukan dalam URL
        echo '<script>alert("ID user tidak ditemukan!"); window.location.href = "user.php";</script>';
        exit;
    }

    if (isset($_POST['update'])) { // Cek apakah form telah disubmit dengan tombol "Update"
        // Mengambil nilai yang dikirimkan melalui form
        $id = $_POST['id_user'];
        $nama = $_POST['nama_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];

        // Melakukan update data user ke dalam database
        mysqli_query($dbconnect, "UPDATE user_pengguna SET nama_user='$nama', username ='$username', password='$password', role_id = '$role_id' WHERE id_user='$id'");

        // Mengalihkan halaman kembali ke list user setelah berhasil melakukan update
        header("location:user.php");
    }

    ?> <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perbaharui User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <h1>Perbaharui User</h1>
            <form method="post">
                <input type="hidden" name="id_user" value="<?= isset($data['id_user']) ? $data['id_user'] : '' ?>">
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="nama_user" class="form-control" placeholder="Nama User" value="<?= isset($data['nama_user']) ? $data['nama_user'] : '' ?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= isset($data['username']) ? $data['username'] : '' ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Password" value="<?= isset($data['password']) ? $data['password'] : '' ?>">
                </div>
                <div class="form-group">
                    <label>Role Akses</label>
                    <select class="form-control" name="role_id">Pilih Role Akses
                        <option value="">Pilih Role Akses</option>
                        <?php
                        while ($row = mysqli_fetch_array($role)) { ?>
                            <option value="<?= $row['id_role'] ?>" <?= $row['id_role'] == $data['role_id'] ? 'selected' : '' ?>><?= $row['nama'] ?></opsion>
                            <?php } ?>
                    </select>
                </div>
                <input type="submit" name="update" value="Perbaharui" class="btn btn-primary">
                <a href="user.php" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </body>

    </html>