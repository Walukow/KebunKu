<?php
session_start();

require 'fungsi.php';

$url = $_SERVER['REQUEST_URI'];

if (isset($_POST["submit"])) {

    if (pesan($_POST) > 0) {
        $_SESSION["flash"] = 1;
        header("Location: $url");
        exit;
    } else {
        $_SESSION["flash"] = 0;
        header("Location: $url");
        exit;
    }

    if (isset($_POST["hapusSesi"])) {
        unset($_SESSION["flash"]);
        header("Location: $url");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
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
    <?php
        if (isset($_SESSION["flash"])) {
            if ($_SESSION["flash"] > 0) {
                ?>
                    <div class="flasherT">
                        <p><strong>Terima kasih</strong> telah mengerim pertanyaan</p>
                        <form action="" method="post">
                            <button name="hapusSesi">×</button>
                        </form>
                    </div>
                <?php
                unset($_SESSION["flash"]);
            } else {
                ?>
                    <div class="flasherT gagal">
                        <p><strong>GAGAL</strong> mengirim pesan</p>
                        <form action="" method="post">
                            <button name="hapusSesi">×</button>
                        </form>
                    </div>
                <?php
            unset($_SESSION["flash"]);
            }
    unset($_SESSION["flash"]);
        }
        ?>
    <div class="isi1">
        <div class="jarak1"></div>
        <p class="judul">
            Kontak Kami
        </p>
        <p class="tengah">Butuh bantuan? Tim dukungan kami siap membantu Anda dengan setiap pertanyaan.</p>
        <div class="container6">
            <div class="tengah">
                <hr class="garis">
                <p class="judul">Opsi Dukungan</p>
                <p><strong>Live Chat:</strong> Tersedia 24/7</p>
                <p><strong>Email:</strong> support@namatoko.com</p>
                <p><strong>Telepon:</strong> (021) 456-7890 (08.00 - 20.00)</p>
            </div>
            <div>
                <hr class="garis">
                <p class="judul">Pelacakan Pesanan</p>
                <p class="tengah">Periksa status pemesanan anda</p>
                <div class="jarak1"></div>
                <div class="learn1">
                    <a href="">
                        <p><strong>Klik Disini</strong></p>
                    </a>
                </div>
            </div>
            <div>
                <hr class="garis">
                <p class="judul">Tautan Cepat</p>
                <div class="tengah">
                    <div class="learn1">
                        <a href="logout.php">
                            <p><strong>FAQ</strong></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <hr class="garis">
            <p class="judul">Kirim Pertanyaan Anda</p>
            <form action="" method="post">
                <ul class="form-list">
                    <li class="form-item">
                        <label for="name">Nama:</label>
                        <input type="text" id="name" name="nama" class="form-input" required>
                    </li>

                    <li class="form-item">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </li>

                    <li class="form-item">
                        <label for="message">Pesan:</label>
                        <textarea id="message" name="pesan" class="form-textarea" required></textarea>
                    </li>

                    <li class="form-item">
                        <button type="submit" name="submit" class="form-button">Kirim</button>
                    </li>
                </ul>
            </form>
        </div>
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