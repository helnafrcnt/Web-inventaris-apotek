-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2021 pada 01.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_BARANG` varchar(30) NOT NULL,
  `BENTUK` varchar(30) NOT NULL,
  `KETERANGAN_BARANG` varchar(255) NOT NULL,
  `JUMLAH` varchar(30) NOT NULL,
  `TOTAL` varchar(255) NOT NULL,
  `ID_JENIS` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_BARANG`, `BENTUK`, `KETERANGAN_BARANG`, `JUMLAH`, `TOTAL`, `ID_JENIS`) VALUES
(1, 'Konidin', 'Tablet', 'Bagus', '90', '100', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `ID_DETAIL_TRANSAKSI` int(5) NOT NULL,
  `ID_TRANSAKSI` int(5) NOT NULL,
  `ID_BARANG` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`ID_DETAIL_TRANSAKSI`, `ID_TRANSAKSI`, `ID_BARANG`) VALUES
(23, 1, 1),
(24, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `ID_JENIS` int(5) NOT NULL,
  `NAMA_JENIS` varchar(30) NOT NULL,
  `KETERANGAN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`ID_JENIS`, `NAMA_JENIS`, `KETERANGAN`) VALUES
(1, 'Obat Batuk', '-'),
(2, 'Obat Panas', '-'),
(3, 'Vitamin', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `ID_PETUGAS` int(5) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `NAMA_PETUGAS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `USERNAME`, `PASSWORD`, `NAMA_PETUGAS`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'elang', 'elangg', 'Elang Eka Marga Putra'),
(3, 'helna', 'helnacans', 'Helna'),
(4, 'taufik', 'taufikgans', 'Taufik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `TANGGAL_TRANSAKSI` date NOT NULL,
  `STATUS_TRANSAKSI` varchar(30) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `JUMLAH_MASUK` varchar(255) DEFAULT '0',
  `JUMLAH_KELUAR` varchar(255) DEFAULT '0',
  `ID_PETUGAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `TANGGAL_TRANSAKSI`, `STATUS_TRANSAKSI`, `ID_BARANG`, `JUMLAH_MASUK`, `JUMLAH_KELUAR`, `ID_PETUGAS`) VALUES
(1, '2021-01-14', 'Masuk', 1, '100', '0', 2),
(2, '2021-01-14', 'Keluar', 1, '0', '10', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `FK_MENENTUKAN` (`ID_JENIS`) USING BTREE;

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`ID_DETAIL_TRANSAKSI`),
  ADD KEY `FK_MEMERIKSA` (`ID_TRANSAKSI`),
  ADD KEY `FK_MENDETAIL` (`ID_BARANG`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `ID_DETAIL_TRANSAKSI` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
