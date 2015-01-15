-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2014 at 10:50 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penilaian_bpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `ID_DIVISI` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_DIVISI` varchar(25) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_DIVISI`),
  UNIQUE KEY `IDX_NAMA_DIVISI` (`ID_DIVISI`,`NAMA_DIVISI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`ID_DIVISI`, `NAMA_DIVISI`, `UPDATED_AT`, `CREATED_AT`) VALUES
(5, 'Operasional Manager', '2014-11-07 17:08:27', '2014-11-07 17:08:27'),
(6, 'Staf Admin', '2014-11-07 17:08:57', '2014-11-07 17:08:57'),
(7, 'Driver Operasional', '2014-11-07 17:09:13', '2014-11-07 17:09:13'),
(8, 'Operator Derek', '2014-11-07 17:09:43', '2014-11-07 17:09:43'),
(9, 'OB (Office Boy)', '2014-11-07 17:09:58', '2014-11-07 17:09:58'),
(10, 'Korlap Derek', '2014-11-07 17:10:13', '2014-11-07 17:10:13'),
(11, 'Driver Derek', '2014-11-07 17:10:24', '2014-11-07 17:10:24'),
(12, 'Ass. Driver Derek', '2014-11-07 17:10:44', '2014-11-07 17:10:44'),
(13, 'Pul Tol', '2014-11-07 17:10:56', '2014-11-07 17:10:56'),
(14, 'Ass. Patroli', '2014-11-07 17:11:09', '2014-11-07 17:11:09'),
(15, 'Driver Ambulance', '2014-11-07 17:11:33', '2014-11-07 17:11:33'),
(16, 'Recepsionist', '2014-11-07 17:11:46', '2014-11-07 17:11:46'),
(17, 'Satpam', '2014-11-07 17:11:53', '2014-11-07 17:11:53'),
(18, 'Korlap', '2014-11-07 17:12:02', '2014-11-07 17:12:02'),
(19, 'Op. Head Trailer', '2014-11-07 17:12:14', '2014-11-07 17:12:14'),
(20, 'Koord. OB', '2014-11-07 17:12:21', '2014-11-07 17:12:21'),
(21, 'Sapu Jalan', '2014-11-07 17:12:30', '2014-11-07 17:12:30'),
(22, 'Driver', '2014-11-07 17:12:39', '2014-11-07 17:12:39'),
(23, 'Gardener Sapu Jalan', '2014-11-07 17:12:51', '2014-11-07 17:12:51'),
(24, 'Spv. Operasional', '2014-11-07 17:13:01', '2014-11-07 17:13:01'),
(25, 'Staf TI', '2014-11-07 17:13:34', '2014-11-07 17:13:11'),
(26, 'Paramedis', '2014-11-07 17:13:21', '2014-11-07 17:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE IF NOT EXISTS `indikator` (
  `ID_INDIKATOR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_JENIS_INDIKATOR` int(11) DEFAULT NULL,
  `NAMA_INDIKATOR` varchar(25) DEFAULT NULL,
  `BOBOT_INDIKATOR` decimal(8,5) DEFAULT NULL,
  `KET_INDIKATOR` text,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_INDIKATOR`),
  UNIQUE KEY `IDX_INDIKATOR` (`ID_INDIKATOR`,`NAMA_INDIKATOR`),
  KEY `FK_MEMPUNYAI_1` (`ID_JENIS_INDIKATOR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`ID_INDIKATOR`, `ID_JENIS_INDIKATOR`, `NAMA_INDIKATOR`, `BOBOT_INDIKATOR`, `KET_INDIKATOR`, `UPDATED_AT`, `CREATED_AT`) VALUES
(2, 1, 'Kehadiran', 0.15000, 'Presensi karyawan', '2014-11-06 14:52:15', '2014-10-28 13:58:38'),
(4, 1, 'Kemampuan Kerja', 0.07860, 'Kemampuan dan ketrampilan kerja karyawan', '2014-10-28 14:11:57', '2014-10-28 14:06:02'),
(5, 2, 'Kebersihan', 0.15000, 'Kebersihan karyawan', '2014-11-07 16:44:54', '2014-11-05 13:18:07'),
(6, 4, 'Keamanan', 0.10000, 'Tingkat kemanan yang dihasilkan', '2014-11-07 15:06:29', '2014-11-07 14:10:58'),
(7, 1, 'Prestasi', 0.07860, 'Prestasi kerja karyawan', '2014-11-07 16:37:02', '2014-11-07 15:04:55'),
(8, 1, 'Kedisiplinan', 0.07860, 'Tingkat kedisiplinan karyawan', '2014-11-07 16:37:15', '2014-11-07 15:05:54'),
(9, 1, 'Kepemimpinan', 0.07860, 'Sikap kepemimpinan karyawan', '2014-11-07 16:37:26', '2014-11-07 15:07:41'),
(10, 1, 'Loyalitas', 0.07860, 'Loyalitas kepada perusahaan', '2014-11-07 16:37:40', '2014-11-07 15:08:15'),
(11, 1, 'Hubungan Kerja', 0.07860, 'Hubungan kerja dengan perusahaan', '2014-11-07 16:38:11', '2014-11-07 15:08:49'),
(12, 1, 'Kelengkapan Atribut', 0.07860, 'Kelengkapan atribut kerja yang dikenakan setiap hari kerja', '2014-11-07 16:38:25', '2014-11-07 15:09:33'),
(13, 2, 'Keaktifan', 0.15000, 'Keaktifan dalam pekerjaan sehari-hari', '2014-11-07 15:10:24', '2014-11-07 15:10:24'),
(14, 4, 'Pelayanan', 0.10000, 'Sikap karyawan dalam melayani permintaan', '2014-11-07 15:11:51', '2014-11-07 15:11:51'),
(15, 4, 'Tanggung Jawab', 0.10000, 'Sikap tanggung jawab karyawan', '2014-11-07 15:12:33', '2014-11-07 15:12:33'),
(16, 3, 'Kecakapan', 0.10000, 'Kecakapan dalam menjalankan tugas', '2014-11-24 15:03:57', '2014-11-24 15:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_indikator`
--

CREATE TABLE IF NOT EXISTS `jenis_indikator` (
  `ID_JENIS_INDIKATOR` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_INDIKATOR` varchar(25) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_JENIS_INDIKATOR`),
  UNIQUE KEY `IDX_JENIS_INDIKATOR` (`ID_JENIS_INDIKATOR`,`JENIS_INDIKATOR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jenis_indikator`
--

INSERT INTO `jenis_indikator` (`ID_JENIS_INDIKATOR`, `JENIS_INDIKATOR`, `UPDATED_AT`, `CREATED_AT`) VALUES
(1, 'Umum', '2014-10-19 13:44:29', '2014-10-19 13:44:29'),
(2, 'Office Boy', '2014-11-06 14:23:49', '2014-10-19 13:52:00'),
(3, 'Driver', '2014-11-06 14:24:40', '2014-11-06 14:24:40'),
(4, 'Security', '2014-11-06 14:24:00', '2014-10-28 13:46:13'),
(5, 'Assistant Driver Derek', '2014-11-06 14:24:26', '2014-11-06 14:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `ID_KARYAWAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DIVISI` int(11) DEFAULT NULL,
  `ID_REKANAN` int(11) DEFAULT NULL,
  `NIK_KARYAWAN` char(10) DEFAULT NULL,
  `NAMA_KARYAWAN` varchar(50) DEFAULT NULL,
  `ALAMAT_KARYAWAN` varchar(100) DEFAULT NULL,
  `TELEPON_KARYAWAN` char(15) DEFAULT NULL,
  `STATUS_PENILAIAN` enum('belum','sudah') NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_KARYAWAN`),
  UNIQUE KEY `IDX_KARYAWAN` (`ID_KARYAWAN`,`NIK_KARYAWAN`,`NAMA_KARYAWAN`),
  KEY `FK_MEMILIKI_1` (`ID_DIVISI`),
  KEY `FK_MEMILIKI_2` (`ID_REKANAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_KARYAWAN`, `ID_DIVISI`, `ID_REKANAN`, `NIK_KARYAWAN`, `NAMA_KARYAWAN`, `ALAMAT_KARYAWAN`, `TELEPON_KARYAWAN`, `STATUS_PENILAIAN`, `UPDATED_AT`, `CREATED_AT`) VALUES
(4, 5, 1, '081114001', 'Moh. Oby M. Setiawan', 'Krian, Sidoarjo', '085646821891', 'belum', '2014-11-25 02:17:29', '2014-11-07 17:15:50'),
(5, 6, 2, '081114002', 'Dwi P. Pambudi', 'Sambikerep, Surabaya', '082256781902', 'belum', '2014-11-07 17:19:46', '2014-11-07 17:18:22'),
(6, 7, 3, '081114003', 'Septyan D. K. Putra', 'Manukan, Surabaya', '083526719023', 'belum', '2014-11-07 17:22:53', '2014-11-07 17:19:23'),
(7, 8, 4, '081114004', 'Johanes A. Kurniawan', 'Mojokerto', '085712628910', 'belum', '2014-11-07 17:20:50', '2014-11-07 17:20:50'),
(8, 9, 5, '081114005', 'M. Fathur Rahman', 'Tenggilis, Surabaya', '082278156726', 'belum', '2014-11-18 16:29:09', '2014-11-07 17:21:55'),
(9, 10, 6, '081114006', 'Thony Hermawan', 'Prigen, Pasuruan', '085755300811', 'belum', '2014-11-07 17:22:30', '2014-11-07 17:22:30'),
(10, 11, 7, '081114007', 'Achmad Munib', 'Wage, Sidoarjo', '085756324516', 'belum', '2014-11-07 17:41:43', '2014-11-07 17:41:43'),
(11, 9, 6, '241114001', 'Rastra Sewa Eka P.', 'Jl. Perak No. 201 Surabaya', '0812-2246-1290', 'sudah', '2014-11-25 02:20:04', '2014-11-24 09:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `level_pengguna`
--

CREATE TABLE IF NOT EXISTS `level_pengguna` (
  `ID_LEVEL` int(11) NOT NULL AUTO_INCREMENT,
  `LEVEL_PENGGUNA` varchar(25) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_LEVEL`),
  UNIQUE KEY `IDX_LEVEL` (`ID_LEVEL`,`LEVEL_PENGGUNA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level_pengguna`
--

INSERT INTO `level_pengguna` (`ID_LEVEL`, `LEVEL_PENGGUNA`, `UPDATED_AT`, `CREATED_AT`) VALUES
(1, 'HRD Manager', '2014-10-19 21:05:52', '2014-10-19 21:05:52'),
(2, 'Direktur', '2014-10-19 21:06:33', '2014-10-19 21:06:33'),
(3, 'Administrator', '2014-10-19 21:07:09', '2014-10-19 21:07:09'),
(4, 'Admin Operasional', '2014-10-19 21:07:32', '2014-10-19 21:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `ID_PENGGUNA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LEVEL` int(11) DEFAULT NULL,
  `NAMA_PENGGUNA` varchar(15) DEFAULT NULL,
  `PASS_PENGGUNA` varchar(15) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PENGGUNA`),
  UNIQUE KEY `IDX_PENGGUNA` (`ID_PENGGUNA`,`NAMA_PENGGUNA`),
  KEY `FK_MEMILIKI_4` (`ID_LEVEL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `ID_LEVEL`, `NAMA_PENGGUNA`, `PASS_PENGGUNA`, `UPDATED_AT`, `CREATED_AT`) VALUES
(1, 1, 'HRD Manager', 'manager', '2014-10-23 12:38:51', '2014-10-19 14:21:03'),
(2, 2, 'Direktur', 'dirut', '2014-10-19 14:22:11', '2014-10-19 14:22:11'),
(3, 3, 'Admin', 'admin', '2014-10-19 14:22:25', '2014-10-19 14:22:25'),
(4, 4, 'Ops Manager', 'opsmanager', '2014-10-19 14:22:52', '2014-10-19 14:22:52'),
(6, 1, 'thony', 'thony', '2014-11-07 10:14:04', '2014-10-28 14:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `ID_PENILAIAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_INDIKATOR` int(11) NOT NULL DEFAULT '0',
  `ID_RANGE` int(11) NOT NULL DEFAULT '0',
  `ID_KARYAWAN` int(11) NOT NULL DEFAULT '0',
  `HASIL_PENILAIAN` decimal(8,2) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PENILAIAN`,`ID_INDIKATOR`,`ID_KARYAWAN`),
  KEY `FK_MEMILIKI_3` (`ID_RANGE`),
  KEY `FK_MEMPUNYAI_3` (`ID_INDIKATOR`),
  KEY `FK_MENILAI` (`ID_KARYAWAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`ID_PENILAIAN`, `ID_INDIKATOR`, `ID_RANGE`, `ID_KARYAWAN`, `HASIL_PENILAIAN`, `UPDATED_AT`, `CREATED_AT`) VALUES
(11, 2, 4, 11, 0.60, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(12, 4, 4, 11, 0.31, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(13, 7, 3, 11, 0.24, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(14, 8, 2, 11, 0.16, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(15, 9, 3, 11, 0.24, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(16, 10, 4, 11, 0.31, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(17, 11, 4, 11, 0.31, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(18, 12, 3, 11, 0.24, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(19, 5, 4, 11, 0.60, '2014-11-25 02:20:04', '2014-11-25 02:20:04'),
(20, 13, 4, 11, 0.60, '2014-11-25 02:20:04', '2014-11-25 02:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `range_nilai`
--

CREATE TABLE IF NOT EXISTS `range_nilai` (
  `ID_RANGE` int(11) NOT NULL AUTO_INCREMENT,
  `KET_RANGE` varchar(25) DEFAULT NULL,
  `NILAI_RANGE` int(11) DEFAULT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  PRIMARY KEY (`ID_RANGE`),
  UNIQUE KEY `IDX_RANGE` (`ID_RANGE`,`KET_RANGE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `range_nilai`
--

INSERT INTO `range_nilai` (`ID_RANGE`, `KET_RANGE`, `NILAI_RANGE`, `UPDATED_AT`, `CREATED_AT`) VALUES
(1, 'Sangat Kurang', 1, '2014-10-29 05:18:34', '2014-10-29 05:18:34'),
(2, 'Kurang', 2, '2014-10-29 05:19:27', '2014-10-29 05:19:27'),
(3, 'Cukup', 3, '2014-10-29 05:24:14', '2014-10-29 05:19:59'),
(4, 'Baik', 4, '2014-10-29 05:24:24', '2014-10-29 05:24:24'),
(8, 'Sangat Baik', 5, '2014-11-19 00:54:03', '2014-11-19 00:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `rekanan`
--

CREATE TABLE IF NOT EXISTS `rekanan` (
  `ID_REKANAN` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_REKANAN` varchar(50) DEFAULT NULL,
  `ALAMAT_REKANAN` varchar(100) DEFAULT NULL,
  `TELP_REKANAN` char(15) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_REKANAN`),
  UNIQUE KEY `IDX_REKANAN` (`ID_REKANAN`,`NAMA_REKANAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rekanan`
--

INSERT INTO `rekanan` (`ID_REKANAN`, `NAMA_REKANAN`, `ALAMAT_REKANAN`, `TELP_REKANAN`, `STATUS`, `UPDATED_AT`, `CREATED_AT`) VALUES
(1, 'MNA', 'Surabaya', '', 1, '2014-11-07 16:48:48', '2014-10-28 02:54:29'),
(2, 'SURGEM', 'Surabaya', '', 1, '2014-11-07 16:48:59', '2014-10-28 12:01:36'),
(3, 'MBMR', 'Surabaya', '', 1, '2014-11-07 16:49:23', '2014-11-07 16:49:23'),
(4, 'NPTI', 'Surabaya', '', 1, '2014-11-07 16:49:40', '2014-11-07 16:49:40'),
(5, 'SPIL', 'Surabaya', '', 1, '2014-11-07 16:49:57', '2014-11-07 16:49:57'),
(6, 'SURAMADU', 'Surabaya', '', 1, '2014-11-07 16:50:10', '2014-11-07 16:50:10'),
(7, 'BALI', 'Bali', '', 1, '2014-11-07 16:50:23', '2014-11-07 16:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE IF NOT EXISTS `rekomendasi` (
  `ID_REKOMENDASI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KARYAWAN` int(11) DEFAULT NULL,
  `NILAI_AKHIR` decimal(8,4) DEFAULT NULL,
  `REKOMENDASI` varchar(100) DEFAULT NULL,
  `STATUS` enum('belum','sudah') DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_REKOMENDASI`),
  KEY `FK_MEMPUNYAI_2` (`ID_KARYAWAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`ID_REKOMENDASI`, `ID_KARYAWAN`, `NILAI_AKHIR`, `REKOMENDASI`, `STATUS`, `UPDATED_AT`, `CREATED_AT`) VALUES
(2, 11, 3.6100, 'Kabag. OB', 'sudah', '2014-11-25 02:20:46', '2014-11-25 02:20:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `FK_MEMPUNYAI_1` FOREIGN KEY (`ID_JENIS_INDIKATOR`) REFERENCES `jenis_indikator` (`ID_JENIS_INDIKATOR`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_MEMILIKI_1` FOREIGN KEY (`ID_DIVISI`) REFERENCES `divisi` (`ID_DIVISI`),
  ADD CONSTRAINT `FK_MEMILIKI_2` FOREIGN KEY (`ID_REKANAN`) REFERENCES `rekanan` (`ID_REKANAN`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `FK_MEMILIKI_4` FOREIGN KEY (`ID_LEVEL`) REFERENCES `level_pengguna` (`ID_LEVEL`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `FK_MEMILIKI_3` FOREIGN KEY (`ID_RANGE`) REFERENCES `range_nilai` (`ID_RANGE`),
  ADD CONSTRAINT `FK_MEMPUNYAI_3` FOREIGN KEY (`ID_INDIKATOR`) REFERENCES `indikator` (`ID_INDIKATOR`),
  ADD CONSTRAINT `FK_MENILAI` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`);

--
-- Constraints for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD CONSTRAINT `FK_MEMPUNYAI_2` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
