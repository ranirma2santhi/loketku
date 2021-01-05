-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 10:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loketku`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_data` (IN `u_email` VARCHAR(25), IN `u_pass` VARCHAR(255), IN `u_tingkatan_user` VARCHAR(30), IN `u_nama` VARCHAR(30), IN `u_alamat` VARCHAR(50), IN `u_notelp` VARCHAR(30), IN `u_jenis_kelamin` VARCHAR(30))  BEGIN
 INSERT INTO USER (email, PASSWORD, tingkatan_user) VALUES (u_email, md5(u_pass), u_tingkatan_user);
 INSERT INTO detailuser (userID,nama,alamat,noTelp,jenis_kelamin) VALUES (LAST_INSERT_ID(),u_nama,u_alamat,u_notelp,u_jenis_kelamin);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tes` (IN `u_email` VARCHAR(25), IN `u_pass` VARCHAR(30), IN `u_tingkatan_user` VARCHAR(30), IN `u_nama` VARCHAR(30), IN `u_alamat` VARCHAR(50), IN `u_notelp` VARCHAR(30), IN `u_jenis_kelamin` VARCHAR(30))  BEGIN
 INSERT INTO USER (email, PASSWORD, tingkatan_user) VALUES (u_email, u_pass, u_tingkatan_user);
 INSERT INTO detailuser (userID,nama,alamat,noTelp,jenis_kelamin) VALUES (LAST_INSERT_ID(),u_nama,u_alamat,u_notelp,u_jenis_kelamin);

	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` varchar(25) NOT NULL,
  `kapalID` varchar(25) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `tgl_pemesanan` date DEFAULT NULL,
  `waktu` enum('08:00','10:30','12:30','14:00','16:30') DEFAULT NULL,
  `rute` enum('gili terawangan','nusa penida') DEFAULT NULL,
  `nama_dermaga` varchar(30) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `hargaTot` int(50) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `kapalID`, `userID`, `tgl_pemesanan`, `waktu`, `rute`, `nama_dermaga`, `jumlah`, `hargaTot`, `status`) VALUES
('1213', 'B8242', 1078, '2020-06-26', '10:30', '', 'Sanur Bay', 2, 60000, ''),
('1214', 'A1010', 1078, '2020-06-09', '12:30', 'gili terawangan', 'Sanur Bay', 1, 30000, 'bayar'),
('1215', 'B1900', 1078, '2020-06-09', '14:00', 'nusa penida', 'Gili Bay', 5, 175000, ''),
('1216', '7888', 1001, '2020-06-22', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, ''),
('1217', '7888', 1001, '2020-06-16', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, ''),
('1222', '7888', 1081, '2020-06-30', '08:00', 'gili terawangan', 'Sanur Bay', 4, 46426, ''),
('1223', '7888', 1081, '2020-06-29', '08:00', 'gili terawangan', 'Sanur Bay', 6, 139278, 'bayar'),
('1224', '7888', 1081, '2020-06-23', '08:00', 'gili terawangan', 'Sanur Bay', 2, 46426, ''),
('1225', '7888', 1081, '2020-06-23', '08:00', 'gili terawangan', 'Sanur Bay', 2, 46426, ''),
('1226', '7888', 1081, '2020-06-22', '08:00', 'gili terawangan', 'Sanur Bay', 3, 69639, ''),
('1227', '7888', 1081, '2020-06-22', '08:00', 'gili terawangan', 'Sanur Bay', 3, 69639, ''),
('1229', '7888', 1081, '0000-00-00', '08:00', 'gili terawangan', 'Sanur Bay', 0, 0, ''),
('1230', '7888', 1081, '2020-06-16', '08:00', 'gili terawangan', 'Sanur Bay', 3, 69639, ''),
('1232', '7888', 1081, '2020-06-30', '08:00', 'gili terawangan', 'Sanur Bay', 8, 185704, ''),
('1233', '7888', 1081, '2020-06-23', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, ''),
('1234', '7888', 1081, '2020-06-23', '08:00', 'gili terawangan', 'Sanur Bay', 10, 232130, ''),
('1235', '7888', 1081, '2020-06-30', '08:00', 'gili terawangan', 'Sanur Bay', 2, 46426, ''),
('1236', '7888', 1001, '2020-06-30', '08:00', 'gili terawangan', 'Sanur Bay', 3, 69639, ''),
('1237', '7888', 1001, '2020-06-30', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, ''),
('1238', '7888', 1001, '0000-00-00', '08:00', 'gili terawangan', 'Sanur Bay', 0, 0, ''),
('1239', '7888', 1001, '0000-00-00', '08:00', 'gili terawangan', 'Sanur Bay', 0, 0, ''),
('1240', '7888', 1001, '2020-06-22', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, ''),
('1241', '7888', 1001, '2020-06-25', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, ''),
('1242', '7888', 1001, '2020-06-23', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, ''),
('1243', '7888', 1001, '2020-06-18', '08:00', 'gili terawangan', 'Sanur Bay', 1, 23213, '');

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `balik` AFTER DELETE ON `booking` FOR EACH ROW UPDATE kapal SET jml_tiket = jml_tiket + OLD.jumlah 
WHERE kapalID = OLD.kapalID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tiket_keluar` AFTER INSERT ON `booking` FOR EACH ROW BEGIN 
UPDATE kapal SET jml_tiket = jml_tiket - new.jumlah
WHERE kapalID = new.kapalID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `crewID` varchar(25) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gender` enum('laki-laki','perempuan') DEFAULT NULL,
  `noTelp` varchar(30) DEFAULT NULL,
  `telpKeluarga` varchar(30) DEFAULT NULL,
  `kapalID` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew`
--

INSERT INTO `crew` (`crewID`, `nama`, `gender`, `noTelp`, `telpKeluarga`, `kapalID`) VALUES
('1111', 'bambang', 'laki-laki', '089249983839', '089219928356', 'A1010'),
('2222', 'yudit', 'laki-laki', '089244727365', '089288374651', 'A1010'),
('3333', 'aryo', 'laki-laki', '089237422839', '089210029387', 'A1010'),
('4444', 'wahyu	', 'laki-laki', '089242993849', '089211625543', 'B1900'),
('5555', 'susanto', 'laki-laki', '089219287369', '089248882736', 'B1900'),
('6666', 'muliya', 'laki-laki', '089244291024', '089243987655', 'B1900'),
('7777', 'adit', 'laki-laki', '089244102935', '089240987899', 'B1996'),
('8888', 'bimo', 'laki-laki', '089244773566', '089200227369', 'B1996'),
('9999', 'andro', 'laki-laki', '089244778824', '089249873620', 'B1996');

-- --------------------------------------------------------

--
-- Table structure for table `detailbooking`
--

CREATE TABLE `detailbooking` (
  `id_detail_booking` int(11) NOT NULL,
  `booking_ID` varchar(25) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `metodePembayaran` varchar(10) NOT NULL,
  `jumlah_tiket` int(2) NOT NULL,
  `harga` int(50) NOT NULL,
  `harga_Tot` int(50) NOT NULL,
  `bayar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailbooking`
--

INSERT INTO `detailbooking` (`id_detail_booking`, `booking_ID`, `tgl_transaksi`, `metodePembayaran`, `jumlah_tiket`, `harga`, `harga_Tot`, `bayar`) VALUES
(4, '1226', '2020-06-07', 'OVO', 7, 30000, 210000, 210000),
(9, '1213', '2020-06-07', 'Gopay', 2, 30000, 60000, 60000),
(10, '1214', '2020-06-07', 'Gopay', 1, 30000, 30000, 30000),
(11, '1215', '2020-06-07', 'Gopay', 5, 35000, 175000, 175000),
(12, '1216', '2020-06-08', 'OVO', 1, 23213, 23213, 23213),
(13, '1217', '2020-06-08', 'OVO', 1, 23213, 23213, 23213),
(14, '1222', '2020-06-08', 'OVO', 2, 23213, 46426, 46426),
(15, '1223', '2020-06-08', 'OVO', 6, 2323, 23213, 139278),
(16, '1224', '2020-06-08', 'Gopay', 2, 23213, 46426, 46426),
(17, '1225', '2020-06-08', 'OVO', 2, 23213, 46426, 46426),
(18, '1230', '2020-06-08', 'OVO', 3, 23213, 69639, 69639),
(19, '1231', '2020-06-08', 'Gopay', 10, 23213, 232130, 232130),
(20, '1232', '2020-06-08', 'Gopay', 8, 23213, 185704, 185704),
(21, '1233', '2020-06-08', 'OVO', 1, 23213, 23213, 23213),
(22, '1234', '2020-06-08', 'OVO', 10, 23213, 232130, 232130),
(23, '1235', '2020-06-08', 'OVO', 2, 23213, 46426, 46426),
(24, '1236', '2020-06-09', '', 3, 23213, 69639, 69639),
(25, '1239', '2020-06-09', 'OVO', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detailkapal`
--

CREATE TABLE `detailkapal` (
  `kapalID` varchar(25) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `sisaTiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailuser`
--

CREATE TABLE `detailuser` (
  `id_detail_user` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noTelp` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailuser`
--

INSERT INTO `detailuser` (`id_detail_user`, `userID`, `nama`, `alamat`, `noTelp`, `jenis_kelamin`) VALUES
(1, 1001, 'umbara dewi', 'jalan kangingan, jimbaran', '08199990921', 'perempuan'),
(2, 1002, 'bagus saning', 'jalan anyelir, sawan, klungkung', '08492342', 'laki laki'),
(3, 1003, 'Cantika kurnia', 'jalan mawar, sesetan, denpasar', '089534573', 'perempuan'),
(4, 1004, 'theresia', 'jalan mana, manado', '089353732', 'perempuan'),
(22, 1068, 'Putri', 'Kerambitan, Tabanan', '0897651213', 'Perempuan'),
(25, 1071, 'Ni Made Ani Wahyuni', 'Klungkung', '08912312', 'Perempuan'),
(30, 1076, 'Novia Ardiyanti', 'Kermabitas', '089242', 'Perempuan'),
(32, 1078, 'tinny2bell', 'Klungkung', '087760381638', 'Perempuan'),
(33, 1079, 'Novia', 'kerambitan', '0899765', 'Perempuan'),
(34, 1080, 'e', 'e', '2', 'Laki-laki'),
(35, 1081, 'novia', 'kerambitan', '012281', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `kapalID` varchar(25) NOT NULL,
  `jenis` enum('fast boat','Roro','jukung/motor boat') DEFAULT NULL,
  `waktu` enum('08:00','10:30','12:30','14:00','16:30') DEFAULT NULL,
  `rute` varchar(30) NOT NULL,
  `nama_dermaga` varchar(30) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `jml_tiket` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`kapalID`, `jenis`, `waktu`, `rute`, `nama_dermaga`, `harga`, `kapasitas`, `jml_tiket`, `foto`) VALUES
('7888', 'Roro', '08:00', 'Gili Terawangan', 'Sanur Bay', 23213, 3123, 4, '569-879-foto 18.jpg'),
('A1010', 'fast boat', '12:30', 'Gili Terawangan', 'Sanur Bay', 30000, 15, 18, '997-foto 10.jpg'),
('A1011', 'fast boat', '08:00', 'Gili Terawangan', 'Gili Bay', 30000, 12, 12, '308-foto 2.jpg'),
('A1012', 'fast boat', '10:30', 'Nusa Penida', 'Gili Bay', 30000, 12, 12, '964-foto 12.jpg'),
('A2453', 'fast boat', '08:00', 'Nusa Penida', 'Sanur Bay', 30000, 15, 15, '104-foto 16.jpg'),
('A8342', 'fast boat', '12:30', 'Gili Terawangan', 'Gili Bay', 25000, 12, 12, '188-foto 21.jpg'),
('A9000', 'fast boat', '16:30', 'Nusa Penida', 'Sanur Bay', 20000, 12, 12, '375-foto 4.jpg'),
('A9003', 'fast boat', '08:00', 'Gili Terawangan', 'Sanur Bay', 25000, 10, 10, '396-foto 4.jpg'),
('AF434', 'fast boat', '14:00', 'Nusa Penida', 'Sanur Bay', 25000, 12, 12, '959-foto 21.jpg'),
('B1093', 'jukung/motor boat', '08:00', 'Nusa Penida', 'Gili Bay', 25000, 17, 17, '112-foto 16.jpg'),
('B1900', 'Roro', '14:00', 'Nusa Penida', 'Gili Bay', 35000, 182, 180, '158-foto 19.jpg'),
('B1901', 'fast boat', '16:30', 'Nusa Penida', 'Sanur Bay', 25000, 10, 10, '877-foto 12.jpg'),
('B1996', 'jukung/motor boat', '08:00', 'Nusa Penida', 'Sanur Bay', 20000, 15, 15, '373-foto 9.jpeg'),
('B1997', 'jukung/motor boat', '10:30', 'Nusa Penida', 'Sanur Bay', 20000, 12, 12, '685-foto 20.jpg'),
('B4375', 'jukung/motor boat', '12:30', 'Nusa Penida', 'Sanur Bay', 25000, 15, 15, '80-foto 2.jpg'),
('B4521', 'jukung/motor boat', '12:30', 'Nusa Penida', 'Gili Bay', 20000, 10, 10, '879-foto 18.jpg'),
('B488', 'jukung/motor boat', '16:30', 'Gili Terawangan', 'Gili Bay', 25000, 15, 15, '42-foto 13.jpg'),
('B8242', 'fast boat', '10:30', 'Gili Terwangan', 'Sanur Bay', 30000, 15, 15, '782-foto 20.jpg'),
('BK943', 'jukung/motor boat', '14:00', 'Gili Terawangan', 'Gili Bay', 25000, 15, 15, '285-foto 16.jpg'),
('BU485', 'jukung/motor boat', '14:00', 'Gili Terawangan', 'Sanur Bay', 20000, 12, 12, '15-foto 22.jpg'),
('GH8493', 'jukung/motor boat', '10:30', 'Gili Terawangan', 'Gili Bay', 25000, 15, 15, '589-518-foto 21.jpg'),
('JK345', 'Roro', '08:00', 'Gili Terawangan', 'Sanur Bay', 26000, 17, 17, '424-879-foto 18.jpg'),
('K324', 'jukung/motor boat', '08:00', 'Gili Terawangan', 'Sanur Bay', 121231, 12, 12, '160-foto 2.jpg'),
('RR934', 'Roro', '10:30', 'Gili Terawangan', 'Sanur Bay', 35000, 182, 180, '479-791-830-foto 14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `tiketID` varchar(25) NOT NULL,
  `bookingID` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`tiketID`, `bookingID`) VALUES
('1991', '1212'),
('1992', '1213'),
('1993', '1213'),
('1994', '1214'),
('1995', '1215'),
('1996', '1215'),
('1997', '1215'),
('1998', '1215'),
('1999', '1215'),
('2000', '1216'),
('2001', '1217'),
('2002', '1218'),
('2003', '1218'),
('2004', '1218'),
('2005', '1218'),
('2006', '1219'),
('2007', '1219'),
('2008', '1220'),
('2009', '1220'),
('2010', '1221'),
('2011', '1221'),
('2012', '1222'),
('2013', '1222'),
('2014', '1223'),
('2015', '1223'),
('2016', '1223'),
('2017', '1223'),
('2018', '1223'),
('2019', '1223'),
('2020', '1224'),
('2021', '1224'),
('2022', '1225'),
('2023', '1225'),
('2024', '1230'),
('2025', '1230'),
('2026', '1230'),
('2027', '1231'),
('2028', '1231'),
('2029', '1231'),
('2030', '1231'),
('2031', '1231'),
('2032', '1231'),
('2033', '1231'),
('2034', '1231'),
('2035', '1231'),
('2036', '1231'),
('2037', '1232'),
('2038', '1232'),
('2039', '1232'),
('2040', '1232'),
('2041', '1232'),
('2042', '1232'),
('2043', '1232'),
('2044', '1232'),
('2045', '1233'),
('2046', '1234'),
('2047', '1234'),
('2048', '1234'),
('2049', '1234'),
('2050', '1234'),
('2051', '1234'),
('2052', '1234'),
('2053', '1234'),
('2054', '1234'),
('2055', '1234'),
('2056', '1235'),
('2057', '1235'),
('2058', '1236'),
('2059', '1236'),
('2060', '1236');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tingkatan_user` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `tingkatan_user`) VALUES
(1001, 'siumbaraya@gmail.com', 'a580da32eb387c4f0c3b410168e6366f', 'user'),
(1002, 'bsgsd@gmail.com', '2c3451bb1945a8c11209444ab02c5cee', 'user'),
(1003, 'cnakr22@gmail.com', 'eca4ba272ff3b09b74921960fd905f8a', 'user'),
(1004, 'there123', '202cb962ac59075b964b07152d234b70', 'admin'),
(1078, 'tinny2bell@gmail.com', '4db1d28743f1311479769f3ce1088698', 'user'),
(1081, 'putunovia', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `kapalID` (`kapalID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`crewID`),
  ADD KEY `kapalID` (`kapalID`);

--
-- Indexes for table `detailbooking`
--
ALTER TABLE `detailbooking`
  ADD PRIMARY KEY (`id_detail_booking`),
  ADD KEY `bookingID` (`booking_ID`);

--
-- Indexes for table `detailuser`
--
ALTER TABLE `detailuser`
  ADD PRIMARY KEY (`id_detail_user`),
  ADD KEY `id_pengguna` (`userID`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`kapalID`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`tiketID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailbooking`
--
ALTER TABLE `detailbooking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `detailuser`
--
ALTER TABLE `detailuser`
  MODIFY `id_detail_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1082;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`kapalID`) REFERENCES `kapal` (`kapalID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `crew`
--
ALTER TABLE `crew`
  ADD CONSTRAINT `crew_ibfk_1` FOREIGN KEY (`kapalID`) REFERENCES `kapal` (`kapalID`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
