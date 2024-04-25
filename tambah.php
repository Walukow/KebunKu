<?php
session_start();

if(!isset($_SESSION["loginadmin"])){
    header("Location: login.php");
    exit;
}


require 'fungsi.php';

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data BERHASIL di Tambahkan');
        document.location.href = 'read.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data GAGAL di Tambahkan!');
        document.location.href = 'read.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Tambah Produk</title>
</head>
<body>
<a href="read.php" class="judul back1"><i data-feather="arrow-left"></i></a>
    <p class="judul">Tambah Produk</p>

    <form action="" method="post" enctype="multipart/form-data">
    <table class="product-table">
        <tr>
            <th>Nama Produk</th>
            <td>
                <input type="text" name="nama" id="nama" required value="">
            </td>
        </tr>
        <tr>
            <th>Harga Produk</th>
            <td>
                <input type="text" name="harga" id="harga" required value="">
            </td>
        </tr>
        <tr>
            <th>Stock Produk</th>
            <td>
                <input type="text" name="stock" id="stock" required value="">
            </td>
        </tr>
        <tr>
            <th>Gambar Produk</th>
            <td>
                <input type="file" name="gambar" id="gambar" value="">
            </td>
        </tr>
        <tr>
            <th>Aksi</th>
            <td>
                <button type="submit" name="submit">Tambah Produk</button>
            </td>
        </tr>
    </table>
</form>
</body>

<script src="script.js"></script>
<script>
    feather.replace()
</script>

</html>