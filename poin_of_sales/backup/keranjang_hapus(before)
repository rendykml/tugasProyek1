<?php
include 'config.php';
session_start();
include 'auth_kasircheck.php';

$id = $_GET['id_produk'];

$cart = $_SESSION['cart'];
// print_r($cart);
$k = array_filter($cart, function ($var) use ($id) {
    return ($var['id'] == $id);
});
print_r($k);

// foreach ($k as $key => $value) {
//     unset($_SESSION['cart'][$key]);
// }
// $_SESSION['cart'] = array_values($_SESSION['cart']);

// header('location:keranjang_hapus.php');
