-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2018 at 01:13 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `id_agenda` int(11) NOT NULL,
  `jenis_agenda` varchar(30) NOT NULL,
  `tanggal_agenda` datetime NOT NULL,
  `isi_agenda` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `jenis_agenda`, `tanggal_agenda`, `isi_agenda`) VALUES
(1, 'kekeluargaan', '2018-06-14 00:00:00', '123'),
(2, 'kekeluargaan', '2018-06-15 00:00:00', '123'),
(3, 'kekeluargaan', '2018-04-15 00:00:00', '123');

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
(1, 1, 'Adinda', 'PEREMPUAN', 'Ibu Rumah Tangga', 'Bandung', '1988-05-14', 123232),
(2, 1, 'fsdfsa', 'LAKI-LAKI', 'Ibu Rumah Tangga', 'fsada', '2018-06-26', 12312),
(4, 11, 'Susi', 'LAKI-LAKI', 'Ibu Rumah Tangga', 'abu dhabi', '2018-06-08', 99),
(5, 12, 'Victoria Beckham', 'PEREMPUAN', 'Ibu Rumah Tangga', 'abu dhabi', '2018-06-08', 88),
(6, 12, 'John Beckham', 'LAKI-LAKI', 'Anak', 'dhabi abu', '2018-06-05', 77),
(7, 12, 'Robbie Beckham', 'LAKI-LAKI', 'Kerabat', 'abu abu', '2018-05-29', 66);

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
(2, 'Blok B', 1),
(3, 'Blok C', 1),
(4, 'Blok D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_agenda`
--

CREATE TABLE `notifikasi_agenda` (
  `id_notifikasi` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `status_notifikasi` varchar(15) NOT NULL DEFAULT 'terkirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id_surat` int(11) NOT NULL,
  `id_penghuni` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `isi_surat` text NOT NULL,
  `keterangan` text,
  `is_cetak` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id_surat`, `id_penghuni`, `id_anggota`, `tanggal_surat`, `isi_surat`, `keterangan`, `is_cetak`) VALUES
(1, 1, NULL, '2018-06-12', '213', '234', 0),
(7, 1, 1, '2018-07-12', 'xx', '321', 1),
(8, 1, 1, '2018-08-08', 'xx', '321', 1);

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
(11, 6, 456, 'Rambo Jon', 'Pemilik', 'LAKI-LAKI', 'Karyawan Swasta', '021', 1, 'Kepala Keluarga', 1),
(12, 7, 999, 'David Beckham', 'Penyewa', 'LAKI-LAKI', 'Karyawan Swasta', '021', 1, 'Anak', 1);

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
(1, 1, 1, 'Agung', 17, 'Batu Indah Regency Blok A No. 17', 'Milik Sendiri', 1),
(6, 2, 11, 'Rambo', 10, 'Jl alamat', 'Milik Sendiri', 1),
(7, 3, 12, 'David Beckham', 10, 'Jl BBC 5', 'Kontrak', 1);

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
(1, 1, 12, 'rt', 'rt', NULL, 1),
(3, 3, 1, 'agung', 'agung', NULL, 1),
(5, 2, 11, 'rw', 'rw', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_penghuni` (`id_penghuni`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`);

--
-- Indexes for table `notifikasi_agenda`
--
ALTER TABLE `notifikasi_agenda`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_penghuni` (`id_penghuni`),
  ADD KEY `id_agenda` (`id_agenda`);

--
-- Indexes for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_penghuni` (`id_penghuni`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `id_rumah` (`id_rumah`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`),
  ADD KEY `id_blok` (`id_blok`),
  ADD KEY `id_penghuni` (`id_penghuni`);

--
-- Indexes for table `user_pemakai`
--
ALTER TABLE `user_pemakai`
  ADD PRIMARY KEY (`id_user_pemakai`),
  ADD KEY `id_penghuni` (`id_penghuni`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id_blok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi_agenda`
--
ALTER TABLE `notifikasi_agenda`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_pemakai`
--
ALTER TABLE `user_pemakai`
  MODIFY `id_user_pemakai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `anggota_keluarga_ibfk_1` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi_agenda`
--
ALTER TABLE `notifikasi_agenda`
  ADD CONSTRAINT `notifikasi_agenda_ibfk_1` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_agenda_ibfk_2` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id_agenda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD CONSTRAINT `pengajuan_surat_ibfk_1` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_surat_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota_keluarga` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD CONSTRAINT `penghuni_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id_rumah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rumah`
--
ALTER TABLE `rumah`
  ADD CONSTRAINT `rumah_ibfk_1` FOREIGN KEY (`id_blok`) REFERENCES `blok` (`id_blok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pemakai`
--
ALTER TABLE `user_pemakai`
  ADD CONSTRAINT `user_pemakai_ibfk_1` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_pemakai_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
