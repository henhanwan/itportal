-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2019 at 05:02 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(16) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_status` varchar(2) NOT NULL,
  `asset` varchar(10) NOT NULL,
  `id_d2` varchar(2) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `id_cabang` varchar(2) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `id_divisi` varchar(2) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `id_kategori` varchar(2) NOT NULL,
  `no` varchar(2) NOT NULL,
  `kategori2` varchar(50) NOT NULL,
  `id_kategori2` varchar(2) NOT NULL,
  `running_number` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `status`, `id_status`, `asset`, `id_d2`, `cabang`, `id_cabang`, `divisi`, `id_divisi`, `tgl_pembelian`, `kategori`, `id_kategori`, `no`, `kategori2`, `id_kategori2`, `running_number`) VALUES
('110104313414251', 'Laptop Lenovo E440', 'PTCS', '1', 'ASSET', '1', 'JAKARTA', '01', 'AI-PSG', '04', '2013-03-05', 'PERALATAN ELEKTRONIK', '4', '41', 'LAPTOP / NOTEBOOK / TABLET', '1', '4251'),
('1101081113415698', 'Asus x450C', 'PTCS', '1', 'ASSET', '1', 'JAKARTA', '01', 'CTD', '08', '2013-11-14', 'PERALATAN ELEKTRONIK', '4', '41', 'LAPTOP / NOTEBOOK / TABLET', '1', '5698'),
('110108212415647', 'Laptop Lenovo B480', 'PTCS', '1', 'ASSET', '1', 'JAKARTA', '01', 'CTD', '08', '2012-02-08', 'PERALATAN ELEKTRONIK', '4', '41', 'LAPTOP / NOTEBOOK / TABLET', '1', '5647'),
('110112219415232', 'Laptop Lenovo B40-70', 'PTCS', '1', 'ASSET', '1', 'JAKARTA', '01', 'FMD', '12', '2019-02-01', 'PERALATAN ELEKTRONIK', '4', '41', 'LAPTOP / NOTEBOOK / TABLET', '1', '5232'),
('110113218425645', 'PC Rakitan Core i3', 'PTCS', '1', 'ASSET', '1', 'JAKARTA', '01', 'HRD/LEGAL', '13', '2018-02-06', 'PERALATAN ELEKTRONIK', '4', '42', 'PC / SERVER', '2', '5645'),
('110119219415431', 'Laptop DELL Lattitude', 'PTCS', '1', 'ASSET', '1', 'JAKARTA', '01', 'RAS', '19', '2019-02-11', 'PERALATAN ELEKTRONIK', '4', '41', 'LAPTOP / NOTEBOOK / TABLET', '1', '5431');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` varchar(2) NOT NULL,
  `cabang` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `cabang`) VALUES
('01', 'JAKARTA'),
('02', 'SURABAYA'),
('03', 'PEKANBARU'),
('04', 'DURI'),
('05', 'BALIKPAPAN');

-- --------------------------------------------------------

--
-- Table structure for table `d2_asset`
--

CREATE TABLE `d2_asset` (
  `id_d2` varchar(2) NOT NULL,
  `asset` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2_asset`
--

INSERT INTO `d2_asset` (`id_d2`, `asset`) VALUES
('1', 'ASSET');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` varchar(2) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
('01', 'AFD'),
('02', 'AI-CT'),
('03', 'AI-EI'),
('04', 'AI-PSG'),
('05', 'BPI'),
('06', 'BPN'),
('07', 'FA'),
('08', 'CTD'),
('09', 'DURI'),
('10', 'MGT'),
('11', 'FCS'),
('12', 'FMD'),
('13', 'HRD/LEGAL'),
('14', 'INF'),
('15', 'PROC'),
('16', 'PKU'),
('17', 'PMA'),
('18', 'SSCS'),
('19', 'RAS'),
('20', 'SBY'),
('21', 'SCD'),
('22', 'SIT'),
('23', 'SPCTSK'),
('24', 'POWER INDUSTRY');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_emp` varchar(6) NOT NULL,
  `nama_emp` varchar(50) NOT NULL,
  `divisi_emp` varchar(50) NOT NULL,
  `tgl_join` date NOT NULL,
  `tgl_resign` date NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(2) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('8', 'ASSET LAINNYA'),
('3', 'FURNITURE'),
('6', 'KENDARAAN BERMOTOR'),
('4', 'PERALATAN ELEKTRONIK'),
('2', 'PERALATAN MESIN'),
('1', 'TANAH & BANGUNAN');

-- --------------------------------------------------------

--
-- Table structure for table `kategori2`
--

CREATE TABLE `kategori2` (
  `id_kategori2` varchar(2) NOT NULL,
  `kategori2` varchar(50) NOT NULL,
  `id_kategori` varchar(2) NOT NULL,
  `no` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori2`
--

INSERT INTO `kategori2` (`id_kategori2`, `kategori2`, `id_kategori`, `no`) VALUES
('1', 'TANAH', '1', '11'),
('2', 'BANGUNAN', '1', '12'),
('3', 'TANAH & BANGUNAN', '1', '13'),
('1', 'MEKANIK', '2', '21'),
('2', 'SEMI OTOMATIS', '2', '22'),
('3', 'OTOMATIS', '2', '23'),
('1', 'KURSI / SOFA', '3', '31'),
('2', 'MEJA', '3', '32'),
('3', 'LEMARI / RAK / KABINET', '3', '33'),
('4', 'AKSESORIS', '3', '34'),
('5', 'LAINNYA', '3', '35'),
('1', 'LAPTOP / NOTEBOOK / TABLET', '4', '41'),
('2', 'PC / SERVER', '4', '42'),
('3', 'PRINTER / SCANNER / MESIN FOTOCOPY', '4', '43'),
('4', 'LCD LED MONITOR / TV', '4', '44'),
('5', 'PABX / MODEM / TELEPHONE / HP / FAX', '4', '45'),
('6', 'ROUTER /  PERANGKAT NETWORK', '4', '46'),
('7', 'TOOL / AKSESORIS ELEKTRONIK', '4', '47'),
('8', 'ALAT RUMAH TANGGA ELEKTRONIK', '4', '48'),
('9', 'ALAT & AKSESORIS LAINNYA', '4', '49'),
('1', 'MOBIL', '6', '61'),
('2', 'MOTOR', '6', '62');

-- --------------------------------------------------------

--
-- Table structure for table `status_asset`
--

CREATE TABLE `status_asset` (
  `id_status` varchar(2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_asset`
--

INSERT INTO `status_asset` (`id_status`, `status`) VALUES
('1', 'PTCS'),
('2', 'SEWA');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` varchar(2) NOT NULL,
  `nama_stock` varchar(40) NOT NULL,
  `quantity` int(5) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `vendor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `id_transin` int(6) NOT NULL,
  `nama_stock` varchar(50) NOT NULL,
  `quantity` int(4) NOT NULL,
  `tgl_received` date NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id_transout` int(4) NOT NULL,
  `nama_stock` varchar(50) NOT NULL,
  `quantity` int(4) NOT NULL,
  `tgl_serahterima` date NOT NULL,
  `nama_emp` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user','','') NOT NULL,
  `active` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `active`) VALUES
(1131, 'handi.irawan', '1f3b65dd0b5a91c0d37e6a566e6b04c2', 'admin', '1'),
(1212, 'test2', 'e36cc4f6715c4d3a42434038843b0060', 'user', '1'),
(1454, 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'user', '1'),
(3451, 'nalmskdnlsakn', 'a0e106e18c14720d96dca376d23a6ce6', 'user', '1'),
(5511, 'asdasdd', 'be225018c2eeef21678a81a5a2eadca1', 'user', '1'),
(6216, 'asdasda', 'a3dcb4d229de6fde0db5686dee47145d', 'user', '1'),
(7878, 'test2', 'ad0234829205b9033196ba818f7a872b', 'user', '1'),
(9987, 'jaisdjias', '107bb01525b08e8b2c8172e85a796100', 'user', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_d2` (`id_d2`),
  ADD KEY `id_cabang` (`id_cabang`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori2` (`no`);
ALTER TABLE `barang` ADD FULLTEXT KEY `id_status` (`id_status`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `d2_asset`
--
ALTER TABLE `d2_asset`
  ADD PRIMARY KEY (`id_d2`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kategori` (`kategori`);

--
-- Indexes for table `kategori2`
--
ALTER TABLE `kategori2`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `status_asset`
--
ALTER TABLE `status_asset`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD UNIQUE KEY `nama_stock` (`nama_stock`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`id_transin`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id_transout`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_in`
--
ALTER TABLE `stock_in`
  MODIFY `id_transin` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id_transout` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
