-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 06:01 PM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `no_disposisi` int(11) NOT NULL,
  `kepada` varchar(30) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status_surat` varchar(30) DEFAULT NULL,
  `tanggapan` varchar(30) DEFAULT '',
  `keputusan` varchar(7) DEFAULT NULL,
  `id_sm` int(11) DEFAULT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`no_disposisi`, `kepada`, `keterangan`, `status_surat`, `tanggapan`, `keputusan`, `id_sm`, `id_sk`, `id_user`) VALUES
(5, 'DEMO', 'TEST', 'Sudah ditanggapi', 'Tindak Lanjut', 'ACC', 7, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenissurat` int(11) NOT NULL,
  `jenis_surat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenissurat`, `jenis_surat`) VALUES
(1, 'Surat Pemberitahuan'),
(2, 'Surat Keputusan'),
(3, 'Surat Perintah'),
(4, 'Surat Permintaan'),
(5, 'Surat Panggilan'),
(6, 'Surat Peringatan'),
(7, 'Surat Perjanjian'),
(8, 'Surat Laporan'),
(9, 'Surat Pengantar'),
(10, 'Surat Penawaran'),
(11, 'Surat Pemesanan'),
(12, 'Surat Undangan');

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `loker` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `loker`) VALUES
(1, 'Loker 1'),
(2, 'Loker 2'),
(3, 'Loker 3'),
(4, 'Loker 4');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_sk` int(11) NOT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `no_surat` varchar(15) DEFAULT NULL,
  `penerima` varchar(30) DEFAULT NULL,
  `perihal` varchar(30) DEFAULT NULL,
  `pict` blob DEFAULT NULL,
  `id_jenissurat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_sk`, `tgl_kirim`, `no_surat`, `penerima`, `perihal`, `pict`, `id_jenissurat`) VALUES
(9, '2022-08-21', 'SMK/XVII/765', 'DDD', 'SP', 0x436170747572652e4a5047, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `no_surat` varchar(15) DEFAULT NULL,
  `pengirim` varchar(30) DEFAULT NULL,
  `perihal` varchar(30) DEFAULT NULL,
  `pict` blob DEFAULT NULL,
  `id_jenissurat` int(11) DEFAULT NULL,
  `id_loker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `tgl_terima`, `tgl_kirim`, `no_surat`, `pengirim`, `perihal`, `pict`, `id_jenissurat`, `id_loker`) VALUES
(5, '2022-08-21', '2022-08-22', 'SMK/XVII/766', 'DDD', 'SP', 0x436170747572652e4a5047, 1, 1),
(6, '2022-08-21', '2022-08-22', 'SMK/XVII/766', 'DDD', 'SP', 0x32303138303530365f3036303934362d50414e4f2e6a7067, 1, 1),
(7, '2022-08-21', '2022-08-22', 'SMK/XVII/766', 'DDD', 'SP', 0x32303138303530365f3036303934362d50414e4f2e6a7067, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(30) DEFAULT NULL,
  `nama_belakang` varchar(30) DEFAULT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(15) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `username`, `password`, `status`, `level`) VALUES
(1, 'Dominic', 'Archiver', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif', 'Admin'),
(2, 'Abdi', 'Karya', 'ak17', '202cb962ac59075b964b07152d234b70', 'Tidak Aktif', 'User'),
(3, 'Demo', 'Susanto', 'abdi', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif', 'User'),
(5, 'Dwiki', 'Herdiansyah', 'dwiki', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif', 'Archiver'),
(6, 'Dwiki', 'Herdiansyah', 'ddw', 'c4ca4238a0b923820dcc509a6f75849b', 'Aktif', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`no_disposisi`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenissurat`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `no_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenissurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
