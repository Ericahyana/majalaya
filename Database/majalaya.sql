-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Sep 2019 pada 10.35
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `histori`
--

CREATE TABLE `histori` (
  `id_histori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `action` text NOT NULL,
  `tgl_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori`
--

INSERT INTO `histori` (`id_histori`, `id_user`, `action`, `tgl_dibuat`) VALUES
(2, 3, 'pelayanan telah login', '2019-09-01 07:37:01'),
(3, 3, 'pelayanan telah login', '2019-09-01 07:37:59'),
(4, 3, 'pelayanan telah login', '2019-09-01 07:39:55'),
(5, 3, 'pelayanan telah login', '2019-09-01 12:42:20'),
(6, 3, 'pelayanan telah login', '2019-09-01 13:11:13'),
(7, 3, 'Telah menambahkan PENERBITAN KK', '2019-09-01 08:19:39'),
(8, 3, 'Telah Mengubah Status NIK : 12213213213123', '2019-09-01 08:41:38'),
(9, 3, 'Telah Mengubah Status NIK : 3204336012760002', '2019-09-01 08:42:01'),
(10, 0, 'Telah Mengubah Status Nik : 160613024', '2019-09-01 08:45:29'),
(11, 3, 'Telah Mengubah Status Nik : 160613024', '2019-09-01 08:46:19'),
(12, 3, 'Telah Mengubah Status NIK : 3204336204820004 Menjadi Sudah Diambil', '2019-09-01 08:48:12'),
(13, 0, 'Telah Menghapus Pengajuan Nik : 9223372036854775807', '2019-09-01 13:53:06'),
(14, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 13:57:53'),
(15, 3, ' Telah Logout', '2019-09-01 14:32:28'),
(16, 3, 'pelayanan telah login', '2019-09-01 14:32:38'),
(17, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 14:37:18'),
(18, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 14:38:33'),
(19, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 14:41:01'),
(20, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 14:43:25'),
(21, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 14:45:18'),
(22, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 14:52:36'),
(23, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 15:28:11'),
(24, 3, 'Telah Mengirim WA ke NIK : 160613024', '2019-09-01 15:29:16'),
(25, 3, ' Telah Logout', '2019-09-01 15:31:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
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
-- Struktur dari tabel `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `id_dokumen` int(11) NOT NULL,
  `NIK` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelengkapan`
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
-- Struktur dari tabel `pengajuan`
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
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`NIK`, `nama_pemohon`, `no_wa`, `alamat`, `id_jenis`, `tanggal_masuk`, `tanggal_ambil`, `progress`, `status`) VALUES
(160613024, 'Chandra Ramdhan Purnama', '08986897962', 'Jl. asdasd', 1, '2018-12-12', '2019-01-22', 'Selesai', 'Belum Diambil'),
(12213213213123, 'asdasdasd', '123123123', 'asdasdads', 1, '2019-01-11', '0000-00-00', 'Selesai', 'Diambil'),
(3204330306450005, 'Tedi Ruhyana', '083821896126', 'Kp. Saparako Rt 04 Rw 01', 1, '2018-06-18', '2018-06-19', 'Selesai', 'Diambil'),
(3204331705980002, 'Daffa Al Fariz', '', 'Kp. Sukaesih Rt 01 Rw 10', 2, '2019-01-01', '2019-01-08', 'Selesai', 'Diambil'),
(3204334201620002, 'Nonoh', '083100627610', 'Kp. Bojong Kaliki Rt 03 Rw 15', 4, '2018-11-06', '2018-11-20', 'Selesai', 'Diambil'),
(3204334707800013, 'Evi Julianti', '', 'Kp. Cimaranggi Rt 02 Rw 03', 5, '2018-10-16', '2018-10-30', 'Selesai', 'Diambil'),
(3204336012760002, 'Dewi Ratna Wati', '', 'Kp. Saparako Rt 03 Rw 01', 7, '2018-10-02', '2018-10-16', 'Selesai', 'Diambil'),
(3204336204820004, 'Sela', '', 'Kp. Cimaranggi Rt 03 Rw 03', 8, '2018-10-16', '2018-10-30', 'Selesai', 'Diambil'),
(3204336204820008, 'Noneng', '', 'Kp. Cimaranggi Rt 03 Rw 03', 9, '2018-10-16', '2018-10-30', 'Selesai', 'Belum Diambil'),
(3205094403000004, 'Lilis Siti Nuraeni', '', 'Kp. Sinar Sari Rt 02 Rw 03', 10, '2018-09-11', '2018-10-15', 'Selesai', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'camat', 'camat', '21232f297a57a5a743894a0e4a801fc3', 'camat'),
(3, 'Sumanto', 'pelayanan', '21232f297a57a5a743894a0e4a801fc3', 'pelayanan'),
(4, 'eri', 'ericahyana', '202cb962ac59075b964b07152d234b70', 'pelayanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id_histori`);

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
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
