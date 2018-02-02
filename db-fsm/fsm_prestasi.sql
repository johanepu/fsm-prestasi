-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 05:28 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `jurusan` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `namalengkap`, `jurusan`, `nim`, `email`, `password`, `date_created`) VALUES
(1, 'sadasd', '3', '29291919191919', 'asdasdsa@sad.com', 'coba', '2018-01-31 00:00:00'),
(2, 'sadasd', '1', '29291919191919', 'asdasdsa@sad.com', 'coba', '2018-01-31 00:00:00'),
(5, 'Dinar Yuliani', '1', '24010314130109', 'dinar@yuliani.com', 'c3ec0f7b054e729c5a716c8125839829', '2018-01-31 11:28:15'),
(6, 'Asdasd', '3', '12121212121212', 'dfdsffd@sdas.com', '1621a5dc746d5d19665ed742b2ef9736', '2018-01-31 11:31:48'),
(7, 'Amriza Putra', '3', '29312930123912', 'amriza.wibowo@yahoo.com', 'c3ec0f7b054e729c5a716c8125839829', '2018-01-31 11:37:10'),
(8, 'Fabian Bajili', '1', '24010314130101', 'fabian@mail.com', 'c3ec0f7b054e729c5a716c8125839829', '2018-01-31 17:41:58'),
(9, 'Amajona Adorada', '5', '24010314130129', 'amajona@sa.com', 'c3ec0f7b054e729c5a716c8125839829', '2018-01-31 17:44:18'),
(10, 'Asdlsajaskd Saasd', '2', '12454456535656', 'ajsjas@saksa.com', '7e6750a177bdb38d67980de28a884681', '2018-01-31 18:42:49'),
(11, 'Asdasd', '1', '24010888888888', 'ads@csa.com', '7e6750a177bdb38d67980de28a884681', '2018-01-31 19:19:55'),
(12, 'Statistika', '5', '24010214130107', 'stat@stat.com', '7e6750a177bdb38d67980de28a884681', '2018-01-31 19:31:25'),
(13, 'Fisika', '4', '24040123456789', 'fis@fis.com', '7e6750a177bdb38d67980de28a884681', '2018-01-31 19:32:34'),
(14, 'Amriza Putra', '6', '24060888888888', 'amriza@amri.com', '7e6750a177bdb38d67980de28a884681', '2018-01-31 19:35:06'),
(15, 'Johan Eko Purnomo', '6', '24010314130107', 'johanrahar@gmail.com', 'e5378e038bbd4c32dfdc08b2fde8225b', '2018-02-01 11:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_prestasi`
--

CREATE TABLE `user_prestasi` (
  `id_prestasi` int(5) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama_prestasi` varchar(150) NOT NULL,
  `peringkat_prestasi` varchar(100) NOT NULL,
  `level_prestasi` varchar(50) NOT NULL,
  `reward_poin` int(3) NOT NULL,
  `tgl_prestasi` date NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_prestasi`
--
ALTER TABLE `user_prestasi`
  MODIFY `id_prestasi` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
