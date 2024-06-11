<?php
include 'config.php';

if (isset($_GET['id'])) {
    // Mendapatkan ID barang yang akan dihapus dari parameter URL
    $id = $_GET['id'];

    // Menghapus data barang dari database berdasarkan ID
    mysqli_query($dbconnect, "DELETE FROM produk WHERE id_produk = '$id' ");

    // Mengalihkan halaman kembali ke list barang setelah berhasil menghapus
    header("location:produk.php");
}
