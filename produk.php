<?php
session_start();

require 'fungsi.php';

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$produklainya = query("SELECT * FROM tbl_produk");
$konfrimid = [];
foreach ($produklainya as $row) {
    global $konfrimid;
    $konfrimid[] = $row["id"];
}

if ($_GET["id"] == 'rawrrr') {
    echo "<script>
        alert('kamu menemukan rahasia tersembunyi')
        document.location.href = 'index.php'
        </script>";
} else if (!in_array($_GET["id"], $konfrimid)) {
    header("Location: index.php");
    exit;
}

$id = $_GET["id"];

$produk = query("SELECT * FROM tbl_produk WHERE id = $id")[0];

$url = $_SERVER['REQUEST_URI'];

if (isset($_POST["submit"])) {
    $username = $_SESSION["username"];

    $query = mysqli_query($conn, "SELECT * FROM tbl_keranjang WHERE username = '$username' AND idproduk = '$id'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION["flash"] = 0;
        header("Location: $url");
        exit;
    } else {
        tambahkeranjang($_SESSION, $_GET);
        $_SESSION["flash"] = 1;
        header("Location: $url");
        exit;
    }
}

if (isset($_POST["hapusSesi"])) {
    unset($_SESSION["flash"]);
    header("Location: $url");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
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
                <p>Produk <strong>BERHASIL</strong> ditambahkan ke dalam keranjang</p>
                <form action="" method="post">
                    <button name="hapusSesi">×</button>
                </form>
            </div>
            <?php
            unset($_SESSION["flash"]);
        } else {
            ?>
            <div class="flasherT gagal">
                <p>Produk <strong>SUDAH</strong> di dalam keranjang</p>
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
    <div class="container3">
        <a href="
<?php
if (isset($_GET["from"])) {
    $from = trim($_GET["from"]);
    if (!in_array($from, ["cart", "index", "katalog"])) {
        echo "katalog";
    } else {
        echo $from;
    }
} else {
    echo "katalog";
}
?>
.php" class="judul back"><i data-feather="arrow-left"></i></a>
        <a class="i" href="cart.php">
            <div class="cart">
                <i data-feather="shopping-cart"></i>
            </div>
        </a>
        <div class="img">
            <img src="img/<?= $produk["gambar"] ?>" class="border" alt="">
        </div>
        <div class="text3">
            <p><?= $produk["nama"] ?></p>
            <h4><?= $produk["harga"] ?></h4>
            <p>stok : <?= $produk["stock"] ?></p>
            <?php
            if (!isset($_SESSION["username"])) {
                ?>
                <p class="tengah"><strong>Login terlebih dahulu agar dapat membeli!</strong></p>
                <div class="jarak1"></div>
                <div class="learn1">
                    <a href="login.php">
                        <p><strong>Login</strong></p>
                    </a>
                </div>
                <?php
            } elseif ($produk["stock"] == 0) {
                ?>
                <p class="tengah"><strong>Stok Telah Habis</strong></p>
                <?php
            } else {
                ?>

                <form action="" method="post">
                    <button class="tmbl" name="submit">
                        + Keranjang
                    </button>
                </form>
                <?php
            }
            ?>
        </div>
        <div class="jarak"></div>
        <hr class="garis">
    </div>
    <div class="jarak"></div>
    <hr class="garis">
    <div class="judul">
        <p>Produk Lainya</p>
    </div>
    <div class="daftar">

        <?php
        foreach ($produklainya as $row):
            ?>
            <div class="card">
                <a href="produk.php?id=<?= $row["id"] ?>&from=<?php if (isset($_GET["from"])) {
                    echo $_GET['from'];
                } else {
                    echo "katalog";
                } ?>">
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
</body>

<script src="script.js"></script>
<script>
    feather.replace()
</script>

</html>