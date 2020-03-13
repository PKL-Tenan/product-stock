-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 03:58 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_small` int(11) NOT NULL,
  `jumlah_medium` int(11) NOT NULL,
  `jumlah_large` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `jumlah_small`, `jumlah_medium`, `jumlah_large`) VALUES
(1, 'BRG-001', 'Tim-Tam', 30, 30, 30),
(2, 'BRG-002', 'Oreo Strawberry', 8999989, 2000, 1234),
(3, 'BRG-003', 'Mild', 11, 10, 10),
(4, 'BRG-004', 'Surya', 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `kode_pemasukan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `kode_pemasukan`, `tanggal`) VALUES
(1, 'MSK-00001', '2020-02-23'),
(3, 'MSK-00002', '2020-03-04'),
(4, 'MSK-00003', '1970-01-01'),
(5, 'MSK-00004', '2020-03-12'),
(6, 'MSK-00005', '2021-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_detail`
--

CREATE TABLE `pemasukan_detail` (
  `id` int(11) NOT NULL,
  `id_pemasukan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `medium` int(11) NOT NULL,
  `large` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan_detail`
--

INSERT INTO `pemasukan_detail` (`id`, `id_pemasukan`, `id_barang`, `small`, `medium`, `large`) VALUES
(9, 1, 1, 7, 8, 4),
(10, 1, 4, 8, 6, 10),
(11, 1, 3, 3, 3, 3),
(12, 3, 2, 2, 2, 2),
(15, 4, 1, 199, 0, 0),
(16, 5, 2, 9000000, 0, 0),
(17, 6, 3, 123445, 0, 0);

--
-- Triggers `pemasukan_detail`
--
DELIMITER $$
CREATE TRIGGER `pemasukan-barang` AFTER INSERT ON `pemasukan_detail` FOR EACH ROW BEGIN

	UPDATE barang SET jumlah_small=jumlah_small+new.small, 
    jumlah_medium=jumlah_medium+new.medium,
    jumlah_large=jumlah_large+new.large
    WHERE id_barang=new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `kode_pengeluaran` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kode_pengeluaran`, `tanggal`) VALUES
(2, 'KLR-00001', '2020-02-27'),
(4, 'KLR-00002', '2020-03-03'),
(5, 'KLR-00003', '2020-11-12'),
(6, 'KLR-00004', '2017-04-09'),
(7, 'KLR-00005', '2020-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_detail`
--

CREATE TABLE `pengeluaran_detail` (
  `id` int(11) NOT NULL,
  `id_pengeluaran` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `medium` int(11) NOT NULL,
  `large` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran_detail`
--

INSERT INTO `pengeluaran_detail` (`id`, `id_pengeluaran`, `id_barang`, `small`, `medium`, `large`) VALUES
(10, 2, 1, 8, 8, 9),
(11, 2, 3, 7, 9, 7),
(12, 2, 2, 2, 2, 2),
(13, 4, 4, 4, 2, 4),
(14, 5, 2, 11, 0, 0),
(16, 6, 2, 5, 12, 35),
(17, 7, 3, 123444, 0, 0);

--
-- Triggers `pengeluaran_detail`
--
DELIMITER $$
CREATE TRIGGER `pengeluaran-barang` AFTER INSERT ON `pengeluaran_detail` FOR EACH ROW BEGIN

	UPDATE barang SET jumlah_small=jumlah_small-new.small,
    jumlah_medium=jumlah_medium-new.medium,
    jumlah_large=jumlah_large-new.large
    WHERE id_barang=new.id_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan_detail`
--
ALTER TABLE `pemasukan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran_detail`
--
ALTER TABLE `pengeluaran_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemasukan_detail`
--
ALTER TABLE `pemasukan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengeluaran_detail`
--
ALTER TABLE `pengeluaran_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
