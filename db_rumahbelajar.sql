-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 02 Sep 2018 pada 19.35
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
-- Struktur dari tabel `tblanggota`
--

CREATE TABLE `tblanggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblanggota`
--

INSERT INTO `tblanggota` (`id_anggota`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `alamat`, `no_hp`, `status`) VALUES
(67, 'budi', 'wibowo', 'Pria', 'jambi', '08127896697', 'Aktif');

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
  `status` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `sinopsis` varchar(100) NOT NULL,
  `book` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblbuku`
--

INSERT INTO `tblbuku` (`id_buku`, `judul_buku`, `id_kategori`, `penulis`, `stok`, `penerbit`, `isbn`, `tahun_terbit`, `tgl_input`, `status`, `gambar`, `sinopsis`, `book`) VALUES
(34, '1', 1, '111', 1, '1', '1', 1990, '2018-05-05 19:30:39', 'Baru', '', '', 0),
(35, '2', 2, '22', 2, '2', '2', 222, '2018-05-05 19:43:08', 'Baru', '', '', 0),
(36, 'test', 1, 'test', 1, 'test', '11', 11, '2018-07-08 21:04:07', 'Baru', '', 'suatu hari', 0),
(37, 'test22', 1, '1', 2, '2', '2', 2015, '2018-07-08 22:15:46', 'Baru', 'Screen Shot 2018-07-06 at 22.02.13.png', 'oke', 0);

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
-- Struktur dari tabel `tblpeminjaman`
--

CREATE TABLE `tblpeminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_anggota` varchar(100) NOT NULL,
  `id_buku` varchar(100) NOT NULL,
  `tgl_awal_peminjaman` varchar(100) NOT NULL,
  `tgl_akhir_peminjaman` varchar(100) DEFAULT NULL,
  `tgl_pengembalian` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `jml_pinjam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblpengembalian`
--

CREATE TABLE `tblpengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_anggota` varchar(100) NOT NULL,
  `id_buku` varchar(100) NOT NULL,
  `tgl_pengembalian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'admin', 'admin', 'admin', 'admin', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbltransaksi`
--

CREATE TABLE `tbltransaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblanggota`
--
ALTER TABLE `tblanggota`
  ADD PRIMARY KEY (`id_anggota`);

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
-- Indexes for table `tblpeminjaman`
--
ALTER TABLE `tblpeminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tblpengembalian`
--
ALTER TABLE `tblpengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblanggota`
--
ALTER TABLE `tblanggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tblbuku`
--
ALTER TABLE `tblbuku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT for table `tblpeminjaman`
--
ALTER TABLE `tblpeminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblpengembalian`
--
ALTER TABLE `tblpengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblpengguna`
--
ALTER TABLE `tblpengguna`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
