-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Jun 19, 2021 at 08:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(25) NOT NULL,
  `QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `QTY`) VALUES
(1, 6, '2021-04-21 05:37:46', 'penjait', 4),
(2, 7, '2021-04-21 05:44:30', 'PENJAIT', 5),
(3, 5, '2021-04-21 06:31:35', 'penjait', 5),
(4, 9, '2021-04-24 04:19:42', 'penjait', 100),
(5, 5, '2021-04-24 04:33:58', 'PENJAIT', 5),
(6, 7, '2021-04-24 04:58:22', 'PENJAIT', 5),
(7, 6, '2021-06-19 01:08:56', '', 10),
(8, 7, '2021-06-19 01:21:12', 'penjaitway@gmail.com', 10),
(9, 6, '2021-06-19 01:51:31', 'penjaitway@gmail.com', 10),
(10, 6, '2021-06-19 01:55:36', 'penjaitway@gmail.com', 10),
(11, 6, '2021-06-19 01:56:46', 'penjaitway@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`, `level`) VALUES
(1, 'waysport@gmail.com', '112233', 'ADMIN'),
(2, 'penjaitway@gmail.com', '11223344', 'PENJAIT');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(255) NOT NULL,
  `QTY` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `status` varchar(120) NOT NULL,
  `approveddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `QTY`, `iduser`, `status`, `approveddate`) VALUES
(4, 6, '2021-04-21 05:20:44', 'ok approved                             ', 10, 2, 'Approved', '2021-06-19 08:56:46'),
(5, 5, '2021-04-21 05:42:40', 'tidak sesuai                                                            ', 14, 2, 'Rejected', '2021-06-19 08:56:58'),
(6, 7, '2021-04-21 05:44:02', '', 4, 2, 'Diproses', '2021-06-19 08:21:12'),
(7, 7, '2021-04-21 07:27:29', '', 10, 2, 'Diproses', '2021-06-19 08:21:12'),
(8, 5, '2021-04-24 04:19:11', '', 50, 2, 'Diproses', NULL),
(9, 5, '2021-04-24 04:58:52', '', 10, 2, 'Diproses', '2021-06-19 08:20:14'),
(11, 5, '2021-06-19 05:08:43', '', 2, 2, 'Diproses', '2021-06-19 08:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`) VALUES
(5, 'KAIN JERSEY', ' WARNA HIJAU', 48),
(6, 'TINTA', ' WARNA BIRU', 10),
(7, 'STIKER SABLON', 'HITAM', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
