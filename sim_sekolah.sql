-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 04:54 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

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
-- Table structure for table `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id` int(11) NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `kode_guru` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `kode_administrasi` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_administrasi` varchar(25) NOT NULL,
  `kelamin` varchar(11) NOT NULL,
  `agama` varchar(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(25) NOT NULL,
  `id_hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`kode_administrasi`, `foto`, `nip`, `password`, `nama_administrasi`, `kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `id_hak_akses`) VALUES
(1, 'doodle-cool4.png', '2019', '123456', 'Rika', 'Perempuan', 'Islam', 'Pekanbaru', '2019-05-01', 'Jl. Thamrin No.32', '084574836581', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `kode_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`kode_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `kode_catatan` int(11) NOT NULL,
  `judul_catatan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(10) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`kode_catatan`, `judul_catatan`, `tanggal`, `jam`, `isi`) VALUES
(1, 'Kunjungan Sekolah SMK 2', '2019-05-17', '10:00', 'Kunjungan SMK 2 Dalam Rangka Melihat Sistem Cara Mengajar.');

-- --------------------------------------------------------

--
-- Table structure for table `dana`
--

CREATE TABLE `dana` (
  `kode_dana` int(11) NOT NULL,
  `jumlah_dana` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dana`
--

INSERT INTO `dana` (`kode_dana`, `jumlah_dana`, `tanggal`, `keterangan`, `jenis`) VALUES
(1, '100000', '2019-05-01', 'Dana BOS', 'masuk'),
(2, '325000', '2019-05-22', 'Uang SPP', 'masuk'),
(3, '100000', '2019-06-16', 'Dana BOS', 'masuk'),
(4, '100000', '2019-06-16', 'Dana BOS', 'masuk'),
(5, '1000000', '2019-06-16', 'Camping', 'keluar');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_guru` varchar(25) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `kelamin` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(25) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `foto`, `nama_guru`, `nip`, `password`, `kelamin`, `agama`, `alamat`, `no_telpon`, `tempat_lahir`, `tanggal_lahir`, `id_hak_akses`) VALUES
(1, 'test', 'Kurnia Rahman Agus, S.T.T', '123456', '123456', 'Laki-Laki', 'Islam', 'Bukit Raya', '082274758495', 'Pekanbaru', '2019-05-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `hak_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `hak_akses`) VALUES
(1, 'guru'),
(2, 'siswa'),
(3, 'administrasi'),
(4, 'perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Akuntansi'),
(3, 'Teknik Komputer Jaringan'),
(5, 'Administrasi Perkantoran'),
(7, 'Akuntansi Khusus'),
(8, 'Penjualan');

-- --------------------------------------------------------

--
-- Table structure for table `kas_siswa`
--

CREATE TABLE `kas_siswa` (
  `id` int(11) NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_guru` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bayar`
--

CREATE TABLE `kategori_bayar` (
  `kode_bayar` int(11) NOT NULL,
  `jenis_bayar` varchar(30) NOT NULL,
  `jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_bayar`
--

INSERT INTO `kategori_bayar` (`kode_bayar`, `jenis_bayar`, `jumlah`) VALUES
(1, 'SPP KELAS KHUSUS', '325000'),
(3, 'SPP', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bayar_pmb`
--

CREATE TABLE `kategori_bayar_pmb` (
  `kode_bayar_pmb` int(11) NOT NULL,
  `jenis_bayar` varchar(30) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_bayar_pmb`
--

INSERT INTO `kategori_bayar_pmb` (`kode_bayar_pmb`, `jenis_bayar`, `jumlah`) VALUES
(1, 'Pembangunan Khusus', 7250000),
(2, 'Pembangunan', 7000000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kelas`
--

CREATE TABLE `kategori_kelas` (
  `id_kategori_kelas` int(11) NOT NULL,
  `tingkat_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_kelas`
--

INSERT INTO `kategori_kelas` (`id_kategori_kelas`, `tingkat_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` int(11) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `tingkat_kelas` varchar(11) NOT NULL,
  `kode_ajaran` int(11) NOT NULL,
  `tahun_angkatan` varchar(15) NOT NULL,
  `kode_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_jurusan`, `tingkat_kelas`, `kode_ajaran`, `tahun_angkatan`, `kode_guru`) VALUES
(3, 'Rekayasa Perangkat Lunak', 'XI', 1, '2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `nis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `kode_kelas`, `nis`) VALUES
(15, 3, 171619),
(16, 3, 171618);

-- --------------------------------------------------------

--
-- Table structure for table `kum`
--

CREATE TABLE `kum` (
  `id` int(11) NOT NULL,
  `kode_siswa` int(11) NOT NULL,
  `kode_guru` int(11) NOT NULL,
  `jumlah` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kode_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembangunan`
--

CREATE TABLE `pembangunan` (
  `kode_pembangunan` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `kode_bayar_pmb` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_bayar` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembangunan`
--

INSERT INTO `pembangunan` (`kode_pembangunan`, `nis`, `kode_bayar_pmb`, `tanggal`, `jumlah_bayar`) VALUES
(3, 171618, 1, '2019-05-28', 6950000),
(9, 171619, 1, '2019-05-28', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `kode_profile` int(11) NOT NULL,
  `kepala_sekolah` varchar(25) NOT NULL,
  `npsn` int(11) NOT NULL,
  `nss` int(15) NOT NULL,
  `nama_sekolah` varchar(25) NOT NULL,
  `akreditasi` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` varchar(15) NOT NULL,
  `nomor_telpon` int(15) NOT NULL,
  `nomor_faks` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `situs` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(25) NOT NULL,
  `ortu_lk` varchar(25) NOT NULL,
  `ortu_pr` varchar(25) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `password` varchar(6) NOT NULL,
  `id_hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kode_siswa`, `nis`, `foto`, `nama_siswa`, `kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telpon`, `ortu_lk`, `ortu_pr`, `asal_sekolah`, `password`, `id_hak_akses`) VALUES
(4, 171619, 'doodle-cool4.png', 'Kristian Kamsari', 'Laki-Laki', 'Kristen', 'Pekanbaru', '2019-05-01', 'Jondul Baru', '0842947147311', 'Suparjo', 'Suparji', 'SMP Kalam Kudus', '123456', 2),
(7, 171618, 'designmahkota3.png', 'Dimas Aditya Mukhsinin', 'Laki-Laki', 'Islam', 'Pekanbaru', '2019-05-31', 'Jl.Purwodadi - Riau,Pekanbaru', '082268186048', 'Suparjo', 'Suparji', 'SMP Plus Terpadu', '123456', 2);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `kode_bayar` int(11) NOT NULL,
  `kode_bulan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `nis`, `kode_bayar`, `kode_bulan`, `tanggal`, `tahun_ajaran`) VALUES
(23, 171619, 1, 4, '2019-05-02', '2018/2019'),
(44, 171619, 1, 7, '2019-05-30', '2018/2019'),
(45, 171619, 1, 4, '2019-05-16', '2018/2019'),
(47, 171618, 1, 1, '2019-05-17', '2018/2019'),
(48, 171618, 1, 2, '2019-05-03', '2018/2019'),
(49, 171618, 1, 1, '2019-05-17', '2018/2019');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `kode_ajaran` int(11) NOT NULL,
  `tahun_ajar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`kode_ajaran`, `tahun_ajar`) VALUES
(1, '2018/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`kode_administrasi`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`kode_bulan`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`kode_catatan`);

--
-- Indexes for table `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`kode_dana`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `kas_siswa`
--
ALTER TABLE `kas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_bayar`
--
ALTER TABLE `kategori_bayar`
  ADD PRIMARY KEY (`kode_bayar`);

--
-- Indexes for table `kategori_bayar_pmb`
--
ALTER TABLE `kategori_bayar_pmb`
  ADD PRIMARY KEY (`kode_bayar_pmb`);

--
-- Indexes for table `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  ADD PRIMARY KEY (`id_kategori_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `kum`
--
ALTER TABLE `kum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembangunan`
--
ALTER TABLE `pembangunan`
  ADD PRIMARY KEY (`kode_pembangunan`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`kode_profile`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode_siswa`) USING BTREE,
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`kode_ajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `kode_administrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `kode_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `kode_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dana`
--
ALTER TABLE `dana`
  MODIFY `kode_dana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `kode_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `kode_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kas_siswa`
--
ALTER TABLE `kas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_bayar`
--
ALTER TABLE `kategori_bayar`
  MODIFY `kode_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_bayar_pmb`
--
ALTER TABLE `kategori_bayar_pmb`
  MODIFY `kode_bayar_pmb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_kelas`
--
ALTER TABLE `kategori_kelas`
  MODIFY `id_kategori_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kum`
--
ALTER TABLE `kum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembangunan`
--
ALTER TABLE `pembangunan`
  MODIFY `kode_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `kode_profile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `kode_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `kode_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
