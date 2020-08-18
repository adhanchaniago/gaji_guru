-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 07:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_absen`
--

CREATE TABLE `sigaka_absen` (
  `absen_id` varchar(20) NOT NULL,
  `absen_karyawan_id` varchar(20) NOT NULL,
  `absen_rekap` varchar(20) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `absen_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `absen_jabatan_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_gaji`
--

CREATE TABLE `sigaka_gaji` (
  `gaji_id` varchar(20) NOT NULL,
  `gaji_karyawan_id` varchar(20) NOT NULL,
  `gaji_lembur` int(20) DEFAULT '0',
  `gaji_total` int(20) NOT NULL,
  `gaji_bayar_pinjaman` int(20) NOT NULL,
  `gaji_tanggal` date DEFAULT NULL,
  `gaji_bulan_ke` int(11) DEFAULT NULL,
  `gaji_status` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `gaji_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gawali` varchar(100) NOT NULL,
  `trasi` varchar(100) NOT NULL,
  `mejar` varchar(100) NOT NULL,
  `piket` varchar(100) NOT NULL,
  `prog` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_jabatan`
--

CREATE TABLE `sigaka_jabatan` (
  `jabatan_id` varchar(20) NOT NULL,
  `jabatan_nama` varchar(255) DEFAULT NULL,
  `jabatan_gaji` int(20) DEFAULT NULL,
  `jabatan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_jabatan`
--

INSERT INTO `sigaka_jabatan` (`jabatan_id`, `jabatan_nama`, `jabatan_gaji`, `jabatan_date_created`) VALUES
('JAB-28682', 'guru', 50000, '2020-08-17 08:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_karyawan`
--

CREATE TABLE `sigaka_karyawan` (
  `karyawan_id` varchar(20) NOT NULL,
  `karyawan_jabatan_id` varchar(20) DEFAULT NULL,
  `karyawan_nama` varchar(255) DEFAULT NULL,
  `karyawan_tempat_lahir` varchar(255) DEFAULT NULL,
  `karyawan_tanggal_lahir` date DEFAULT NULL,
  `karyawan_alamat` text,
  `karyawan_tanggal_gabung` date DEFAULT NULL,
  `karyawan_nomor_hp` varchar(20) DEFAULT NULL,
  `karyawan_date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `karyawan_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_karyawan`
--

INSERT INTO `sigaka_karyawan` (`karyawan_id`, `karyawan_jabatan_id`, `karyawan_nama`, `karyawan_tempat_lahir`, `karyawan_tanggal_lahir`, `karyawan_alamat`, `karyawan_tanggal_gabung`, `karyawan_nomor_hp`, `karyawan_date_created`, `karyawan_mapel`) VALUES
('PEG-30649', 'JAB-28682', 'aku', 'situbondo', '2020-08-01', 'banyupuith', '2020-09-05', '9999', '2020-08-17 09:17:29', 'mmmm'),
('PEG-30760', 'JAB-28682', 'wijayanti', 'jakarta', '2020-08-01', 'jakarta', '2020-08-29', '0000', '2020-08-17 09:19:20', 'agama'),
('PEG-31775', 'JAB-28682', 'rose', 'bindung', '2020-08-01', 'jlnnnnnn', '2020-08-22', '000', '2020-08-17 09:36:15', 'selasa'),
('PEG-32712', 'JAB-28682', 'rtttjjj', 'nnnn', '2020-08-01', 'nnnn', '2020-08-22', 'nnn', '2020-08-17 09:51:52', 'mmmm');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_pengguna`
--

CREATE TABLE `sigaka_pengguna` (
  `pengguna_id` int(20) NOT NULL,
  `pengguna_username` varchar(255) DEFAULT NULL,
  `pengguna_password` varchar(255) DEFAULT NULL,
  `pengguna_nama` varchar(255) DEFAULT NULL,
  `pengguna_foto` text,
  `pengguna_hak_akses` enum('admin','guru','wkkurikulum','kepsek','bendahara') DEFAULT NULL,
  `pengguna_date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sigaka_pengguna`
--

INSERT INTO `sigaka_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_nama`, `pengguna_foto`, `pengguna_hak_akses`, `pengguna_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', NULL, 'admin', '2019-06-28 21:06:43'),
(2, 'guru', '77e69c137812518e359196bb2f5e9bb9', 'Guru / Wali Kelas', NULL, 'guru', '2019-07-15 12:27:55'),
(3, 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'Kepala Sekolah', NULL, 'bendahara', '2020-08-06 19:28:03'),
(4, 'bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'Bendahara', NULL, 'bendahara', '2020-08-06 19:29:20'),
(5, 'wkkurikulum', 'c825eb0b720898a63ce2bf2ff1fe0c5d', 'WK Kurikulum', NULL, 'wkkurikulum', '2020-08-06 19:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `sigaka_pinjam`
--

CREATE TABLE `sigaka_pinjam` (
  `pinjam_id` varchar(20) NOT NULL,
  `pinjam_karyawan_id` varchar(20) NOT NULL,
  `pinjam_jumlah` int(20) NOT NULL,
  `pinjam_bayar` int(20) NOT NULL DEFAULT '0',
  `pinjam_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sigaka_absen`
--
ALTER TABLE `sigaka_absen`
  ADD PRIMARY KEY (`absen_id`);

--
-- Indexes for table `sigaka_gaji`
--
ALTER TABLE `sigaka_gaji`
  ADD PRIMARY KEY (`gaji_id`);

--
-- Indexes for table `sigaka_jabatan`
--
ALTER TABLE `sigaka_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `sigaka_karyawan`
--
ALTER TABLE `sigaka_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indexes for table `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `sigaka_pinjam`
--
ALTER TABLE `sigaka_pinjam`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sigaka_pengguna`
--
ALTER TABLE `sigaka_pengguna`
  MODIFY `pengguna_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
