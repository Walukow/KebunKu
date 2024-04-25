<?php

require 'fungsi.php';

$new = query("SELECT * FROM tbl_produk ORDER BY id DESC LIMIT 2");

$populer = query("SELECT idproduk, SUM(jumlah) AS total_jumlah FROM tbl_riwayat GROUP BY idproduk ORDER BY total_jumlah DESC LIMIT 1;");

$pop = $populer[0]['idproduk'];

$p = query("SELECT * FROM tbl_produk WHERE id = $pop");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KebunKu</title>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <div class="nav-container">
        <div class="nav">
            <a href="index.php" class="navcon"><span class="kebun">Kebun</span><span class="ku">Ku</span></a>
            <button class="menu" id="toggle-menu">☰</button>
            <div class="navd">
                <a href="index.php">Home</a>
                <a href="about.php">Tentang Kami</a>
                <a href="kontak.php">Kontak Kami</a>
                <a href="katalog.php">Katalog</a>
            </div>
        </div>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="kontak.php">Kontak Kami</a></li>
                <li><a href="katalog.php">Katalog</a></li>
            </ul>
        </nav>
    </div>
    <!-- Navbar End -->
    <!-- Content -->
    <div class="intro">
        <div class="animation">
            <div class="isi">
                <p>Transformasi Ruangan Anda</p>
                <p> Menuju Kenyamanan dan Keindahan</p>
                <p>dengan Produk Kami.</p>
            </div>
            <div class="learn">
                <a href="about.php">
                    <p>Pelajari Selengkap nya...</p>
                </a>
            </div>
            <div class="jarak"></div>
            <div class="animasi"></div>
        </div>
    </div>
    <div class="konten">
        <p class="judul">Produk Baru</p>
        <div class="akanKeKanan">
            <div class="container11">
                <div class="card1">
                    <a href="produk.php?id=<?= $new[0]['id'] ?>&from=index">
                        <img src="img/<?= $new[0]['gambar'] ?>" alt="">
                    </a>
                </div>
                <div class="text1">
                    <p>
                        <?= $new[0]['nama'] ?>
                    </p>
                    <h4>Rp
                        <?= $new[0]['harga'] ?>
                    </h4>
                    <p>Tersedia :
                        <?= $new[0]['stock'] ?>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="akanKeKiri">
            <div class="container12">
                <div class="card2">
                    <a href="produk.php?id=<?= $new[1]['id'] ?>&from=index">
                        <img src="img/<?= $new[1]['gambar'] ?>" alt="">
                    </a>
                </div>
                <div class="text2">
                    <p>
                        <?= $new[1]['nama'] ?>
                    </p>
                    <h4>Rp
                        <?= $new[1]['harga'] ?>
                    </h4>
                    <p>Tersedia :
                        <?= $new[1]['stock'] ?>
                    </p>
                </div>
            </div>
        </div>
        <hr class="garis">
        <div class="judul2">
            <p>Populer Saat Ini</p>
        </div>
        <div class="newproduk">
            <div class="img5">
                <a href="produk.php?id=<?= $p[0]['id'] ?>&from=index">
                    <img src="img/<?= $p[0]['gambar'] ?>" alt="">
                </a>
            </div>
            <div class="text3">
                <p>
                    <?= $p[0]['nama'] ?>
                </p>
                <h4>Rp
                    <?= $p[0]['harga'] ?>
                </h4>
                <p>Tersedia :
                    <?= $p[0]['stock'] ?>
                </p>
            </div>
        </div>
    </div>
    <!-- Content End-->
    <!-- Footer -->
    <div class="foot">
        <div class="sosial">
            <a class="i" href="#"><i data-feather="instagram">
                </i></a>
            <a class="f" href="#"><i data-feather="facebook">
                </i></a>
            <a class="x" href="#"><i data-feather="twitter">
                </i></a>
        </div>
        <div class="link">
            <a href="index.php">Home</a>
            <a href="about.php">Tentang Kami</a>
            <a href="kontak.php">Kontak Kami</a>
            <a href="katalog.php">Tentang Kami</a>
        </div>
        <div class="copy">
            <p> 2024 &copy; Copyright by <a href="#">Lambang</a></p>
        </div>
    </div>
    <!-- Footer End-->
</body>

<script src="script.js"></script>
<script>
    feather.replace()
</script>

</html>