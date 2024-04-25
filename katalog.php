<?php 
require 'fungsi.php';

$produk = query("SELECT * FROM tbl_produk"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
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
    <a class="i" href="cart.php"><div class="cart">
        <i data-feather="shopping-cart"></i>
    </div></a>
    <div class="daftar">
<?php 
    foreach ($produk as $row) :
?>
    <div class="card">
            <a href="produk.php?id=<?= $row["id"] ?>">
            <img src="img/<?= $row["gambar"] ?>" alt="">
            <p><?= $row["nama"] ?></p>
            <h4>Rp<?= $row["harga"] ?></h4>
            <p>Tersedia <?= $row["stock"] ?></p>
            </a>
    </div>
<?php 
endforeach
?>
    </div>
    <!-- Content End -->
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
            <a href="katalog.php">Katalog</a>
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