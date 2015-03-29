-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 05:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `autentikasi`
--

CREATE TABLE IF NOT EXISTS `autentikasi` (
  `id` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `hak_akses` tinyint(4) NOT NULL,
  `id_kasir` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autentikasi`
--

INSERT INTO `autentikasi` (`id`, `password`, `hak_akses`, `id_kasir`) VALUES
('admin', 'b93d83634de0b8143a418f91495b4fdb', 1, '0'),
('kasir1', '6f40f2e4cbe72eba275975620b68681b', 2, '1'),
('adminkedua', '82fa5b9b140f2af84ad4f2e6de5b3b88', 1, '0'),
('kasir2', 'cf3e3ce996534fd71269fa3f1e13693e', 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `ID_BARANG` decimal(5,0) NOT NULL,
  `ID_KATEGORI` decimal(5,0) DEFAULT NULL,
  `NAMA_BARANG` mediumtext,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `GAMBAR` mediumtext CHARACTER SET latin1 COLLATE latin1_bin,
  `DISKON` float DEFAULT '0',
  `KETERANGAN` text NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_KATEGORI`, `NAMA_BARANG`, `HARGA_BELI`, `HARGA_JUAL`, `STOK`, `GAMBAR`, `DISKON`, `KETERANGAN`, `STATUS`) VALUES
('1', '1', 'Shampoo Lifebuoy', 6000, 7000, 27, 'market/images/home/shampo1.jpg', 12, 'Bagi anda yang ingin berambut Hitam dan Lebat, pakailah shampoo ini..', 1),
('2', '1', 'Pembersih Wajah Biore', 10000, 11000, 40, 'market/images/home/biore.jpg', 0, 'Anda seorang Pria? Aktif dalam berkegiatan? Energik? Coba produk yang satu ini.', 1),
('3', '1', 'Deterjen Rinso dengan Pewangi Molto', 21000, 22000, 40, 'market/images/home/rinso.jpg', 0, 'Ingin baju Anda selembut sutra? Gunakan produk ini untuk mencucinya.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_barang`
--

CREATE TABLE IF NOT EXISTS `daftar_barang` (
  `ID_DAFTAR_BARANG` decimal(5,0) NOT NULL,
  `ID_BARANG` decimal(5,0) DEFAULT NULL,
  `ID_FAKTUR` decimal(5,0) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_barang`
--

INSERT INTO `daftar_barang` (`ID_DAFTAR_BARANG`, `ID_BARANG`, `ID_FAKTUR`, `JUMLAH`) VALUES
('1', '1', '1', 2),
('2', '2', '1', 2),
('3', '2', '3', 6),
('4', '3', '3', 7);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `ID_KASIR` decimal(5,0) NOT NULL,
  `NAMA_KASIR` mediumtext,
  `ALAMAT` mediumtext,
  `TELEPON` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`ID_KASIR`, `NAMA_KASIR`, `ALAMAT`, `TELEPON`) VALUES
('0', 'Pemilik', NULL, NULL),
('1', 'Agus', '', '0'),
('2', 'Salim', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `ID_KATEGORI` decimal(5,0) NOT NULL,
  `NAMA_KATEGORI` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
('1', 'alat mandi');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `ID_FAKTUR` decimal(5,0) NOT NULL,
  `ID_KASIR` decimal(5,0) DEFAULT NULL,
  `WAKTU` timestamp NULL DEFAULT NULL,
  `TOTAL_PEMBAYARAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`ID_FAKTUR`, `ID_KASIR`, `WAKTU`, `TOTAL_PEMBAYARAN`) VALUES
('1', '1', '2015-03-07 17:00:00', 36000),
('2', '0', '2015-03-08 09:17:56', 32000),
('3', '0', '2015-03-08 09:50:57', 220000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`ID_BARANG`), ADD KEY `FK_BARANG_RELATIONS_KATEGORI` (`ID_KATEGORI`);

--
-- Indexes for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
 ADD PRIMARY KEY (`ID_DAFTAR_BARANG`), ADD KEY `FK_DAFTAR_B_RELATIONS_PENJUALA` (`ID_FAKTUR`), ADD KEY `FK_DAFTAR_B_RELATIONS_BARANG` (`ID_BARANG`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
 ADD PRIMARY KEY (`ID_KASIR`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`ID_FAKTUR`), ADD KEY `FK_PENJUALA_RELATIONS_KASIR` (`ID_KASIR`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `FK_BARANG_RELATIONS_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
ADD CONSTRAINT `FK_DAFTAR_B_RELATIONS_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
ADD CONSTRAINT `FK_DAFTAR_B_RELATIONS_PENJUALA` FOREIGN KEY (`ID_FAKTUR`) REFERENCES `penjualan` (`ID_FAKTUR`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
ADD CONSTRAINT `FK_PENJUALA_RELATIONS_KASIR` FOREIGN KEY (`ID_KASIR`) REFERENCES `kasir` (`ID_KASIR`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
