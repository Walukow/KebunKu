<?php
session_start();

if(!isset($_SESSION["loginadmin"])){
    header("Location: login.php");
    exit;
}

require 'fungsi.php';

$produk = query("SELECT * FROM tbl_produk");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Daftar Produk</title>
</head>
<body>
    <div class="jarak1"></div>
    <p class="judul">Daftar Produk</p>
    
    <table class="product-table1">
    <tr>
        <th class="product-number">No</th>
        <th class="product-name">Nama Produk</th>
        <th class="product-price">Harga</th>
        <th class="product-stock">Stock</th>
        <th class="">Gambar</th>
        <th class="action-links">Aksi</th>
    </tr>

    <?php
    $i = 1;
    foreach ($produk as $row) :
    ?>
        <tr>
            <td class="product-number"><?= $i; ?></td>
            <td class="product-name"><?= $row["nama"]; ?></td>
            <td class="product-price"><?= $row["harga"]; ?></td>
            <td class="product-stock"><?= $row["stock"]; ?></td>
            <td class="product-image">
                <img class="img4" src="img/<?= $row["gambar"]; ?>" alt="">
            </td>
            <td class="action-links">
                <div class="container5">
                <a href="ubah.php?id=<?= $row["id"]; ?>" class="edit"><i data-feather="edit"></i></a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" class="hapus1" onclick="return confirm('Konfirmasi')"><i data-feather="trash-2"></i></a>
                </div>
            </td>
        </tr>
    <?php
        $i++;
    endforeach;
    ?>
        <tr>
            <td><?= $i ?></td>
            <td colspan="5">
                <p>Tambah Produk</p>
                <a href="tambah.php" class="tambah">
                    <div class="tombol1">
                    Tambah
                </div>
            </a>
            </td>
        </tr>
</table>
<div class="jarak1"></div>
<div class="learn1a">
    <a href="logout.php"><p><strong>Logout</strong></p></a>
</div>
<div class="jarak"></div>
</body>

<script src="script.js"></script>
<script>
    feather.replace()
</script>

</html>