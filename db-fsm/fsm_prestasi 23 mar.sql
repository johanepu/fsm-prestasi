-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 06:28 PM
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
(17, 79, 'Genap', 2018),
(18, 80, 'Genap', 2018),
(19, 81, 'Genap', 2018),
(20, 82, 'Genap', 2018),
(21, 83, 'Genap', 2018),
(22, 84, 'Genap', 2018),
(23, 85, 'Genap', 2018),
(34, 97, 'Genap', 2018),
(36, 99, 'Genap', 2018),
(40, 103, 'Genap', 2018),
(41, 104, 'Genap', 2018),
(42, 105, 'Genap', 2018),
(43, 106, 'Genap', 2018),
(44, 107, 'Genap', 2018),
(45, 108, 'Genap', 2018),
(46, 109, 'Genap', 2018),
(47, 110, 'Genap', 2018),
(48, 111, 'Genap', 2018),
(49, 112, 'Genap', 2018),
(50, 113, 'Genap', 2018),
(51, 114, 'Genap', 2018),
(52, 115, 'Genap', 2018),
(53, 116, 'Genap', 2018),
(54, 117, 'Genap', 2018),
(55, 118, 'Genap', 2018),
(56, 119, 'Genap', 2018),
(57, 120, 'Genap', 2018),
(58, 121, 'Genap', 2018),
(59, 122, 'Genap', 2018),
(60, 123, 'Genap', 2018),
(61, 124, 'Genap', 2018),
(62, 125, 'Genap', 2018),
(63, 126, 'Genap', 2018),
(64, 127, 'Genap', 2018);

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
(75, '24010314130101', 97, 0),
(76, '24010314130107', 97, 0),
(162, '24010314130001', 99, 0),
(163, '24010314130201', 99, 0),
(164, '24010314130107', 99, 0),
(224, '24010314130102', 121, 0),
(225, '24010314130103', 121, 0),
(226, '24010314130104', 121, 0),
(227, '24010314130101', 121, 0),
(228, '24010314130107', 121, 0),
(230, '24010314130107', 123, 0),
(232, '24010314130107', 125, 0),
(233, '24010314130102', 126, 0),
(234, '24010314130103', 126, 0),
(235, '24010314130104', 126, 0),
(236, '24010314130101', 126, 0),
(237, '24010314130107', 126, 0),
(238, '24010314130102', 127, 0),
(239, '24010314130101', 127, 0),
(240, '24010314130107', 127, 0),
(251, '24010314130104', 120, 0),
(252, '24010314130101', 120, 0),
(253, '24010314130102', 120, 0),
(254, '24010314130103', 120, 0),
(255, '24010314130107', 120, 0);

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
  `nomor_hp` varchar(15) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `namalengkap`, `jurusan`, `nim`, `email`, `password`, `alamat`, `tingkatan`, `nomor_hp`, `foto`, `keterangan`, `date_created`) VALUES
(21, 'Johan Eko Purnomo', '6', '24010314130107', 'johanrahar@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', 'Semarang', '2014', '085726318024', 'awas4.jpg', 'Penerima Beswan Jagung', '2018-03-13 11:10:59');

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
(97, '24010314130107', ' 24010314130101', 2, 'Lomba Panjat Pinang', '1', 'Juara 3', 0, 2, 2, 'dgfhdfgdfg', 3, 'sdfsdf', 'fdhdfh', '2018-03-15', '2018-03-22', 0, '2018-03-21 00:16:06'),
(99, '24010314130107', '24010314130104, 24010314130201, 24010314130001', 4, 'Lomba Cerpen', '1', 'Juara 3', 0, 2, 1, 'Jaskdas lkasdjklkasd', 3, 'Adiputra', 'Semarang', '2018-03-22', '2018-03-23', 0, '2018-03-21 10:08:24'),
(120, '24010314130107', '24010314130101, 24010314130102, 24010314130103, 24010314130104', 5, 'gfdhdfg', '3', 'Juara 1', 9, 2, 1, 'fghfgh', 15, 'dfgfdh', 'gfjfgh', '2018-03-22', '2018-03-28', 0, '2018-03-22 15:17:23'),
(121, '24010314130107', '24010314130101, 24010314130102, 24010314130103, 24010314130104', 5, 'coba tanpa limit', '2', 'Juara 2', 0, 2, 1, 'sdfdsf', 7, 'asdfdsf', 'dsfgsdf', '2018-03-19', '2018-03-28', 0, '2018-03-21 14:53:37'),
(123, '24010314130107', '', 1, 'Coba Individu', '2', 'Juara 1', 0, 1, 1, 'sdfsdg', 8, 'dgfhfdg', 'dfgfdg', '2018-03-27', '2018-03-28', 0, '2018-03-21 15:03:53'),
(125, '24010314130107', '', 1, 'adsfdfg', '2', 'Juara 2', 0, 1, 1, 'dsfsdfgsdg', 7, 'sdfsdg', 'fdgdsf', '2018-03-19', '2018-03-27', 0, '2018-03-21 15:17:16'),
(126, '24010314130107', '24010314130101, 24010314130102, 24010314130103, 24010314130104', 5, 'dfgsdf', '2', 'Juara 2', 0, 2, 1, 'sdfdgdfg', 7, 'sdgdfg', 'sdfdfg', '2018-03-13', '2018-03-12', 0, '2018-03-21 15:52:30'),
(127, '24010314130107', '24010314130101, 24010314130102', 3, 'Coba id_setting', '4', 'Juara 1', 14, 2, 1, 'dsfdsg', 20, 'Dikti', 'Semarang', '2018-03-20', '2018-03-23', 0, '2018-03-22 15:11:05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `reward_prestasi`
--
ALTER TABLE `reward_prestasi`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_prestasi`
--
ALTER TABLE `user_prestasi`
  MODIFY `id_prestasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
