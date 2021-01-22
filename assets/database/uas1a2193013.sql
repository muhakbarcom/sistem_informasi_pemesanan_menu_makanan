-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 04:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas1a2193013`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(2, 'Sapi'),
(3, 'Bebek'),
(4, 'Ayam'),
(5, 'Jus'),
(6, 'Martabak');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `kode_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `kategori_id`, `kode_menu`) VALUES
(1, 'Ayam Geprek', '10000', 4, 'B0001'),
(2, 'Ayam Penyet', '20000', 4, 'A0002'),
(3, 'Bebek Goreng', '25000', 3, 'B0001'),
(4, 'Sapi Bakar Kecap', '5000', 2, 'S0002'),
(5, 'Sapi Asap', '30000', 2, 'S0001');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(50) NOT NULL,
  `kode_menu` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tanggal_trx` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Sukses','Refund','','') NOT NULL DEFAULT 'Sukses',
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_menu`, `username`, `tanggal_trx`, `status`, `jumlah`) VALUES
(1, 'B0002', 'A0003', '2020-07-23 23:00:05', '', 0),
(2, 'B0002', 'A0001', '2020-07-23 23:13:51', '', 0),
(3, 'B0002', 'A0004', '2020-07-24 13:31:16', '', 0),
(4, 'B0002', 'A0002', '2020-07-24 13:32:31', '', 0),
(5, 'B0002', 'A0002', '2020-07-24 13:34:23', '', 0),
(6, 'B0002', 'admin', '2020-07-24 11:11:12', '', 0),
(7, 'B0002', 'budi', '2020-07-24 11:11:42', '', 0),
(8, '12321', 'budi', '2020-07-24 11:29:43', 'Sukses', 0),
(9, 'B0002', 'akbar', '2020-07-24 11:49:25', 'Sukses', 0),
(10, '1234', 'admin', '2020-07-24 11:49:57', 'Sukses', 0),
(11, 'B0001', 'budi', '2020-07-24 12:04:09', 'Sukses', 0),
(12, '1234', 'admin', '2020-07-24 13:36:21', 'Sukses', 2),
(13, '12321', 'admin', '2020-07-24 13:38:00', 'Sukses', 2),
(14, '12321', 'arya', '2020-07-24 13:39:01', 'Sukses', 3),
(15, '12321', 'arya', '2020-07-24 13:39:27', 'Sukses', 2),
(16, '12321', 'arya', '2020-07-24 13:39:55', 'Sukses', 2),
(17, '12321', 'pajar', '2020-07-24 13:42:28', 'Sukses', 30),
(18, 'B0002', 'arya', '2020-07-24 13:43:59', 'Sukses', 2),
(19, '1234', 'admin', '2020-07-24 13:44:28', 'Sukses', 2),
(20, '12321', 'admin', '2020-07-24 13:45:31', 'Sukses', 1),
(21, 'B0002', 'arya', '2020-07-24 13:48:04', 'Sukses', 2),
(22, '12321', 'admin', '2020-07-24 13:49:30', 'Sukses', 2),
(23, 'B0002', 'arya', '2020-07-24 13:49:47', 'Sukses', 2),
(24, '1234', 'arya', '2020-07-24 13:54:41', 'Sukses', 12),
(25, '12321', 'arya', '2020-07-24 13:55:00', 'Sukses', 2),
(26, '1234', 'arya', '2020-07-24 14:00:57', 'Sukses', 1),
(27, '1234', 'arya', '2020-07-24 14:01:12', 'Sukses', 2),
(28, '12321', 'admin', '2020-07-24 14:01:34', 'Sukses', 1),
(29, '12321', 'arya', '2020-07-24 14:04:48', 'Sukses', 2),
(30, '1234', 'arya', '2020-07-24 14:36:33', 'Sukses', 0),
(31, '1234', 'arya', '2020-07-24 14:36:41', 'Sukses', 3),
(32, '1234', 'admin', '2020-07-24 15:15:38', 'Sukses', 3),
(33, '1234', 'admin', '2020-07-24 15:19:41', 'Sukses', 2),
(34, '12321', 'admin', '2020-07-24 16:56:11', 'Sukses', 2),
(35, '1234', 'arya', '2020-07-24 17:07:23', 'Sukses', 2),
(36, '1234', 'akbar', '2020-07-24 17:07:52', 'Sukses', 2),
(37, '1234', 'arya', '2020-07-24 17:53:34', 'Sukses', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `hak_akses` enum('O','A','P') NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `hak_akses`) VALUES
(1, 'akbar', '123', 'Muhammad Akbar', 'P'),
(2, 'pajar', '123', 'Fajar Somantry', 'P'),
(5, 'arya', '123', 'Aryaputra W', 'P'),
(6, 'admin', '123', 'Administrator', 'A'),
(8, 'gre', '123', 'Grenius Sidabutar', 'P'),
(9, 'diva', '123', 'Diva Qintan', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
