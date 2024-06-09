
<?php
// Mengaktifkan error reporting


$host = "localhost";
$user = "root";
$pass = "";
$db = "kasirv1";

// Menampilkan pesan sebelum membuat koneksi
// echo "Sebelum membuat koneksi<br>";

// Membuat koneksi
$dbconnect = new mysqli($host, $user, $pass, $db);

// Menampilkan pesan setelah membuat koneksi
// echo "Setelah membuat koneksi<br>";

// Memeriksa koneksi
if ($dbconnect-> connect_error) {
    echo("Koneksi gagal: " . $dbconnect->connect_error);
} 
