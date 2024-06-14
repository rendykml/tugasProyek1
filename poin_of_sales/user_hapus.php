<?php

include "config.php";
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



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM `user_pengguna` WHERE id_user= '$id'");

    header("location:user.php");
}
