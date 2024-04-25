<?php
session_start();

if(!isset($_SESSION["loginadmin"])){
    header("Location: login.php");
    exit;
}


require 'fungsi.php';

$id = $_GET["id"];

$produk = query("SELECT * FROM tbl_produk WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data BERHASIL di Ubah');
        document.location.href = 'read.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data GAGAL di UBAH!');
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
    <title>Ubah Produk</title>
</head>
<body>
<a href="read.php" class="judul back1"><i data-feather="arrow-left"></i></a>
    <p class="judul">Ubah Produk</p>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
    <input type="hidden" name="gambarlama" value="<?= $produk["gambar"]; ?>">
    <table class="product-table">
        <tr>
            <th>Nama Produk</th>
            <td>
                <input type="text" name="nama" id="nama" required value="<?= $produk["nama"]; ?>">
            </td>
        </tr>
        <tr>
            <th>Harga Produk</th>
            <td>
                <input type="text" name="harga" id="harga" required value="<?= $produk["harga"]; ?>">
            </td>
        </tr>
        <tr>
            <th>Stock Produk</th>
            <td>
                <input type="text" name="stock" id="stock" required value="<?= $produk["stock"]; ?>">
            </td>
        </tr>
        <tr>
            <th>Gambar Produk</th>
            <td>
                <img class="img4" src="img/<?= $produk["gambar"] ?>" alt="" width="100px">
                <br>
                <input type="file" name="gambar" id="gambar" value="<?= $produk["gambar"] ?>">
            </td>
        </tr>
        <tr>
            <th>Aksi</th>
            <td>
                <button type="submit" name="submit">Ubah Produk</button>
            </td>
        </tr>
    </table>
</form>
<div class="jarak"></div>
</body>

<script src="script.js"></script>
<script>
    feather.replace()
</script>

</html>