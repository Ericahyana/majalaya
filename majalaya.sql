-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 07:35 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majalaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'PENERBITAN KK'),
(2, 'PENERBITAN KTP'),
(3, 'SURAT KETERANGAN PINDAH DALAM KABUPATEN'),
(4, 'KETERANGAN PINDAH ANTAR KABUPATEN'),
(5, 'PEMBUATAN PROPOSAL BANTUAN KEAGAMAAN'),
(6, 'PEMBUATAN KARTU KUNING'),
(7, 'PELAYANAN SEWA ALAT BERAT'),
(8, 'PENERBITAN IZIN MENDIRIKAN BANGUNAN'),
(9, 'PEMBUATAN SKCK'),
(10, 'PENERBITAN IZIN GANGGUAN (HO)'),
(11, 'PEMBUATAN SURAT KETERANGAN TIDAK MAMPU'),
(12, 'PEMBUATAN SURAT KETERANGAN AHLI WARIS');

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `id_dokumen` int(11) NOT NULL,
  `NIK` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelengkapan`
--

INSERT INTO `kelengkapan` (`id_dokumen`, `NIK`, `keterangan`, `foto`) VALUES
(1, 2147483647, 'Telah_Berusia_17_Tahun', 'Lengkap'),
(2, 2147483647, 'Surat_Pengantar', 'Lengkap'),
(3, 2147483647, 'Foto_Copy_KK', 'Lengkap'),
(4, 2147483647, 'Foto Copy Akte Kelahiran', 'Belum'),
(35, 2147483647, 'Surat Pengantar', '12213213213123cara-mengganti-font-dengan-css-1.png.png'),
(36, 2147483647, 'Foto Copy Surat Nikah', '12213213213123Komponen-Infrastruktur-Teknologi-Informasi.jpg.jpg'),
(37, 2147483647, 'Foto Copy KK Orang Tua', ''),
(38, 2147483647, 'Surat Pindah', '12213213213123cara-mengganti-font-dengan-css-1.png.png'),
(39, 2147483647, 'Foto Copy Akte Kelahiran', '12213213213123Kaos TK1.png.png'),
(44, 2147483647, 'Surat Pengantar', '123333333333333333333Surat_Pengantar.jpeg'),
(45, 2147483647, 'Foto Copy Surat Nikah', '123333333333333333333Foto_Copy_Surat_Nikah.jpeg'),
(46, 2147483647, 'Surat Pindah', '123333333333333333333Surat_Pindah.jpeg'),
(47, 2147483647, 'Foto Copy Akte Kelahiran', '123333333333333333333Foto_Copy_Akte_Kelahiran.jpeg'),
(52, 160613024, 'Surat Pengantar', '160613024Surat_Pengantar.jpeg'),
(53, 160613024, 'Foto Copy Surat Nikah', '160613024Foto_Copy_Surat_Nikah.jpeg'),
(54, 160613024, 'Surat Pindah', '160613024Surat_Pindah.jpg'),
(55, 160613024, 'Foto Copy Akte Kelahiran', '160613024Foto_Copy_Akte_Kelahiran.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `NIK` bigint(16) NOT NULL DEFAULT '0',
  `nama_pemohon` varchar(100) NOT NULL,
  `no_wa` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `progress` enum('Belum','Selesai') NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`NIK`, `nama_pemohon`, `no_wa`, `alamat`, `id_jenis`, `tanggal_masuk`, `tanggal_ambil`, `progress`, `status`) VALUES
(160613024, 'Chandra Ramdhan Purnama', '083821896126', 'Jl. asdasd', 1, '2018-12-12', '2019-01-22', 'Selesai', 'Belum Diambil'),
(12213213213123, 'asdasdasd', '123123123', 'asdasdads', 1, '2019-01-11', '0000-00-00', 'Belum', 'Belum Diambil'),
(3204330306450005, 'Tedi Ruhyana', '083821896126', 'Kp. Saparako Rt 04 Rw 01', 1, '2018-06-18', '2018-06-19', 'Selesai', 'Diambil'),
(3204331705980002, 'Daffa Al Fariz', '', 'Kp. Sukaesih Rt 01 Rw 10', 2, '2019-01-01', '2019-01-08', 'Selesai', 'Diambil'),
(3204334201620002, 'Nonoh', '', 'Kp. Bojong Kaliki Rt 03 Rw 15', 4, '2018-11-06', '2018-11-20', 'Selesai', 'Belum Diambil'),
(3204334707800013, 'Evi Julianti', '', 'Kp. Cimaranggi Rt 02 Rw 03', 5, '2018-10-16', '2018-10-30', 'Selesai', 'Diambil'),
(3204336012760002, 'Dewi Ratna Wati', '', 'Kp. Saparako Rt 03 Rw 01', 7, '2018-10-02', '2018-10-16', 'Selesai', 'Belum Diambil'),
(3204336204820004, 'Sela', '', 'Kp. Cimaranggi Rt 03 Rw 03', 8, '2018-10-16', '2018-10-30', 'Selesai', 'Belum Diambil'),
(3204336204820008, 'Noneng', '', 'Kp. Cimaranggi Rt 03 Rw 03', 9, '2018-10-16', '2018-10-30', 'Selesai', 'Belum Diambil'),
(3205094403000004, 'Lilis Siti Nuraeni', '', 'Kp. Sinar Sari Rt 02 Rw 03', 10, '2018-09-11', '2018-10-15', 'Selesai', 'Belum Diambil'),
(9223372036854775807, 'asdasd', '213', '123123', 1, '2019-01-12', '2018-12-12', 'Belum', 'Belum Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
