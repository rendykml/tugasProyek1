<?php 

include "config.php";
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    mysqli_query($dbconnect, "DELETE FROM `user_pengguna` WHERE id_user= '$id'");

    header("location:user.php");
}