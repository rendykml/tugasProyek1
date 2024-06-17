<?php
include 'config.php';
session_start();
include 'auth_kasircheck.php';

$bayar = preg_replace('/\D/', '', $_POST['bayar']);

// print_r(preg_replace('/\D/','', $_POST['bayar']));

// print_r($_SESSION['cart']);

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor_transaksi = rand(111111, 999999);
$total = $_POST['total'];
$nama = $_SESSION['nama_user'];
$kembali = (int)$bayar - (int)$total;

// insert ke tabel transaksi

mysqli_query($dbconnect, "INSERT INTO transaksi(
id_transaksi,tanggal_waktu,nomor_transaksi,total,nama,bayar,kembali) VALUES (NULL,'$tanggal_waktu','$nomor_transaksi,
'$total','$nama','$bayar','$kembali')");

// mendapatkan id transaksi baru
$id_transaksi = mysqli_insert_id($dbconnect);

// insert ke detail_transaksi
foreach ($_SESSION['cart'] as $key => $value) {
    $id_produk = $value['id'];
    $harga = $value['harga'];
    $jumlah = $value['jumlah'];
    $total_dtransaksi = $harga * $jumlah;

    mysqli_query($dbconnect, "INSERT INTO transaksi_detail (
    id_transaksi_detail,id_transaksi,id_produk,harga,jumlah,total) VALUES (NULL,'$id_transaksi_detail','$id_transaksi',
    'id_produk','$harga','jumlah','$total_dtransaksi') ");

    // $sum += $value['harga']*$value['jumlah];
}

header("location:transaksi_selesai.php");
