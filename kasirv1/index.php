<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PointOfSale | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            text-align: center;
            height: 30vh;
            width: 120vh;
        }
        .btn-custom {
            background-color: #28a745;
            border: none;
            color: #ffffff;
        }
        .btn-custom:hover {
            background-color: #218838;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Selamat Datang di Aplikasi Point of Sale</h1>
        <p class="mb-4">Kelola barang Anda dengan mudah dan efisien.</p>
        <a href="/kasirv1/barang.php" class="btn btn-custom btn-lg">Lihat Daftar Barang</a>
    </div>
</body>
</html>