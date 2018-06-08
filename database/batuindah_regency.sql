-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 02:42 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batuindah_regency`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `jenis_agenda` varchar(30) NOT NULL,
  `tanggal_agenda_awal` date NOT NULL,
  `tanggal_agenda_akhir` date NOT NULL,
  `isi_agenda` text NOT NULL,
  `status_agenda` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `id_anggota` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_ktp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_keluarga`
--

INSERT INTO `anggota_keluarga` (`id_anggota`, `id_penghuni`, `nama`, `jeniskelamin`, `status`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`) VALUES
(1, 8, 'Adinda', 'PEREMPUAN', 'Ibu Rumah Tangga', 'Bandung', '1988-05-14', 123232),
(2, 9, 'fsdfsa', 'LAKI-LAKI', 'Ibu Rumah Tangga', 'fsada', '2018-06-26', 12312);

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id_blok` int(11) NOT NULL,
  `nama_blok` varchar(30) NOT NULL,
  `is_aktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `nama_blok`, `is_aktif`) VALUES
(1, 'Blok A', 1),
(2, 'Blok B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `jenis_surat` varchar(30) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `isi_surat` text,
  `penyetujuan_rt` tinyint(1) DEFAULT '0',
  `penyetujuan_rw` tinyint(1) DEFAULT '0',
  `is_cetak` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `id_rumah` int(11) NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `nama_penghuni` varchar(30) NOT NULL,
  `status_penghuni` varchar(20) NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `no_telepon` varchar(22) NOT NULL,
  `jml_anggota_keluarga` int(11) NOT NULL,
  `status_dikeluarga` varchar(20) DEFAULT NULL,
  `is_aktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `id_rumah`, `no_ktp`, `nama_penghuni`, `status_penghuni`, `jeniskelamin`, `pekerjaan`, `no_telepon`, `jml_anggota_keluarga`, `status_dikeluarga`, `is_aktif`) VALUES
(1, 1, 0, 'Agung Sandi', 'Penyewa', 'LAKI-LAKI', 'Karyawan Swasta', '0856789989', 6, NULL, 1),
(2, 1, 1232313, 'Agung', 'Pemilik', 'LAKI-LAKI', 'Wiraswasta', '12323', 2, 'Kepala Keluarga', 1),
(3, 1, 1232313, 'Agung', 'Pemilik', 'LAKI-LAKI', 'Wiraswasta', '12323', 2, 'Kepala Keluarga', 1),
(4, 1, 1232313, 'Agung', 'Pemilik', 'LAKI-LAKI', 'Wiraswasta', '12323', 2, 'Kepala Keluarga', 1),
(5, 1, 1232313, 'Agung', 'Pemilik', 'LAKI-LAKI', 'Wiraswasta', '12323', 2, 'Kepala Keluarga', 1),
(6, 1, 1232313, 'Agung', 'Pemilik', 'LAKI-LAKI', 'Wiraswasta', '12323', 2, 'Kepala Keluarga', 1),
(7, 1, 1232313, 'Agung', 'Pemilik', 'LAKI-LAKI', 'Wiraswasta', '12323', 2, 'Kepala Keluarga', 1),
(8, 1, 1232313, 'Agung', 'Pemilik', 'LAKI-LAKI', 'Wiraswasta', '12323', 2, 'Kepala Keluarga', 1),
(9, 1, 23321, 'tess', 'Pemilik', 'LAKI-LAKI', 'dsfasd', '131231', 1, 'Kepala Keluarga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `is_aktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`, `is_aktif`) VALUES
(1, 'RT', 1),
(2, 'RW', 1),
(3, 'Penghuni', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `id_rumah` int(11) NOT NULL,
  `id_blok` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `no_rumah` int(3) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `status_rumah` varchar(20) NOT NULL,
  `is_aktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `id_blok`, `id_penghuni`, `nama_pemilik`, `no_rumah`, `alamat_lengkap`, `status_rumah`, `is_aktif`) VALUES
(1, 1, 0, 'Agung', 17, 'Batu Indah Regency Blok A No. 17', 'Milik Sendiri', 1),
(2, 1, 0, 'Sandi', 12, 'Batu  Indah Regency No. 12', 'Milik Sendiri', 1),
(3, 1, 0, 'Andi', 10, 'Batu Indah Regency No. 10', 'Milik Sendiri', 1),
(4, 1, 0, 'Alma', 15, 'Komplek Batu Indah Regency No. 15\r\n', 'Milik Sendiri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_pemakai`
--

CREATE TABLE `user_pemakai` (
  `id_user_pemakai` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_penghuni` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `photo` text,
  `is_aktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pemakai`
--

INSERT INTO `user_pemakai` (`id_user_pemakai`, `id_role`, `id_penghuni`, `username`, `password`, `photo`, `is_aktif`) VALUES
(1, 1, NULL, 'rt', 'rt', NULL, 1),
(2, 2, NULL, 'rw', 'rw', NULL, 1),
(3, 3, 1, 'agung', 'agung', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`);

--
-- Indexes for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `user_pemakai`
--
ALTER TABLE `user_pemakai`
  ADD PRIMARY KEY (`id_user_pemakai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id_blok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_pemakai`
--
ALTER TABLE `user_pemakai`
  MODIFY `id_user_pemakai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
