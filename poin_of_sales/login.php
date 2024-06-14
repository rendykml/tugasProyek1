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
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous"
    >
   <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container-fluid">
      
    <form method="post" class="mx-auto ">
        <h1 class="text-center">Login</h1>
        <div class="mb-3 mt-5">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <!--  Allert    -->
        <?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
                
            <div class="alert" role="alert">
                *Login terlebih dahulu!
            </div>
            
        <?php
        }
        $_SESSION['error'] = '';
        ?>
        
        <button type="submit" name="masuk" value="Masuk" class="btn btn-primary">Masuk</button>
    </form>
    </div>

</body>

</html>