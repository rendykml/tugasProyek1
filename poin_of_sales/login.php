<?php

include "config.php";
session_start();

// print_r($_SESSION);

if (isset($_POST['masuk'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM user_pengguna WHERE username='$username'AND password = '$password' ");

    //mendapat hasil dari data
    $data = mysqli_fetch_assoc($query);

    //mendapat nilai dari data 
    $check = mysqli_num_rows($query);

    if (!$check) {
        $SESSION['error'] = 'username dan password salah';
    } else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['role_id'] = $data['role_id'];
        // $_SESSION['auth'] = 'Yes';

        header("location:index.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!--  Allert    -->
        <?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error'] ?>
            </div>
        <?php
        }
        $_SESSION['error'] = '';
        ?>

        <h1>Login</h1>
        <form method="post">
            <div class="form-groupby">
                <label for="exampleInputEmail">Username</label>
                <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="form-groupby">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <input type="submit" name="masuk" value="Masuk" class="btn btn-primary">
        </form>
    </div>

</body>

</html>