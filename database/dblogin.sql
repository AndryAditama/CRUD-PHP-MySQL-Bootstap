-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2020 pada 10.30
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblogin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkategori`
--

CREATE TABLE `tbkategori` (
  `id_kategori` int(10) NOT NULL,
  `kategori_masakan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbkategori`
--

INSERT INTO `tbkategori` (`id_kategori`, `kategori_masakan`) VALUES
(13, 'Indonesian Food'),
(14, 'Chinese Food'),
(15, 'Japanese Food'),
(16, 'Korean Food');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbmasakan`
--

CREATE TABLE `tbmasakan` (
  `id_masakan` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbmasakan`
--

INSERT INTO `tbmasakan` (`id_masakan`, `id_kategori`, `kode`, `nama`, `keterangan`, `gambar`) VALUES
(5, 13, 'np', 'nasi padang', 'enaakk', 'wp1836235-final-fantasy-xv-wallpapers.png'),
(7, 15, '12', 'ramen', 'hhkj', 'wpp.jpg'),
(8, 13, '34', 'ayam goreng', 'aa', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`) VALUES
(1, 'Andry Aditama Putra', 'andry@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbmasakan`
--
ALTER TABLE `tbmasakan`
  ADD PRIMARY KEY (`id_masakan`),
  ADD KEY `relasi` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbmasakan`
--
ALTER TABLE `tbmasakan`
  MODIFY `id_masakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbmasakan`
--
ALTER TABLE `tbmasakan`
  ADD CONSTRAINT `relasi` FOREIGN KEY (`id_kategori`) REFERENCES `tbkategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
