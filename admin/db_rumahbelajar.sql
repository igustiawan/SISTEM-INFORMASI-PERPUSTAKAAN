-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05 Mei 2018 pada 14.49
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahbelajar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbuku`
--

CREATE TABLE `tblbuku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `id_kategori` int(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblbuku`
--

INSERT INTO `tblbuku` (`id_buku`, `judul_buku`, `id_kategori`, `penulis`, `stok`, `penerbit`, `isbn`, `tahun_terbit`, `tgl_input`, `status`) VALUES
(33, 'gusti', 3, 'gusti', 1, 'gusti', '1', 2014, '2018-03-22 21:52:30', 'Rusak'),
(34, '1', 1, '111', 1, '1', '1', 1990, '2018-05-05 19:30:39', 'Baru'),
(35, '2', 2, '22', 2, '2', '2', 222, '2018-05-05 19:43:08', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkategori`
--

CREATE TABLE `tblkategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tblkategori`
--

INSERT INTO `tblkategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Matematika'),
(2, 'Inggris'),
(3, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpengguna`
--

CREATE TABLE `tblpengguna` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblpengguna`
--

INSERT INTO `tblpengguna` (`user_id`, `username`, `password`, `nama_depan`, `nama_belakang`, `status`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', 'Aktif'),
(3, 'gusti', '111', 'gusti', 'gusti', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `category_id` (`id_kategori`),
  ADD KEY `classid` (`id_kategori`);

--
-- Indexes for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbuku`
--
ALTER TABLE `tblbuku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
