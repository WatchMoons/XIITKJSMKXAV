-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 01:26 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tkj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_article`
--

CREATE TABLE `tb_article` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `article` mediumtext NOT NULL,
  `waktu_ pengunggahan` date NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_article`
--

INSERT INTO `tb_article` (`id`, `id_user`, `article`, `waktu_ pengunggahan`, `slug`) VALUES
(1, 6, '<p>&nbsp; &nbsp; &nbsp; &nbsp; hi saya jefli jonathan saya bersekolah di smk xaverius palembang. saya hobi yang saya sukai adalah coding web. saya sekarang 18 tahun</p>\r\n\r\n<p>.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2022-04-02', '/jefli-jonathan'),
(4, 7, '<p>perkenalkan nama saya<strong> <span class=\"marker\">bryan i gusti</span></strong></p>\r\n', '2022-12-06', '/bryan-i-gusti'),
(7, 12, '<p>oke</p>\r\n', '2022-12-14', '/jefli-admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`id`, `judul`, `gambar`, `tanggal_post`) VALUES
(1, 'bannersx', '1.jpeg', '21 agustus 2004'),
(3, 'banner', '2.jpeg', 'Tue, 13-12-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_keuangan`
--

CREATE TABLE `tb_data_keuangan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `total_uang` varchar(100) NOT NULL,
  `nomor_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `nama_maple` varchar(200) NOT NULL,
  `nama_guru` varchar(200) NOT NULL,
  `jamke` varchar(100) NOT NULL,
  `id_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `hari`, `nama_maple`, `nama_guru`, `jamke`, `id_time`) VALUES
(1, 'senin', 'bahasa indonesia', 'bu deasy', '7.00-8.00', 1),
(3, 'senin', 'bahasa indonesia', 'bu deasy', '8.00-10.00', 2),
(4, 'senin', 'bahasa indonesia', 'bu deasy', '10.00-11.45', 3),
(5, 'selasa', 'bahasa indonesia', 'bu deasy', '8.00-10.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_uang` int(11) NOT NULL,
  `id_slug` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu_pengumpulan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `soal` mediumtext NOT NULL,
  `a` mediumtext NOT NULL,
  `b` mediumtext NOT NULL,
  `c` mediumtext NOT NULL,
  `d` mediumtext NOT NULL,
  `e` mediumtext NOT NULL,
  `kunci` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `maple` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `tanggallahir` varchar(150) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `nomortelepon` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `waktu_pembuatan` date NOT NULL,
  `maple` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `namalengkap`, `email`, `password`, `gambar`, `jeniskelamin`, `tanggallahir`, `alamat`, `nomortelepon`, `level`, `waktu_pembuatan`, `maple`) VALUES
(6, 'jefli jonathan', 'jeflyjonathan1@gmail.com', '$2y$10$2GADlHXEHylUQ/RDWMBIz.eOfrfOSozbkjSRpLxT.I5Z1cKy3btn6', 'bg1.jpg', 'laki-laki', 'Palembang, 29 agustus 2004', 'mp mangku negara', 2147483647, 'admin', '2009-12-02', ''),
(7, 'bryan i gusti', 'bryan@gmail.com', '$2y$10$E6D3s8W8Fmr7uv4NXkHV2O7bd5d/y6.QGaNhjaEo2f9A9PeMXOTyO', 'bg1.jpg', 'laki-laki', '29 agustus 2005', 'edit sendiri bang', 676497369, 'murid', '2022-12-02', ''),
(8, 'admin', 'admin123@gmail.com', '$2y$10$PK/Z.CyOpMvpSrCPB28VRuhOdBZbDENWj9hz.MNyaWunl5Rtju/Rq', 'bg1.jpg', 'laki-laki', '29 agustus 2004', 'mp mangku negara', 2147483647, 'admin', '2022-12-08', 'Tidak_mengajar'),
(12, 'jefli admin', 'jefliadmin@gmail.com', '$2y$10$OW8MDPorFzHbGDssB0fiPOy1MLlFDryBX316t3ZQhJjEMdhC1KVFa', 'bg1.jpg', 'laki-laki', 'palembang, 29 agustus 2004', 'mp mangku negara', 2147483647, 'user', '2022-12-10', 'Tidak_mengajar'),
(17, 'coba', 'coba@gmail.com', '$2y$10$qJpOrlxIcU0LCakxgMZK.en37GxNd20jmLUvly3srspgnaRrTOa0u', 'bg1.jpg', 'laki-laki', '29 agustus 2004', 'mp mangku negara', 2147483647, 'user', '2022-12-14', 'Tidak_mengajar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_article`
--
ALTER TABLE `tb_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_keuangan`
--
ALTER TABLE `tb_data_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_article`
--
ALTER TABLE `tb_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_data_keuangan`
--
ALTER TABLE `tb_data_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
