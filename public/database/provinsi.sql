-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2022 at 04:18 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `up_skaneda`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`, `created_at`, `updated_at`) VALUES
(11, 'ACEH', NULL, NULL),
(12, 'SUMATERA UTARA', NULL, NULL),
(13, 'SUMATERA BARAT', NULL, NULL),
(14, 'RIAU', NULL, NULL),
(15, 'JAMBI', NULL, NULL),
(16, 'SUMATERA SELATAN', NULL, NULL),
(17, 'BENGKULU', NULL, NULL),
(18, 'LAMPUNG', NULL, NULL),
(19, 'KEPULAUAN BANGKA BELITUNG', NULL, NULL),
(21, 'KEPULAUAN RIAU', NULL, NULL),
(31, 'DKI JAKARTA', NULL, NULL),
(32, 'JAWA BARAT', NULL, NULL),
(33, 'JAWA TENGAH', NULL, NULL),
(34, 'DI YOGYAKARTA', NULL, NULL),
(35, 'JAWA TIMUR', NULL, NULL),
(36, 'BANTEN', NULL, NULL),
(51, 'BALI', NULL, NULL),
(52, 'NUSA TENGGARA BARAT', NULL, NULL),
(53, 'NUSA TENGGARA TIMUR', NULL, NULL),
(61, 'KALIMANTAN BARAT', NULL, NULL),
(62, 'KALIMANTAN TENGAH', NULL, NULL),
(63, 'KALIMANTAN SELATAN', NULL, NULL),
(64, 'KALIMANTAN TIMUR', NULL, NULL),
(65, 'KALIMANTAN UTARA', NULL, NULL),
(71, 'SULAWESI UTARA', NULL, NULL),
(72, 'SULAWESI TENGAH', NULL, NULL),
(73, 'SULAWESI SELATAN', NULL, NULL),
(74, 'SULAWESI TENGGARA', NULL, NULL),
(75, 'GORONTALO', NULL, NULL),
(76, 'SULAWESI BARAT', NULL, NULL),
(81, 'MALUKU', NULL, NULL),
(82, 'MALUKU UTARA', NULL, NULL),
(91, 'PAPUA BARAT', NULL, NULL),
(94, 'PAPUA', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;