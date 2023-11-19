-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 12:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qqms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `nama_supir` varchar(100) NOT NULL,
  `nama_kernet` varchar(100) NOT NULL,
  `nomor_polisi` varchar(10) NOT NULL,
  `nomor_shipment` varchar(100) NOT NULL,
  `jam_gate_out` datetime NOT NULL,
  `kapasitas_mt` int(11) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `nomor_lo` varchar(100) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `volume_lo` int(11) NOT NULL,
  `hasil_t2_tbbm` int(11) NOT NULL,
  `hasil_t2_diterima` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita_acara`
--

INSERT INTO `berita_acara` (`id`, `nomor_surat`, `nama_supir`, `nama_kernet`, `nomor_polisi`, `nomor_shipment`, `jam_gate_out`, `kapasitas_mt`, `tujuan`, `nomor_lo`, `produk`, `volume_lo`, `hasil_t2_tbbm`, `hasil_t2_diterima`, `status`, `created_at`, `created_by`) VALUES
(1, '00001/PND54D000/BA/2023', 'Tes', 'AA', 'BG18888P', 'asasa', '2023-11-17 20:28:00', 10, 'Palembang', '11', 'BBM', 11, 100, 0, 1, '2023-11-17 20:32:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sample_bbm`
--

CREATE TABLE `sample_bbm` (
  `id` int(11) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_release` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_bbm`
--

INSERT INTO `sample_bbm` (`id`, `asal`, `jenis`, `tanggal_masuk`, `tanggal_release`, `quantity`, `status`) VALUES
(2, 'penyaluran', 'pertalite', '2023-11-19', '2023-11-18', 144, 'release'),
(3, 'penyaluran', 'pertalite', '2023-11-19', '2023-11-22', 144, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, '', 'admin@admin.com', '$2a$10$AtwDTbHC7XMQDHyAWHHrQuJPWrb2ytHKAXg9sfW6BVHSHm78mdwXu', 0),
(2, 'test', 'a@g.com', '$2y$10$IDP9YT4tedmQGwgmSZh4XOm50PV4bCkO/8Aom6zzl9mlLNsrgZjki', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_bbm`
--
ALTER TABLE `sample_bbm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanggal_masuk` (`tanggal_masuk`),
  ADD KEY `tanggal_release` (`tanggal_release`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sample_bbm`
--
ALTER TABLE `sample_bbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
