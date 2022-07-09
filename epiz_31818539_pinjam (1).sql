-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql104.byetcluster.com
-- Generation Time: Jul 09, 2022 at 08:17 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31818539_pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nama_br` varchar(100) NOT NULL,
  `stock_pinjam` varchar(100) NOT NULL,
  `kondisi_br` varchar(100) NOT NULL,
  `foto_br` varchar(100) NOT NULL,
  `status` enum('Pending','Terima','Tolak') NOT NULL,
  `kode` varchar(100) NOT NULL,
  `acc` varchar(100) NOT NULL,
  `st_brg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id`, `tgl_pinjam`, `tgl_kembali`, `id_user`, `nama`, `nim`, `kelas`, `nama_br`, `stock_pinjam`, `kondisi_br`, `foto_br`, `status`, `kode`, `acc`, `st_brg`) VALUES
(8, '2022-06-26', '2022-06-27', 8, 'nuryadin', '2017185', 'XII TKJ 1', '', '5', '', '', 'Terima', 'P001', 'pnup', 'Kembali'),
(9, '2022-06-28', '2022-06-29', 8, 'nuryadin', '2017185', 'XII TKJ 1', '', '5', '', '', 'Terima', 'P001', 'pnup', 'Kembali'),
(10, '2022-07-08', '2022-07-09', 8, 'nuryadin', '2017185', 'XII TKJ 1', '', '1', '', '', 'Tolak', 'P002', 'pnup', ''),
(12, '2022-07-16', '2022-07-31', 8, 'nuryadin', '2017185', 'XII TKJ 1', '', '1', '', '', 'Tolak', 'P001', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id_barang` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama_barang` varchar(90) NOT NULL,
  `stock` varchar(225) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id_barang`, `kode`, `nama_barang`, `stock`, `kondisi`, `lokasi`, `foto`) VALUES
(13, 'P001', 'Filter oil', '1', 'Baru', 'Lemari 1 (Rak 1)', '669-hdd.jpg'),
(14, 'P002', 'Fuel Filter', '2', 'Baru', 'Lemari 1 (Rak 1)', '284-IMG_4760.JPG'),
(15, '', 'SOS(1BOX)', '1', 'Baru', 'Lemari 1 (Rak 1)', '117-agatu.png'),
(16, '', 'Kain Pel (PAX)', '1', 'Baru', 'Lemari 1 (Rak 1)', '8-agatu.png'),
(17, '', 'Cleaner Yellow', '1', 'Baru', 'Lemari 1 (Rak 1)', '439-agatu.png'),
(18, '', 'WD ', '3', 'Bekas', 'Lemari 1 (Rak 1)', '649-agatu.png'),
(19, '', 'Lakban Pipa (PCS)', '1', 'Baru', 'Lemari 1 (Rak 1)', '407-agatu.png'),
(20, '', 'All Purpose Red', '1', 'Baru', 'Lemari 1 (Rak 1)', '449-agatu.png'),
(21, '', 'Plastik Wrap', '1', 'Bekas', 'Lemari 1 (Rak 1)', '288-agatu.png'),
(22, '', 'Kain Orange', '2', 'Baru', 'Lemari 1 (Rak 1)', '694-agatu.png'),
(23, '', 'Element Fit', '1', 'Baru', 'Lemari 1 (Rak 1)', '873-agatu.png'),
(24, '', 'Sling', '1', 'Baru', 'Lemari 1 (Rak 2)', '758-agatu.png'),
(25, '', 'indicator', '1', 'Bekas', 'Lemari 1 (Rak 2)', '496-agatu.png'),
(26, '', 'Oil Cant', '1', 'Bekas', 'Lemari 1 (Rak 3)', '454-agatu.png'),
(27, '', 'Grease Gun', '1', 'Bekas', 'Lemari 1 (Rak 3)', '167-agatu.png'),
(28, '', 'SOS Bottle (SET)', '1', 'Baru', 'Lemari 1 (Rak 3)', '488-agatu.png'),
(29, '', 'Selang Kompresor', '1', 'Bekas', 'Lemari 1 (Rak 3)', '322-agatu.png'),
(30, '', 'Torque Wrench', '1', 'Bekas', 'Lemari 1 (Rak 3)', '572-agatu.png'),
(31, '', 'Radiator campreasure tester', '1', 'Baru', 'Lemari 1 (Rak 4)', '544-agatu.png'),
(32, '', 'Dial bore gauge', '1', 'Baru', 'Lemari 1 (Rak 4)', '29-agatu.png'),
(33, '', 'Socket (SET)', '1', 'Baru', 'Lemari 1 (Rak 4)', '469-agatu.png'),
(34, '', 'Oil Engine (Besar)', '2', 'Baru', 'Lemari 1 (Rak 4)', '333-agatu.png'),
(35, '', 'Engine Oil (Kecil)', '1', 'Baru', 'Lemari 1 (Rak 4)', '571-agatu.png'),
(36, '', 'Outside Micrometer', '8', 'Baru', 'Lemari 2 (Rak 1)', '282-agatu.png'),
(37, '', 'Vernier caliper', '6', 'Baru', 'Lemari 2 (Rak 1)', '815-agatu.png'),
(38, '', 'Line ', '1', 'Bekas', 'Lemari 2 (Rak 1)', '300-agatu.png'),
(39, '', 'Dial indicator', '2', 'Bekas', 'Lemari 2 (Rak 1)', '134-agatu.png'),
(40, '', 'Stan Dial', '1', 'Baru', 'Lemari 2 (Rak 1)', '381-agatu.png'),
(41, '', 'Pelubang Kertas', '1', 'Bekas', 'Lemari 2 (Rak 1)', '853-agatu.png'),
(42, '', 'Kabel Schematic', '2', 'Baru', 'Lemari 2 (Rak 1)', '824-agatu.png'),
(43, '', 'Selang hitam', '1', 'Baru', 'Lemari 2 (Rak 2)', '578-agatu.png'),
(44, '', 'Manifold gauge', '1', 'Baru', 'Lemari 2 (Rak 2)', '230-agatu.png'),
(45, '', 'Hole Saw', '3', 'Baru', 'Lemari 2 (Rak 2)', '350-agatu.png'),
(46, '', 'Baut Sekrup (PCS)', '1', 'Baru', 'Lemari 2 (Rak 2)', '785-agatu.png'),
(47, '', 'Groove Joint Pliers', '5', 'Baru', 'Lemari 2 (Rak 2)', '391-agatu.png'),
(48, '', 'Manifold Gauge', '1', 'Baru', 'Lemari 2 (Rak 2)', '838-agatu.png'),
(49, '', 'Tire Gauge', '1', 'Baru', 'Lemari 2 (Rak 2)', '911-agatu.png'),
(50, '', 'Solder', '1', 'Baru', 'Lemari 2 (Rak 2)', '890-agatu.png'),
(51, '', 'Hammer', '3', 'Baru', 'Lemari 2 (Rak 3)', '564-agatu.png'),
(52, '', 'Ball Pen Hammer', '3', 'Baru', 'Lemari 2 (Rak 3)', '660-agatu.png'),
(53, '', 'Hand Riveter', '2', 'Baru', 'Lemari 2 (Rak 3)', '806-agatu.png'),
(54, '', 'Tang Potong', '2', 'Baru', 'Lemari 2 (Rak 3)', '233-agatu.png'),
(55, '', 'Tocking (Tang Buaya)', '1', 'Baru', 'Lemari 2 (Rak 3)', '119-agatu.png'),
(56, '', 'Hammer Locking', '4', 'Baru', 'Lemari 2 (Rak 3)', '873-agatu.png'),
(57, '', 'Adjustable Wrench', '1', 'Bekas', 'Lemari 2 (Rak 3)', '962-agatu.png'),
(58, '', 'Allen Key (SET)', '1', 'Baru', 'Lemari 2 (Rak 3)', '591-agatu.png'),
(59, '', 'Screw Exca (SET)', '1', 'Baru', 'Lemari 2 (Rak 3)', '854-agatu.png'),
(60, '', 'Wire Brush', '2', 'Baru', 'Lemari 2 (Rak 3)', '690-agatu.png'),
(61, '', 'Kepala Kompresi', '1', 'Bekas', 'Lemari 2 (Rak 3)', '598-agatu.png'),
(62, '', 'Snap Ring', '1', 'Baru', 'Lemari 2 (Rak 3)', '507-agatu.png'),
(63, '', 'Impact Driver (SET)', '1', 'Baru', 'Lemari 2 (Rak 3)', '425-agatu.png'),
(64, '', 'Parts Cleaning Brush', '1', 'Baru', 'Lemari 2 (Rak 3)', '414-agatu.png'),
(65, '', 'Hex Key Star (SET)', '1', 'Baru', 'Lemari 2 (Rak 4)', '910-agatu.png'),
(66, '', 'Double Ring Spanner (SET)', '1', 'Baru', 'Lemari 2 (Rak 4)', '726-agatu.png'),
(67, '', 'Double Box End (SET)', '1', 'Baru', 'Lemari 2 (Rak 4)', '605-agatu.png'),
(68, '', 'Portable Electric Dril', '1', 'Baru', 'Lemari 2 (Rak 4)', '949-agatu.png'),
(69, '', 'Kabel Aki', '1', 'Bekas', 'Lemari 2 (Rak 4)', '259-agatu.png'),
(70, '', 'Kunci Socket (SET)', '1', 'Baru', 'Lemari 2 (Rak 4)', '120-agatu.png'),
(71, '', 'Screwdriver Phillips', '3', 'Baru', 'ToolBox Kuning', '776-agatu.png'),
(72, '', 'Screwdriver Flat', '4', 'Baru', 'ToolBox Kuning', '593-agatu.png'),
(73, '', 'Screwdriver Phillips', '1', 'Bekas', 'ToolBox Kuning', '362-agatu.png'),
(74, '', 'Screwdriver Flat', '1', 'Bekas', 'ToolBox Kuning', '902-agatu.png'),
(75, '', 'Socket (15mm)', '1', 'Baru', 'ToolBox Kuning', '902-agatu.png'),
(76, '', 'Socket (17mm)', '1', 'Baru', 'ToolBox Kuning', '847-agatu.png'),
(77, '', 'Socket (18mm)', '1', 'Baru', 'ToolBox Kuning', '878-agatu.png'),
(78, '', 'Socket (19mm)', '1', 'Baru', 'ToolBox Kuning', '206-agatu.png'),
(79, '', 'Socket (20mm)', '1', 'Baru', 'ToolBox Kuning', '260-agatu.png'),
(80, '', 'Socket (21mm)', '1', 'Baru', 'ToolBox Kuning', '378-agatu.png'),
(81, '', 'Socket (22mm)', '1', 'Baru', 'ToolBox Kuning', '979-agatu.png'),
(82, '', 'Socket (23mm)', '1', 'Baru', 'ToolBox Kuning', '894-agatu.png'),
(83, '', 'Socket (24mm)', '1', 'Baru', 'ToolBox Kuning', '724-agatu.png'),
(84, '', 'Socket (15/16mm)', '1', 'Baru', 'ToolBox Kuning', '795-agatu.png'),
(85, '', 'Socket (17mm)', '1', 'Baru', 'ToolBox Kuning', '225-agatu.png'),
(86, '', 'Socket (28mm)', '1', 'Baru', 'ToolBox Kuning', '724-agatu.png'),
(87, '', 'Socket (46mm)', '1', 'Baru', 'ToolBox Kuning', '738-agatu.png'),
(88, '', 'Hammer', '1', 'Bekas', 'ToolBox Kuning', '742-agatu.png'),
(89, '', 'Soft Tipped Hammer', '1', 'Bekas', 'ToolBox Kuning', '990-agatu.png'),
(90, '', 'Club Hammer', '1', 'Baru', 'ToolBox Kuning', '308-agatu.png'),
(91, '', 'Combination Wrench(27mm)', '2', 'Baru', 'ToolBox Kuning', '667-agatu.png'),
(92, '', 'Combination Wrench(36mm)', '1', 'Baru', 'ToolBox Kuning', '488-agatu.png'),
(93, '', 'Combination Wrench(14mm)', '1', 'Baru', 'ToolBox Kuning', '297-agatu.png'),
(94, '', 'Combination Wrench(15mm)', '1', 'Baru', 'ToolBox Kuning', '39-agatu.png'),
(95, '', 'Combination Wrench(16mm)', '1', 'Baru', 'ToolBox Kuning', '638-agatu.png'),
(96, '', 'Combination Wrench(17mm)', '1', 'Baru', 'ToolBox Kuning', '64-agatu.png'),
(97, '', 'Combination Wrench(18mm)', '1', 'Baru', 'ToolBox Kuning', '719-agatu.png'),
(98, '', 'Combination Wrench(19mm)', '1', 'Baru', 'ToolBox Kuning', '868-agatu.png'),
(99, '', 'Combination Wrench(20mm)', '1', 'Baru', 'ToolBox Kuning', '94-agatu.png'),
(100, '', 'Combination Wrench(21mm)', '1', 'Baru', 'ToolBox Kuning', '362-agatu.png'),
(101, '', 'Combination Wrench(22mm)', '1', 'Baru', 'ToolBox Kuning', '113-agatu.png'),
(102, '', 'Combination Wrench(23mm)', '1', 'Baru', 'ToolBox Kuning', '19-agatu.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(90) NOT NULL,
  `kelas` varchar(90) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','petugas','pengunjung') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `nim`, `kelas`, `username`, `password`, `level`) VALUES
(4, 'pnup', 'alatberatpnup@gmail.com', '', 'alatberatpnup@gmail.com', 'b86b5542d5bb176cceee2980bbec847f', 'admin'),
(5, 'petugas', 'petugas@gmail.com', '', 'petugas@gmail.com', 'd26dcae825d9c8b9c0d12bd66b4a25aa', 'petugas'),
(8, 'nuryadin', '2017185', 'XII TKJ 1', 'test', '827ccb0eea8a706c4c34a16891f84e7b', 'pengunjung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`kode`),
  ADD KEY `tb_pinjam_ibfk_1` (`kode`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `tools` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pinjam_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
