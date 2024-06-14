<?php
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
    $_SESSION['error'] = '<i>*Login terlebih dahulu!</i>';
    header("location:login.php");
}

if (isset($_GET['id'])) {
    // Mendapatkan ID barang yang akan dihapus dari parameter URL
    $id = $_GET['id'];

    // Menghapus data barang dari database berdasarkan ID
    mysqli_query($dbconnect, "DELETE FROM produk WHERE id_produk = '$id' ");

    // Mengalihkan halaman kembali ke list barang setelah berhasil menghapus
    header("location:produk.php");
}
