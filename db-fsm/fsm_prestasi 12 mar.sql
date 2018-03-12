-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 07:33 AM
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
  `semester` varchar(20) NOT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode_prestasi`
--

INSERT INTO `periode_prestasi` (`id`, `id_prestasi`, `semester`, `periode`) VALUES
(10, 52, 'Genap', '2017/2018');

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
  `nomor_hp` varchar(15) NOT NULL DEFAULT '0',
  `foto` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `namalengkap`, `jurusan`, `nim`, `email`, `password`, `alamat`, `tingkatan`, `nomor_hp`, `foto`, `date_created`) VALUES
(1, 'sadasd', '3', '29291919191919', 'asdasdsa@sad.com', 'coba', '', '0', '0', NULL, '2018-01-31 00:00:00'),
(2, 'sadasd', '1', '29291919191919', 'asdasdsa@sad.com', 'coba', '', '0', '0', NULL, '2018-01-31 00:00:00'),
(5, 'Dinar Yuliani', '1', '24010314130109', 'dinar@yuliani.com', 'c3ec0f7b054e729c5a716c8125839829', '', '0', '0', NULL, '2018-01-31 11:28:15'),
(6, 'Asdasd', '3', '12121212121212', 'dfdsffd@sdas.com', '1621a5dc746d5d19665ed742b2ef9736', 'Sebelah Sana', '2016', '08271281821', NULL, '2018-01-31 11:31:48'),
(7, 'Amriza Putra', '3', '29312930123912', 'amriza.wibowo@yahoo.com', 'c3ec0f7b054e729c5a716c8125839829', '', '0', '0', NULL, '2018-01-31 11:37:10'),
(8, 'Fabian Bajili', '1', '24010314130101', 'fabian@mail.com', 'c3ec0f7b054e729c5a716c8125839829', '', '0', '0', NULL, '2018-01-31 17:41:58'),
(9, 'Amajona Adorada', '5', '24010314130129', 'amajona@sa.com', 'c3ec0f7b054e729c5a716c8125839829', '', '0', '0', NULL, '2018-01-31 17:44:18'),
(10, 'Asdlsajaskd Saasd', '2', '12454456535656', 'ajsjas@saksa.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-01-31 18:42:49'),
(11, 'Asdasd', '1', '24010888888888', 'ads@csa.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-01-31 19:19:55'),
(12, 'Statistika', '5', '24010214130107', 'stat@stat.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-01-31 19:31:25'),
(13, 'Fisika', '4', '24040123456789', 'fis@fis.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-01-31 19:32:34'),
(14, 'Amriza Putra', '6', '24060888888888', 'amriza@amri.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-01-31 19:35:06'),
(15, 'Dinar Yuliani', '6', '24010314130107', 'dinaryul@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', 'Pudak Payung', '2016', '0854654321654', 'johan_fd_9982_kcl12.jpg', '2018-02-01 11:12:57'),
(16, 'Utin', '6', '24010314130111', 'utin@utin.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-02-03 18:08:05'),
(17, 'Akun A', '6', '24010314130222', 'akun@akun.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-02-03 18:19:09'),
(18, 'Akun B', '6', '24010314130333', 'akun1@akun.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-02-03 18:20:08'),
(19, 'Akun C', '6', '24010314130155', 'akunc@akun.com', '7e6750a177bdb38d67980de28a884681', '', '0', '0', NULL, '2018-02-03 18:39:36'),
(20, 'Cinta', '6', '24010314130108', 'll@gmail.com', 'c3653e4408832e6611f37dcd90544de8', '', '0', '0', NULL, '2018-02-06 12:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_prestasi`
--

CREATE TABLE `user_prestasi` (
  `id_prestasi` int(5) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `referral_nim` varchar(300) DEFAULT NULL,
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

INSERT INTO `user_prestasi` (`id_prestasi`, `nim`, `referral_nim`, `nama_prestasi`, `peringkat_prestasi`, `tipe_prestasi`, `jenis_prestasi`, `level_prestasi`, `deskripsi_prestasi`, `reward_poin`, `penyelenggara_prestasi`, `tempat_prestasi`, `tgl_prestasi_start`, `tgl_prestasi_end`, `validasi`, `date_modified`) VALUES
(1, '24010314130107', NULL, 'dsfds', 'asdas', 1, 2, '3', 'asd', 0, '', '', '2018-02-07', '0000-00-00', 0, '2018-02-05 12:33:01'),
(5, '24010314130107', NULL, 'asdasdfasf', 'asdsa', 2, 1, '4', 'asdasdas', 0, '', '', '2018-02-07', '2018-02-02', 0, '2018-02-05 20:54:54'),
(6, '24010314130107', NULL, 'edit1', 'edit1', 2, 1, '4', 'edit1', 0, '', '', '2018-02-08', '2018-02-12', 0, '2018-02-05 20:56:41'),
(7, '24010314130107', NULL, 'etdr', 'dsrsdr', 1, 2, '3', 'srsrsr', 0, '', '', '2018-02-21', '2018-02-11', 0, '2018-02-06 12:08:12'),
(8, '24010314130107', NULL, 'Coba edit tempat nama penyelenggara', 'jyuara satuuu', 1, 2, '3', 'asfasfasdf', 0, 'Super soccer', 'sebelah sana', '2018-02-14', '2018-02-15', 0, '2018-02-19 01:08:24'),
(9, '24040123456789', NULL, 'asdasd', 'asdasd', 1, 1, '3', '', 0, 'aszdasd', 'asfasf', '2018-02-15', '2018-02-16', 0, '2018-02-25 00:52:46'),
(10, '24010314130107', '24010888888888, 24010314130222,', 'coba nim referral', 'juara 1', 2, 2, '3', 'asdasdasd', 0, 'referral corp', 'asdad', '2018-03-22', '2018-03-17', 0, '2018-03-07 12:21:27'),
(11, '24010314130107', '24010314130109,', 'referral lagi', 'asdasddfgasf', 2, 2, '2', 'asdasfasf', 0, 'asdasfg', 'asdasdasd', '2018-03-23', '2018-03-29', 0, '2018-03-07 12:25:49'),
(12, '24010314130107', '29312930123912, 12121212121212,', 'cek submit', 'asdasf', 2, 2, '3', 'asfdasfasdasd', 0, 'asdasfasf', 'asasfasf', '2018-03-17', '2018-03-23', 0, '2018-03-07 12:27:41'),
(13, '24010314130107', '29312930123912,', 'redirect error', 'asdsaf', 2, 2, '3', 'asdasdasd', 0, 'asdasd', 'asdasd', '2018-03-22', '2018-03-23', 0, '2018-03-07 12:29:18'),
(14, '24010314130107', '29291919191919, 12454456535656, 12454456535656,', 'coba nim referral', 'asdasddfgasf', 2, 2, '3', 'asdasdasdasd', 0, 'asdasfg', 'asdasd', '2018-03-30', '2018-03-23', 0, '2018-03-07 21:54:50'),
(15, '24010314130107', '12454456535656, 12454456535656, 24010314130129, 24010314130129,', 'asdasd', 'asdas', 2, 2, '3', 'asdasdasd', 0, 'asdasfg', 'asdasd', '2018-03-16', '2018-03-23', 0, '2018-03-07 22:00:15'),
(16, '29291919191919', '24010314130107', 'alala', 'juara 1', 2, 2, '1', 'asdasfasfasf', 0, 'asdasd', 'asfasfasf', '2018-03-24', '2018-03-17', 0, '2018-03-08 00:13:27'),
(17, ' 2931293012391', '24010314130107', 'alala', 'juara 1', 2, 2, '1', 'asdasfasfasf', 0, 'asdasd', 'asfasfasf', '2018-03-24', '2018-03-17', 0, '2018-03-08 00:13:27'),
(18, '24010314130107', '29291919191919, 29312930123912, 24010888888888,', 'alala', 'juara 1', 2, 2, '1', 'asdasfasfasf', 0, 'asdasd', 'asfasfasf', '2018-03-24', '2018-03-17', 0, '2018-03-08 00:13:27'),
(19, ' 2401088888888', '24010314130107', 'alala', 'juara 1', 2, 2, '1', 'asdasfasfasf', 0, 'asdasd', 'asfasfasf', '2018-03-24', '2018-03-17', 0, '2018-03-08 00:13:27'),
(20, '24010314130107', '24010314130129, 29312930123912, 24010314130129, 12121212121212,', 'coba nim sama 1', 'juara 3', 2, 1, '2', 'asfasfas asfasfas asdrasdasd', 0, 'asdffasfasfdsaf', 'semarang', '2018-03-23', '2018-03-27', 0, '2018-03-08 00:37:12'),
(21, '29291919191919', '24010314130107', 'coba nim sama 2', 'juara 2', 2, 2, '1', 'asgfasf asdasdsa', 0, 'asdasfasf', 'asdasd', '2018-03-23', '2018-03-21', 0, '2018-03-08 00:53:13'),
(22, ' 2931293012391', '24010314130107', 'coba nim sama 2', 'juara 2', 2, 2, '1', 'asgfasf asdasdsa', 0, 'asdasfasf', 'asdasd', '2018-03-23', '2018-03-21', 0, '2018-03-08 00:53:13'),
(23, ' 1245445653565', '24010314130107', 'coba nim sama 2', 'juara 2', 2, 2, '1', 'asgfasf asdasdsa', 0, 'asdasfasf', 'asdasd', '2018-03-23', '2018-03-21', 0, '2018-03-08 00:53:14'),
(24, '24010314130107', '29291919191919, 29312930123912, 12454456535656, 12454456535656, 12454456535656,', 'coba nim sama 2', 'juara 2', 2, 2, '1', 'asgfasf asdasdsa', 0, 'asdasfasf', 'asdasd', '2018-03-23', '2018-03-21', 0, '2018-03-08 00:53:14'),
(26, ' 2931293012391', '24010314130107', 'coba nim salah', 'asdasd', 2, 2, '2', 'asdasdasd', 0, 'asdasd', 'asdasdasd', '2018-03-24', '2018-03-23', 0, '2018-03-08 01:42:46'),
(27, '29291919191919', '24010314130107', 'coba nim salah', 'asdasd', 2, 2, '2', 'asdasdasd', 0, 'asdasd', 'asdasdasd', '2018-03-24', '2018-03-23', 0, '2018-03-08 01:42:46'),
(28, '24010314130107', '29291919191919, 1, 24010314130109, 2, 29312930123912,', 'coba nim salah', 'asdasd', 2, 2, '2', 'asdasdasd', 0, 'asdasd', 'asdasdasd', '2018-03-24', '2018-03-23', 0, '2018-03-08 01:42:47'),
(29, ' 2931293012391', '24010314130107', 'coba nim salah 2', 'agadgsad', 2, 1, '2', 'sdfsdgsdgsdg', 0, 'sdsgasdfg', 'sdgsdg', '2018-03-16', '2018-03-22', 0, '2018-03-08 01:48:54'),
(30, '29291919191919', '24010314130107', 'coba nim salah 2', 'agadgsad', 2, 1, '2', 'sdfsdgsdgsdg', 0, 'sdsgasdfg', 'sdgsdg', '2018-03-16', '2018-03-22', 0, '2018-03-08 01:48:54'),
(32, '24010314130107', '29291919191919, 1, 24010314130109, 2, 29312930123912,', 'coba nim salah 2', 'agadgsad', 2, 1, '2', 'sdfsdgsdgsdg', 0, 'sdsgasdfg', 'sdgsdg', '2018-03-16', '2018-03-22', 0, '2018-03-08 01:48:55'),
(33, '29291919191919', '24010314130107', 'coba nim salah 3', 'asdasf', 2, 2, '4', 'dfhdfhdfhdfzasd sdhfsadgadgadsg', 0, 'agdadgdas', 'fdhdfhdfh', '2018-03-30', '2018-03-31', 0, '2018-03-08 01:53:46'),
(34, '24010314130107', '29291919191919, 1, 24010314130109, 2, 29312930123912,', 'coba nim salah 3', 'asdasf', 2, 2, '4', 'dfhdfhdfhdfzasd sdhfsadgadgadsg', 0, 'agdadgdas', 'fdhdfhdfh', '2018-03-30', '2018-03-31', 0, '2018-03-08 01:53:46'),
(35, '24010314130109', '24010314130107', 'coba nim salah 4', 'asfasfasd', 2, 2, '3', 'gadshdad dwgadsga ', 0, 'asfgasfdsaf', 'asfasfasfasf', '2018-03-16', '2018-03-13', 0, '2018-03-08 02:07:58'),
(36, '29291919191919', '24010314130107', 'coba nim salah 4', 'asfasfasd', 2, 2, '3', 'gadshdad dwgadsga ', 0, 'asfgasfdsaf', 'asfasfasfasf', '2018-03-16', '2018-03-13', 0, '2018-03-08 02:07:58'),
(37, '29312930123912', '24010314130107', 'coba nim salah 4', 'asfasfasd', 2, 2, '3', 'gadshdad dwgadsga ', 0, 'asfgasfdsaf', 'asfasfasfasf', '2018-03-16', '2018-03-13', 0, '2018-03-08 02:07:58'),
(38, '24010314130107', '1, 29291919191919, 1, 24010314130109, 2, 29312930123912,', 'coba nim salah 4', 'asfasfasd', 2, 2, '3', 'gadshdad dwgadsga ', 0, 'asfgasfdsaf', 'asfasfasfasf', '2018-03-16', '2018-03-13', 0, '2018-03-08 02:07:58'),
(39, '24010314130107', '', 'coba periode', 'jaura 1', 1, 1, '1', 'coba periode', 0, 'periode coba', 'semarang', '2018-03-07', '2018-03-22', 0, '2018-03-10 16:47:07'),
(40, '24010314130107', '', 'coba periode', 'jwara 1', 1, 1, '2', 'asdasdsad asdasd', 0, 'periode coba', 'sebelah sana', '2018-03-06', '2018-03-22', 0, '2018-03-10 16:51:08'),
(43, '24010314130107', '', 'asdfasd', 'asfasfdg', 1, 2, '1', 'sdgsdgsdg', 0, 'sdgsdg', 'sdgsdg', '2018-03-14', '2018-03-21', 0, '2018-03-10 17:22:28'),
(44, '24010314130107', '', 'asdfasd', 'asfasfdg', 1, 2, '1', 'sdgsdgsdg', 0, 'sdgsdg', 'sdgsdg', '2018-03-14', '2018-03-21', 0, '2018-03-10 17:22:55'),
(45, '24010314130107', '', 'asdfasd', 'asfasfdg', 1, 2, '1', 'sdgsdgsdg', 0, 'sdgsdg', 'sdgsdg', '2018-03-14', '2018-03-21', 0, '2018-03-10 17:32:45'),
(46, '24010314130107', '', 'asfasfasf', 'asfasfasf', 1, 2, '1', 'sdgsdgsdg', 0, 'sdgsdgsdg', 'sdgsdgsd', '2018-03-15', '2018-03-26', 0, '2018-03-10 17:33:40'),
(52, '24010314130107', '', 'coba periode', 'asdasf', 1, 2, '3', 'sdgasdads', 0, 'asfasfasd', 'sdgsdg', '2018-03-22', '2018-03-27', 0, '2018-03-10 17:48:05');

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
-- Indexes for table `setting_admin`
--
ALTER TABLE `setting_admin`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `setting_admin`
--
ALTER TABLE `setting_admin`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_prestasi`
--
ALTER TABLE `user_prestasi`
  MODIFY `id_prestasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
