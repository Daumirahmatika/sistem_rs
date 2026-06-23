-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2026 at 01:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rs_pasien`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `akun_pasien`
--

CREATE TABLE `akun_pasien` (
  `id_akun` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_pasien`
--

INSERT INTO `akun_pasien` (`id_akun`, `id_pasien`, `username`, `password`) VALUES
(2, 2, 'daumi@123', '90713e229db1cf323183b08776f12ee2'),
(3, 3, 'noviana@111', 'a92e372a10e3bc8ecec27ee1d84ce2b0'),
(4, 4, 'nina@123', 'f599c58f684c33fd93036c0b33e99d8f'),
(5, 5, 'arin@123', 'f7ab141eab5540bac60ea5a7f1ebd505');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `jadwal_praktek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `jadwal_praktek`) VALUES
(1, 'Dr. Budi', 'Penyakit Dalam', 'senin-jum\'at (08.00 - 17.00)\r\n'),
(2, 'Dr. Sari', 'Kandungan', 'senin-jum\'at (08.00 - 17.00)'),
(3, 'Dr. Andi', 'Anak', 'senin-jum\'at (08.00 - 17.00)'),
(4, 'Dr. Rina', 'Gigi', 'senin-jum\'at (08.00 - 17.00)'),
(5, 'Dr. Subagustrian', 'Penyakit Dalam', 'Selasa (14.00 - 17.00)');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_akun_pasien` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal_kunjungan` datetime NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `status_pendaftaran` enum('menunggu','diterima','ditolak','proses') DEFAULT 'menunggu',
  `tanggal_daftar` datetime DEFAULT current_timestamp(),
  `status_selesai` enum('belum','sudah') DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id_akun_pasien`, `nama`, `tanggal_lahir`, `alamat`, `no_hp`, `keluhan`, `tanggal_kunjungan`, `id_dokter`, `status_pendaftaran`, `tanggal_daftar`, `status_selesai`) VALUES
(2, 2, 'daumi rahmatika', '2017-08-12', 'kp cadas', '0851767119099', 'batuk  lebih 7hari', '2026-06-15 20:01:00', 1, 'diterima', '2026-06-15 20:01:56', 'sudah'),
(3, 3, 'noviana uvitasari', '1997-11-02', 'kp. sepatan mauk\r\n', '085178719999', 'perikasa kandungan', '2026-06-15 20:24:00', 2, 'proses', '2026-06-15 20:24:24', 'sudah'),
(4, 4, 'nina sutina', '2009-06-15', 'kp lebak wangi', '085178781919', 'demam naik turun  3  hari', '2026-06-15 20:41:00', 1, 'diterima', '2026-06-15 20:41:26', 'sudah'),
(5, 5, 'Annas Arin', '2009-01-16', 'KP.rejekKK', '085176778788', 'pusing tugas', '2026-06-16 12:37:00', 1, 'ditolak', '2026-06-16 12:38:29', 'sudah'),
(6, 2, 'daumi rahmatika', '2017-08-12', 'kp cadas', '0851767119099', 'konsultasi gigi', '2026-06-16 15:29:00', 4, 'diterima', '2026-06-16 15:29:17', 'sudah'),
(7, 2, 'daumi rahmatika', '2017-08-12', 'kp cadas', '0851767119099', 'pilek', '2026-06-19 20:56:00', 1, 'menunggu', '2026-06-19 20:56:19', 'belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `akun_pasien`
--
ALTER TABLE `akun_pasien`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun_pasien`
--
ALTER TABLE `akun_pasien`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_pasien`
--
ALTER TABLE `akun_pasien`
  ADD CONSTRAINT `akun_pasien_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
