-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 07:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoagni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `harga_jual`, `harga_beli`, `satuan`, `kategori`, `stock`, `gambar`) VALUES
('AG001', 'Gelang Berds Bracelet Red Deis', 15000, 10000, 'Pcs', 'Gelang', 100, 'AG001.jpg'),
('AG002', 'Phone Strap Gantungan Hp Kpop ', 10000, 7000, 'Pcs', 'Gantungan Hp', 1000, 'AG002.jpg'),
('AG003', 'Stiker Foodie', 5000, 3000, 'Pcs', 'stiker', 1000, 'AG003.jpg'),
('AG004', 'Stiker Smile Garden', 5000, 3000, 'Pcs', 'stiker', 1000, 'AG004.jpg'),
('AG005', 'Cincin Beards Cherry Set Lucu', 5000, 3500, '3Pcs', 'Cincin', 1000, 'AG005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `no_order` int(11) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama_pembeli` varchar(50) NOT NULL,
  `nomor_whatsapp` varchar(14) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `cara_bayar` varchar(200) DEFAULT NULL,
  `cara_kirim` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`no_order`, `tgl_order`, `nama_pembeli`, `nomor_whatsapp`, `kode_barang`, `jumlah_pesanan`, `cara_bayar`, `cara_kirim`) VALUES
(1, '2024-06-18 16:35:08', 'agni halimah ', '082331303003', 'AG005', 1, NULL, NULL),
(2, '2024-06-18 16:41:46', 'Aulia Barokah Ramadhani', '082331303003', 'AG005', 1, NULL, NULL),
(3, '2024-06-18 17:07:18', 'mamah halimah', '0831222333030', 'AG005', 2, NULL, NULL),
(4, '2024-06-18 17:07:30', 'mamah halimah', '0831222333030', 'AG005', 2, NULL, NULL),
(5, '2024-06-23 03:34:50', 'Aulia Barokah Ramadhani', '0831222333030', 'AG003', 4, NULL, NULL),
(6, '2024-06-23 04:21:59', 'Gina Aninas Maryam', '082317023212', 'AG001', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`no_order`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `no_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
