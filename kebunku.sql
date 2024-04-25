-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2024 pada 08.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kebunku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `idproduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id`, `username`, `idproduk`) VALUES
(22, 'akbar69', 14),
(24, 'akbar69', 13),
(88, 'akbar69', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'asadlk', 'asldja@gmail.com', 'hello world'),
(4, 'asljdalsj', 'alskdjal@gmail.com', 'slakdjasjd'),
(5, 'anon', 'asdas@gmail.com', 'asdasd'),
(6, 'anon', 'asdas@gmail.com', 'asdasd'),
(7, 'anon', 'asd@gmail.com', 'ngetes'),
(8, 'Pupuk', 'lj@gmail.com', 'ngetes'),
(9, 'slakdjlaks', 'lj@gmail.com', 'ngetes\r\n'),
(10, 'Pupuk', 'lj@gmail.com', 'ngetes'),
(11, 'anon', 'lj@gmail.com', 'ngetes'),
(12, 'anon', 'lj@gmail.com', 'ngetes\r\n'),
(13, 'Pupuk', 'lj@gmail.com', 'ngetes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `nama`, `harga`, `stock`, `gambar`) VALUES
(1, 'Bunga Matahari', '150.000', 21, '65ca448b7e92e.png'),
(3, 'Bunga Iris', '500.000', 15, '65ca4623607f5.png'),
(4, 'Tanaman Aloe Vera', '50.000', 16, '65ca4645db1d4.png'),
(5, 'Tanaman Stevia', '100.000', 3, '65ca4664680d7.png'),
(7, 'Pot Plastik', '5.000', 22, '65ca46a570273.png'),
(11, 'Pot Tanah Liat', '10.000', 1, '65cd16b59c91a.png'),
(13, 'Pupuk', '10.000', 36, '65cd1706b7ee2.png'),
(14, 'Bunga Mawar', '400.000', 8, '65cd179e16aa7.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id`, `username`, `idproduk`, `jumlah`, `tanggal`) VALUES
(75, 'lambang', 13, 2, '2024-02-18 21:59:17'),
(91, 'lambang', 14, 1, '2024-03-18 07:32:33'),
(92, 'lambang', 5, 1, '2024-03-18 07:33:46'),
(93, 'lambang', 13, 1, '2024-03-18 07:35:12'),
(94, 'lambang', 4, 1, '2024-03-18 07:35:12'),
(96, 'dia', 5, 1, '2024-03-26 18:47:56'),
(97, 'dia', 4, 1, '2024-03-26 18:47:56'),
(98, 'dia', 13, 1, '2024-03-26 18:47:56'),
(99, 'dia', 5, 1, '2024-03-26 18:47:56'),
(100, 'dia', 4, 1, '2024-03-26 18:47:56'),
(101, 'dia', 13, 1, '2024-03-26 18:47:56'),
(103, 'lambang', 11, 1, '2024-03-26 20:24:39'),
(104, 'budi', 13, 1, '2024-04-22 00:12:31'),
(105, 'budi', 5, 1, '2024-04-22 04:53:54'),
(106, 'budi', 1, 1, '2024-04-22 05:21:34'),
(107, 'budi', 7, 2, '2024-04-22 06:18:17'),
(108, 'budi', 13, 2, '2024-04-22 06:20:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nohp` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `alamat`, `nohp`, `password`) VALUES
(3, 'lambang', 'serayu', 2190, '$2y$10$VW.2nJhCqMdRaj5ZK6tFi.lzp/OYZRwSXK5XZYty9yQiiuXyPbQ82'),
(4, 'budi', 'caur', 1234, '$2y$10$BaRkvli/.VSPbReKOKaGI.el.3CD/p0CuoMOayLZ2USdcEXcZq2JO'),
(5, 'dia', 'disini', 123, '$2y$10$rLQwLLaqT48Gp97CZIGTJOZjXrHGdHtlEh5IYktwhWnv3DGm1dZnm'),
(6, 'akbar69', 'akhirat', 86969, '$2y$10$rns465BqCYSKWU02G4RAB./wTvjhM00gUvAAnkmLmflB7Tt0NUXGu'),
(7, 'mbuhlah\r\n', 'comal', 8899, '$2y$10$ZA90t5rbfIQaLeCMPfY6xeU/DNTSWH5WENsEskEIBnO3pCtiWTGW2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
