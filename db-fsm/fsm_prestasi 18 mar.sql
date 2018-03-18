-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 06:54 AM
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
(24, 86, 'Genap', 2018),
(25, 87, 'Genap', 2018);

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
(17, '24010314130107', 85, 5),
(18, '24010314130112', 85, 0),
(19, '24010314130012', 85, 0),
(20, '24010314130009', 85, 0),
(21, '24010314130107', 86, 3),
(22, '24010314130107', 87, 0);

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
(16, 4, 'Internasional', 'Juara 3', 15);

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
(21, 'Johan Eko Purnomo', '6', '24010314130107', 'johanrahar@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', 'Semarang', '2014', '085726318024', 'johan_fd_9982_kcl13.jpg', '', '2018-03-13 11:10:59');

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
  `peringkat_prestasi` varchar(100) NOT NULL,
  `tipe_prestasi` int(2) NOT NULL,
  `jenis_prestasi` int(2) NOT NULL,
  `level_prestasi` varchar(2) NOT NULL,
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

INSERT INTO `user_prestasi` (`id_prestasi`, `nim`, `referral_nim`, `jml_anggota`, `nama_prestasi`, `peringkat_prestasi`, `tipe_prestasi`, `jenis_prestasi`, `level_prestasi`, `deskripsi_prestasi`, `reward_poin`, `penyelenggara_prestasi`, `tempat_prestasi`, `tgl_prestasi_start`, `tgl_prestasi_end`, `validasi`, `date_modified`) VALUES
(79, '24010314130107', '24010314130108, 24010314130109, 24010314130110', 4, 'Coba sistem baru', 'Juara 1', 2, 1, '3', 'cek tabel reward', 0, 'Dikti', 'Semarang', '2018-03-14', '2018-03-14', 0, '2018-03-13 17:01:31'),
(80, '24010314130107', '24010314130108, 24010314130109, 24010314130110', 4, 'coba beregu 2', 'Juara 1', 2, 1, '2', 'dfhsjsgj', 0, 'sdfsdf', 'dfhdfh', '2018-03-22', '2018-03-28', 0, '2018-03-13 17:49:27'),
(82, '24010314130107', '', 1, 'coba individu 2', 'Juara 1', 1, 1, '1', 'sdgsdgsdg', 0, 'asfadsf', 'sdgsdg', '2018-03-22', '2018-03-22', 0, '2018-03-13 18:32:15'),
(83, '24010314130107', '', 1, 'Coba indvidu 3', 'asdfdasf', 1, 1, '1', 'sdgsdf', 0, 'sdgsdg', 'sfdgsd', '2018-03-14', '0000-00-00', 0, '2018-03-13 18:34:37'),
(84, '24010314130107', '24010314130009, 24010314130112, 24010314130012', 4, 'Coba beregu lagi', 'juara 1', 2, 1, '2', 'fsdgfdgs', 0, 'asfasdf', 'dsgdsg', '2018-03-22', '0000-00-00', 0, '2018-03-13 18:37:52'),
(85, '24010314130107', '24010314130009, 24010314130112, 24010314130012', 4, 'dsgsdg', 'asdasd', 2, 2, '2', 'sdfhgsda', 0, 'sfdgsdg', 'sdfdsf', '2018-03-20', '0000-00-00', 1, '2018-03-13 18:38:50'),
(86, '24010314130107', '', 1, 'Coba reward otomatis', 'Juara 1', 1, 1, '3', 'asdfgadgsdg', 15, 'Dikti', 'Semarang', '2018-03-22', '0000-00-00', 0, '2018-03-14 11:57:46'),
(87, '24010314130107', '', 1, 'Coba selection baru', 'Juara 2', 1, 1, '2', 'sdgasasd', 7, 'asfasdgf', 'sdgsdgdsg', '2018-03-22', '2018-03-16', 0, '2018-03-14 12:57:19');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `reward_prestasi`
--
ALTER TABLE `reward_prestasi`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `setting_admin`
--
ALTER TABLE `setting_admin`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting_rewarding`
--
ALTER TABLE `setting_rewarding`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_prestasi`
--
ALTER TABLE `user_prestasi`
  MODIFY `id_prestasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
