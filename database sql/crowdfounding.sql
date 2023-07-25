-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2023 pada 18.54
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowdfounding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_program`
--

CREATE TABLE `tb_program` (
  `id_prg` int(11) NOT NULL,
  `nama_prg` varchar(120) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `kategori` varchar(69) DEFAULT NULL,
  `sumbangan` int(11) DEFAULT NULL,
  `jml_smbg` int(4) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_program`
--

INSERT INTO `tb_program` (`id_prg`, `nama_prg`, `keterangan`, `kategori`, `sumbangan`, `jml_smbg`, `gambar`) VALUES
(7, 'Pembangunan Masjid', 'Masjid Bitur Rahmat Akan di perbaiki ', 'Sumbangan Keagamaan', 500000000, 5000, 'download_(1).jpeg'),
(8, 'Bantuan Nenek', 'Nenek nenek kelaparan karena puasa', 'Sumbangan Kemanusiaan', 500000000, 5000, 'download_(2).jpeg'),
(9, 'Pembangunan Amikom', 'Amikom Bangun gedung baru', 'Sumbangan Pendidikan', 500000000, 0, 'download_(3).jpeg'),
(10, 'Adek Sakit', 'adek sakit gigi', 'Sumbangan Kesehatan', 500000000, 0, 'download_(4).jpeg'),
(11, 'Tanah Longsor', 'Tananh longsor membuat 20 orang kehilangan rumah', 'Sumbangan Bencana', 500000000, 0, 'download_(5).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_tran` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nominal` int(20) DEFAULT NULL,
  `mtd_bayar` varchar(16) DEFAULT NULL,
  `tgl_tran` datetime DEFAULT NULL,
  `id_prg` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_tran`, `nama`, `nominal`, `mtd_bayar`, `tgl_tran`, `id_prg`, `user_id`) VALUES
(1, 'andika', 5000, 'BRI - xxxxxx', '2023-07-16 15:14:28', 7, 3),
(2, 'abdul', 5000, 'BRI - xxxxxx', '2023-07-16 18:35:23', 8, 2);

--
-- Trigger `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_jml_smbg` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN
  UPDATE tb_program
  SET jml_smbg = jml_smbg + NEW.nominal
  WHERE id_prg = NEW.id_prg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '12', 1),
(2, 'abdul', 'abdul', '12', 2),
(3, 'andika', 'andika', '12', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_prg`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_tran`),
  ADD KEY `tb_transaksi_ibfk_1` (`id_prg`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id_prg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_prg`) REFERENCES `tb_program` (`id_prg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
