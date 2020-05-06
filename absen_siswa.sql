-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2020 pada 11.22
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `kode_absen` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `metode` varchar(35) NOT NULL,
  `status_kehadiran` enum('hadir','terlambat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`kode_absen`, `nis`, `tanggal`, `jam`, `metode`, `status_kehadiran`) VALUES
(2, 171618, '2019-07-20', '21:59:26', '1', 'terlambat'),
(3, 171618, '2019-07-21', '08:56:26', '1', 'terlambat'),
(4, 171618, '2019-07-29', '19:53:36', '1', 'terlambat'),
(5, 171618, '2019-08-03', '14:13:45', '1', 'terlambat'),
(6, 171618, '2019-08-04', '16:28:55', '1', 'terlambat'),
(7, 171618, '2019-08-05', '09:14:42', '1', 'terlambat'),
(8, 171717, '2019-08-05', '09:34:04', '1', 'terlambat'),
(10, 11010, '2019-08-06', '10:00:00', '1', 'terlambat'),
(11, 171618, '2020-01-28', '11:23:58', '1', 'terlambat'),
(12, 171618, '2020-02-06', '16:14:06', '1', 'terlambat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`kode_absen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `kode_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
