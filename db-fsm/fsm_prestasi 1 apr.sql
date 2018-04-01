-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 05:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fsm_prestasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `nama_admin`, `password`) VALUES
(1, 'admin.fsm', 'Admin Cantik', '44f5e67fb340e4ccb26da52bf8a3f000');

-- --------------------------------------------------------

--
-- Table structure for table `periode_prestasi`
--

CREATE TABLE `periode_prestasi` (
  `id` int(11) NOT NULL,
  `id_prestasi` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `periode` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode_prestasi`
--

INSERT INTO `periode_prestasi` (`id`, `id_prestasi`, `semester`, `periode`) VALUES
(84, 147, 'Genap', 2018),
(85, 148, 'Gasal', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `reward_prestasi`
--

CREATE TABLE `reward_prestasi` (
  `id_reward` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `id_prestasi` int(11) NOT NULL,
  `poin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward_prestasi`
--

INSERT INTO `reward_prestasi` (`id_reward`, `nim`, `id_prestasi`, `poin`) VALUES
(353, '24010014130112', 147, 0),
(356, '24010000000000', 148, 0),
(357, '24060000000000', 148, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting_admin`
--

CREATE TABLE `setting_admin` (
  `id_setting` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `judul_pengumuman` varchar(50) NOT NULL,
  `pesan_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_admin`
--

INSERT INTO `setting_admin` (`id_setting`, `periode`, `semester`, `judul_pengumuman`, `pesan_admin`) VALUES
(1, '2017/2018', 'Genap', 'Pengumuman Penting edit', 'Diharapkan untuk semua mahasiswa yang mengisi prestasi, untuk melengkapi data diri (profil) untuk menunjang validasi data prestasi edit');

-- --------------------------------------------------------

--
-- Table structure for table `setting_rewarding`
--

CREATE TABLE `setting_rewarding` (
  `id_setting` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `nama_level` text NOT NULL,
  `peringkat` varchar(20) NOT NULL,
  `poin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_rewarding`
--

INSERT INTO `setting_rewarding` (`id_setting`, `level`, `nama_level`, `peringkat`, `poin`) VALUES
(1, 1, 'Lokal', 'Juara 1', 5),
(2, 1, 'Lokal', 'Juara 2', 4),
(3, 1, 'Lokal', 'Juara 3', 3),
(4, 2, 'Regional', 'Juara 1', 8),
(5, 2, 'Regional', 'Juara 2', 7),
(8, 2, 'Regional', 'Juara 3', 6),
(9, 3, 'Nasional', 'Juara 1', 15),
(12, 3, 'Nasional', 'Juara 2', 12),
(13, 3, 'Nasional', 'Juara 3', 10),
(14, 4, 'Internasional', 'Juara 1', 20),
(15, 4, 'Internasional', 'Juara 2', 18),
(16, 4, 'Internasional', 'Juara 3', 15),
(17, 4, 'Internasional', 'Best Paper', 20),
(18, 3, 'Nasional', 'Best Paper', 15),
(19, 4, 'Internasional', 'Best Presenter', 16),
(20, 3, 'Nasional', 'Best Presenter', 14),
(24, 4, 'Internasional', 'Best Participant', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `jurusan` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text,
  `tingkatan` varchar(4) NOT NULL DEFAULT '0',
  `gender` varchar(10) DEFAULT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `namalengkap`, `jurusan`, `nim`, `email`, `password`, `alamat`, `tingkatan`, `gender`, `nomor_hp`, `foto`, `keterangan`, `date_created`) VALUES
(21, 'Johan Eko Purnomo', '6', '24010314130107', 'johanrahar@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', 'Semarang', '2014', NULL, '085726318024', 'awas4.jpg', 'Penerima Beswan Jagung', '2018-03-13 11:10:59'),
(22, 'Roy Kiyoshi', '6', '24010115613855', 'lalatbakar@yahoo.co', 'e511cf47b9647d62ef020fd7a15a62ac', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-27 18:26:11'),
(23, 'Cinta', '6', '24060000000000', 'lalatbakar@yahoo.com', 'e511cf47b9647d62ef020fd7a15a62ac', NULL, '0', NULL, NULL, '247504.jpg', NULL, '2018-03-27 18:28:18'),
(24, 'Amriza Putra', '6', '24010314130108', 'amriza.wibowo@yahoo.com', 'e5378e038bbd4c32dfdc08b2fde8225b', 'Dendronium 20', '2013', 'L', '0546545645', '62780.jpg', '', '2018-03-27 20:13:12'),
(25, 'Choco Mania', '1', '24010014130112', 'choc@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-28 14:50:35'),
(26, 'Coba Captcha', '6', '24010314130001', 'ads@csa.com', 'e5378e038bbd4c32dfdc08b2fde8225b', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-28 23:47:17'),
(27, 'Captcha Mania', '6', '24010314130101', 'captcha@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-28 23:55:27'),
(28, 'Captcha Satria', '6', '24010314130113', 'satria@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-29 00:00:00'),
(29, 'Captcha Power', '6', '24010314130114', 'power@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-29 00:14:03'),
(30, 'Captcha Alfamart', '6', '24010314130110', 'alfamart@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-29 00:52:43'),
(31, 'Coba Captcha Lagi', '6', '24010314130123', 'cooba@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-29 01:47:27'),
(32, 'Loliking', '6', '24060600000000', 'vvv@gmail.com', 'e511cf47b9647d62ef020fd7a15a62ac', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-29 11:59:37'),
(33, 'Kamu', '6', '26060606000000', 'mmm@gmail.com', 'e511cf47b9647d62ef020fd7a15a62ac', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-29 12:03:47'),
(34, 'Mmm', '1', '24010000000000', 'nnn@gmail.com', 'e511cf47b9647d62ef020fd7a15a62ac', NULL, '0', NULL, NULL, NULL, NULL, '2018-03-29 12:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_prestasi`
--

CREATE TABLE `user_prestasi` (
  `id_prestasi` int(5) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `referral_nim` varchar(300) DEFAULT NULL,
  `jml_anggota` int(11) NOT NULL DEFAULT '1',
  `nama_prestasi` varchar(150) NOT NULL,
  `level_prestasi` varchar(2) NOT NULL,
  `peringkat_prestasi` varchar(100) NOT NULL,
  `id_setting` int(3) NOT NULL,
  `tipe_prestasi` int(2) NOT NULL,
  `jenis_prestasi` int(2) NOT NULL,
  `deskripsi_prestasi` text NOT NULL,
  `reward_poin` int(3) NOT NULL,
  `penyelenggara_prestasi` varchar(80) NOT NULL,
  `tempat_prestasi` varchar(80) NOT NULL,
  `tgl_prestasi_start` date NOT NULL,
  `tgl_prestasi_end` date NOT NULL,
  `validasi` int(1) NOT NULL DEFAULT '0',
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_prestasi`
--

INSERT INTO `user_prestasi` (`id_prestasi`, `nim`, `referral_nim`, `jml_anggota`, `nama_prestasi`, `level_prestasi`, `peringkat_prestasi`, `id_setting`, `tipe_prestasi`, `jenis_prestasi`, `deskripsi_prestasi`, `reward_poin`, `penyelenggara_prestasi`, `tempat_prestasi`, `tgl_prestasi_start`, `tgl_prestasi_end`, `validasi`, `date_modified`) VALUES
(147, '24010014130112', '', 1, 'Coba chocomania', '2', 'Juara 1', 4, 1, 1, 'Nama pembimbing pak sutikno', 8, 'Dikti', 'Semarang', '2018-03-19', '2018-03-24', 0, '2018-03-28 15:34:56'),
(148, '24060000000000', '24010000000000', 2, 'bbb', '2', 'Juara 1', 4, 2, 1, 'nnn', 8, 'bb', 'bb', '2018-03-01', '2018-03-01', 0, '2018-03-29 12:07:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `periode_prestasi`
--
ALTER TABLE `periode_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_prestasi`
--
ALTER TABLE `reward_prestasi`
  ADD PRIMARY KEY (`id_reward`);

--
-- Indexes for table `setting_admin`
--
ALTER TABLE `setting_admin`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `setting_rewarding`
--
ALTER TABLE `setting_rewarding`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_prestasi`
--
ALTER TABLE `user_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `periode_prestasi`
--
ALTER TABLE `periode_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `reward_prestasi`
--
ALTER TABLE `reward_prestasi`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;
--
-- AUTO_INCREMENT for table `setting_admin`
--
ALTER TABLE `setting_admin`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting_rewarding`
--
ALTER TABLE `setting_rewarding`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_prestasi`
--
ALTER TABLE `user_prestasi`
  MODIFY `id_prestasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
