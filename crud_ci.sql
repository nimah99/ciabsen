-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Des 2018 pada 01.48
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `idabsen` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(99) NOT NULL,
  `masuk` datetime NOT NULL,
  `pulang` datetime NOT NULL,
  `lembur` int(1) NOT NULL,
  `keterangan` varchar(99) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`idabsen`, `tanggal`, `nik`, `masuk`, `pulang`, `lembur`, `keterangan`, `status`) VALUES
('2018122212345', '2018-12-22', '12345', '2018-12-22 07:01:29', '0000-00-00 00:00:00', 0, 'Tepat', 0),
('2018122213456', '2018-12-22', '13456', '2018-12-22 07:01:36', '0000-00-00 00:00:00', 0, 'Tepat', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dept`
--

CREATE TABLE `dept` (
  `iddept` int(11) NOT NULL,
  `department` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dept`
--

INSERT INTO `dept` (`iddept`, `department`) VALUES
(1, 'Informasi Teknologi'),
(2, 'Human Resource Management'),
(3, 'Management'),
(4, 'Accounting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `idlvl` int(11) NOT NULL,
  `jabatan` varchar(99) NOT NULL,
  `gapok` varchar(12) NOT NULL,
  `makan` varchar(12) NOT NULL,
  `transport` varchar(12) NOT NULL,
  `kesehatan` varchar(12) NOT NULL,
  `tunj_jabatan` varchar(12) NOT NULL,
  `lembur` varchar(12) NOT NULL,
  `iddept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`idlvl`, `jabatan`, `gapok`, `makan`, `transport`, `kesehatan`, `tunj_jabatan`, `lembur`, `iddept`) VALUES
(1, 'Staff', '2500000', '1500000', '500000', '300000', '400000', '50000', 1),
(2, 'CEO', '25000000', '7500000', '1500000', '3000000', '4000000', '150000', 0),
(3, 'Manager', '7500000', '1750000', '750000', '1500000', '1400000', '75000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_kerja`
--

CREATE TABLE `jam_kerja` (
  `idkerja` int(11) NOT NULL,
  `mulai_masuk` time NOT NULL,
  `boleh_pulang` time NOT NULL,
  `lambat_masuk` int(11) NOT NULL,
  `lambat_pulang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam_kerja`
--

INSERT INTO `jam_kerja` (`idkerja`, `mulai_masuk`, `boleh_pulang`, `lambat_masuk`, `lambat_pulang`) VALUES
(1, '08:00:00', '17:00:00', 30, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `nik` varchar(99) NOT NULL,
  `name` varchar(225) NOT NULL,
  `gender` int(11) NOT NULL,
  `religion` int(11) NOT NULL,
  `tmpt_lahir` varchar(99) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `idlvl` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`nik`, `name`, `gender`, `religion`, `tmpt_lahir`, `tgl_lahir`, `telp`, `alamat`, `idlvl`, `foto`) VALUES
('12345', 'antoni', 2, 3, 'jakarta', '1994-11-03', '3494955894', 'jakarta', 1, '../gambar/f22819a2dfe7e71d7de6e4c60b0703f6.jpeg'),
('13456', 'channel', 2, 3, 'jakarta', '1994-07-09', '3494955894', 'jakarta', 2, '../gambar/f49cfe4dc81f5d435423bffaeec19f66.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `u`
--

CREATE TABLE `u` (
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` int(11) NOT NULL,
  `created` date NOT NULL,
  `nik` varchar(99) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `u`
--

INSERT INTO `u` (`email`, `password`, `level`, `created`, `nik`, `status`) VALUES
('nimah', '$2y$12$FvVRIMvSzyBkyV7AHTEMO.fhuYXlNhxQ6oIJKr.cH9WhyfXZsE/3i', 1, '0000-00-00', '', 0),
('users', '$2y$12$Ai5CCOFuu33NT8.4se1NWewiYlb69JM4mYNtiq0XOo0nREYC8MJ4m', 2, '2018-12-07', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`idabsen`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`iddept`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idlvl`);

--
-- Indexes for table `jam_kerja`
--
ALTER TABLE `jam_kerja`
  ADD PRIMARY KEY (`idkerja`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `u`
--
ALTER TABLE `u`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `iddept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idlvl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jam_kerja`
--
ALTER TABLE `jam_kerja`
  MODIFY `idkerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
