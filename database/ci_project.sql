-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2022 at 05:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'wahyu', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `jenis_kelamin` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `ipk` varchar(125) NOT NULL,
  `pendidikan` varchar(125) NOT NULL,
  `pengalaman` varchar(125) NOT NULL,
  `tkd` varchar(125) NOT NULL,
  `wawancara` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`, `jenis_kelamin`, `alamat`, `ipk`, `pendidikan`, `pengalaman`, `tkd`, `wawancara`) VALUES
(12, 'wahyu', 'Laki-laki', 'sinaji', '4', '80', '80', '90', '100'),
(13, 'coding', 'Laki-laki', 'pakkalolo', '4', '70', '60', '100', '100'),
(14, 'saleh', 'Laki-laki', 'sinaji', '3', '100', '60', '80', '84'),
(15, 'wawal', 'Laki-laki', 'gowa', '3', '70', '70', '90', '84');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `dokumen` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `nama`, `dokumen`) VALUES
(7, 'coding', '1644775709_89ae4e64e23fb1836be7.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` int(11) NOT NULL,
  `foto` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dokumentasi`, `foto`) VALUES
(4, '1644719343_382ed6c21ce303390dbd.png'),
(5, '1647066631_260fb5483bc59fd02e9e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ketua`
--

CREATE TABLE `ketua` (
  `id_ketua` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ketua`
--

INSERT INTO `ketua` (`id_ketua`, `username`, `password`) VALUES
(1, 'ketua', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode` varchar(125) NOT NULL,
  `nama_kriteria` varchar(125) NOT NULL,
  `atribut` varchar(125) NOT NULL,
  `bobot` varchar(125) NOT NULL,
  `bobot_kalkulasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode`, `nama_kriteria`, `atribut`, `bobot`, `bobot_kalkulasi`) VALUES
(17, 'k02', 'IPK', 'Benefit', '4', 0.22222222222222),
(18, 'k03', 'Pendidikan', 'Benefit', '5', 0.27777777777778),
(19, 'k04', 'Pengalaman', 'Benefit', '5', 0.27777777777778),
(20, 'k05', 'Tes Kemampuan Dasar', 'Benefit', '3', 0.16666666666667),
(22, 'k07', 'Tes Wawancara', 'Benefit', '2', 0.11111111111111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `ketua`
--
ALTER TABLE `ketua`
  ADD PRIMARY KEY (`id_ketua`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ketua`
--
ALTER TABLE `ketua`
  MODIFY `id_ketua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
