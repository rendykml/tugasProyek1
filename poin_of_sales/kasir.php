<?php
session_start();

// membatasi hak akses
if (isset($_SESSION['userid']))
// if ($_SESSION['auth'] == 'Yes') 
{
    if ($_SESSION['role_id'] == 1) {
        header("location:index.php");
    }
} else {
    $_SESSION['error'] = '<i>*Login terlebih dahulu!</i>';
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Kasir</h1>
        <h2>Hi <?= $_SESSION['nama_user'] ?></h2>
        <a href="logout.php">logout</a>
    </div>

</body>

</html>