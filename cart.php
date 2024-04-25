<?php
session_start();

require 'fungsi.php';

date_default_timezone_set('Asia/Jakarta');

$produklainya = query("SELECT * FROM tbl_produk");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$url  = $_SERVER['REQUEST_URI'];

if (isset($_POST["konfirmasi"])) {
    if (bayar($_POST, $_SESSION["username"]) > 0) {
        $_SESSION["flash"] = 1;
        header("Location: $url");
        exit;
    } else {
        $_SESSION["flash"] = 0;
        header("Location: $url");
        exit;
    }
}

if (isset($_POST["hapus"])) {
    if (hapuskeranjang($_POST["idproduk"][0], $_SESSION["username"]) > 0) {
        $_SESSION["flash"] = 11;
        header("Location: $url");
        exit;
    } else {
        $_SESSION["flash"] = 10;
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
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <title>Keranjang</title>
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
            if ($_SESSION["flash"] == 1) {
                ?>
                    <div class="flasherT">
                        <p><strong>TERIMA KASIH</strong> telah membeli produk kami</p>
                        <form action="" method="post">
                            <button name="hapusSesi">×</button>
                        </form>
                    </div>
                <?php
                unset($_SESSION["flash"]);
            } else if ($_SESSION["flash"] == 0)  {
                ?>
                    <div class="flasherT gagal">
                        <p><strong>GAGAL</strong> membeli produk</p>
                        <form action="" method="post">
                            <button name="hapusSesi">×</button>
                        </form>
                    </div>
                <?php
            unset($_SESSION["flash"]);
            } else if ($_SESSION["flash"] == 11) {
                ?>
                    <div class="flasherT">
                        <p>Produk <strong>BERHASIL</strong> di hapus dari keranjang</p>
                        <form action="" method="post">
                            <button name="hapusSesi">×</button>
                        </form>
                    </div>
                <?php
            unset($_SESSION["flash"]);
            } else if ($_SESSION["flash"] == 10) {
                ?>
                    <div class="flasherT gagal">
                        <p>Produk <strong>GAGAL</strong> di hapus darikeranjang</p>
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
        <a href="katalog.php" class="judul back1">
            <i data-feather="arrow-left"></i></a>
        <div class="container6">
            <div class="keranjang">
                <hr class="garis2">
                <p class="judul">Keranjang</p>
                <?php
                if (!isset($_SESSION["login"])) {
                    ?>
                    <p class="tengah"><strong>Login terlebih dahulu agar dapat membeli!</strong></p>
                    <div class="jarak1"></div>
                    <div class="learn1">
                        <a href="login.php">
                            <p><strong>Login</strong></p>
                        </a>
                    </div>
                </div>
                    <?php
                } else {
                    ?>
                    <div class="container2">
                        <?php
                        $user = $_SESSION["username"];

                        $query = "SELECT * FROM tbl_keranjang WHERE username = '$user'";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)):
                            $idproduk = $row['idproduk'];

                            $query_barang = "SELECT id, nama, harga, stock, gambar FROM tbl_produk WHERE id = $idproduk AND stock > 0";
                            $result_barang = mysqli_query($conn, $query_barang);

                            if ($result_barang) {

                                $data_barang = mysqli_fetch_assoc($result_barang);


                                if ($data_barang) {
                                    ?>
                                    <div class="card3">
                                        <img src="img/<?= $data_barang['gambar'] ?>" class="img3 card3i border1" alt="">
                                        <p class="card3i2">
                                            <?= $data_barang['nama'] ?>
                                        </p>
                                        <div class="harga">
                                            <p class="card3i2">
                                                Rp
                                                <?= $data_barang['harga'] ?>
                                            </p>
                                            <div class="harga1">
                                                
                                                <div class="tombol card3i1">
                                                    <form action="" method="post" class="pusing" >
                                                        <input type="number" name="jumlah[]" class="angka" min="1"
                                                            max="<?= $data_barang['stock'] ?>" value="1" required>
                                                        <input type="hidden" name="tanggal[]"
                                                            value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                        <input type="hidden" name="idproduk[]" value="<?= $data_barang['id'] ?>">
                                                        <input type="hidden" name="stock[]" value="<?= $data_barang['stock'] ?>">
                                                </div>
                                                <button type="submit" class="hapus" name="hapus"><i data-feather="trash-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $ada = true;
                                }
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        endwhile;

                        if (isset($ada)) {
                            ?>
                            <div class="card5">
                                <button type="submit" class="card3i konfirmasi" name="konfirmasi">KONFIRMASI untuk
                                    Bayar</button>
                                </form>
                            </div>
                        <?php
                        } else {
                            ?>
                        <p class="judul">Tambahkan Produk terlebih dahulu</p>
                        <hr class="garis">
                        <?php
                        }
                        $data_perhalaman = 3;
                        $jumlah_data = count(query("SELECT * FROM tbl_riwayat WHERE username = '$user'"));
                        $jumlah_hal = ceil($jumlah_data / $data_perhalaman); 
                        $halaman_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
                        if ($halaman_aktif > $jumlah_hal || $halaman_aktif < 1) {
                            $halaman_aktif = 1;
                        }
                        $awal_data = ($data_perhalaman * $halaman_aktif) - $data_perhalaman;
                        $query_riwayat = "SELECT * FROM tbl_riwayat WHERE username = '$user' ORDER BY tanggal DESC LIMIT $awal_data, $data_perhalaman";
                        $query_user = "SELECT * FROM tbl_user WHERE nama = '$user'";
                        $result_riwayat = mysqli_query($conn, $query_riwayat);
                        $result_user = mysqli_query($conn, $query_user);
                        $row_user = mysqli_fetch_assoc($result_user);
                        ?>
                        </div>
                </div>
                <div class="riwayat" >
                    <div id="riwayat"></div>
                    <hr class="garis2">
                    <p class="judul">Riwayat Pembayaran</p>
                    <div class="container8">
                        <div class="container9">
                        <?php
                    while ($row_riwayat = mysqli_fetch_assoc($result_riwayat)) {
                        $idproduk_riwayat = $row_riwayat['idproduk'];
                        $query_barang_riwayat = "SELECT * FROM tbl_produk WHERE id = $idproduk_riwayat";

                        $result_barang_riwayat = mysqli_query($conn, $query_barang_riwayat);

                        if ($result_barang_riwayat) {

                            $data_barang_riwayat = mysqli_fetch_assoc($result_barang_riwayat);


                            if ($data_barang_riwayat) {
                                ?>
                                <div class="container2">
                                    <div class="card3">
                                        <img src="img/<?= $data_barang_riwayat['gambar'] ?>" class="img3 card3i border1" alt="">
                                        <div class="card3i2">
                                            <p>
                                                <?= $data_barang_riwayat['nama'] ?>
                                            </p>
                                            <p>Alamat :
                                                <?= $row_user['alamat'] ?>
                                            </p>
                                            <p>No HP :
                                                <?= $row_user['nohp'] ?>
                                            </p>
                                        </div>
                                        <div class="harga">
                                            <div class="card3i2">
                                                <p>Harga : Rp
                                                    <?= $data_barang_riwayat['harga'] ?>
                                                </p>
                                                <p>Jumlah :
                                                    <?= $row_riwayat['jumlah'] ?>
                                                </p>
                                                <p>
                                                    <?= $row_riwayat['tanggal'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    }
                ?>
                </div>
                <div class="container7">
                    <?php
                    $rwyt = "#riwayat";
                    if ($jumlah_data > 0) {
                    if ($jumlah_hal == 1) {?>
                    <span><i data-feather="chevron-left"></i></span>
                    <span class="icon"><?= $halaman_aktif ?></span>
                    <span><i data-feather="chevron-right"></i></span>
                    <?php } elseif ($halaman_aktif == $jumlah_hal ) { ?>
                    <a class="icon" href="?halaman=<?= $halaman_aktif - 1?><?= $rwyt ?>"><i data-feather="chevron-left"></i></a>
                    <span class="icon"><?= $halaman_aktif ?></span>
                    <span><i data-feather="chevron-right"></i></span>
                    <?php } elseif ($halaman_aktif == 1) { ?>
                    <span><i data-feather="chevron-left"></i></span>
                    <span class="icon"><?= $halaman_aktif ?></span>
                    <a class="icon" href="?halaman=<?= $halaman_aktif + 1?><?= $rwyt ?>"><i data-feather="chevron-right"></i></a>
                    <?php } else { ?>
                        <a class="icon" href="?halaman=<?= $halaman_aktif - 1?><?= $rwyt ?>"><i data-feather="chevron-left"></i></a>
                        <span class="icon"><?= $halaman_aktif ?></span>
                    <a class="icon" href="?halaman=<?= $halaman_aktif + 1?><?= $rwyt ?>"><i data-feather="chevron-right"></i></a>
                    <?php }} ?>
                    </div>
                    </div>
            </div>
        </div>
                <?php } ?>
                    </div>
        <hr class="garis2">
        <div class="judul">
            <p>Tambah Produk Lainnya</p>
        </div>
        <div class="daftar">

            <?php
            foreach ($produklainya as $row):
                ?>
                <div class="card">
                    <a href="produk.php?id=<?= $row["id"] ?>&from=cart">
                        <img src="img/<?= $row["gambar"] ?>" alt="">
                        <p>
                            <?= $row["nama"] ?>
                        </p>
                        <h4>
                            <?= $row["harga"] ?>
                        </h4>
                        <p>Tersedia
                            <?= $row["stock"] ?>
                        </p>
                    </a>
                </div>
                <?php
            endforeach
            ?>
        </div>
    </div>
    <!-- Content End -->
    <!-- Footer -->
    <div class="foot">
        <div class="sosial">
            <a href="#"><i data-feather="instagram">
                </i></a>
            <a href="#"><i data-feather="facebook">
                </i></a>
            <a href="#"><i data-feather="twitter">
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