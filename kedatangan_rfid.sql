-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 10:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kedatangan_rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `iog_in_pelajar`
--

CREATE TABLE `iog_in_pelajar` (
  `id_login` int(50) NOT NULL,
  `nama_pelajar` varchar(255) DEFAULT NULL,
  `masa` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iog_in_pelajar`
--

INSERT INTO `iog_in_pelajar` (`id_login`, `nama_pelajar`, `masa`) VALUES
(1, 'Pelajar 1', '2023-03-14 06:39:31'),
(2, 'Pelajar 2', '2023-03-14 06:37:31'),
(3, 'Pelajar 1', '2023-03-14 23:46:00'),
(4, 'Pelajar 2', '2023-03-15 00:10:00'),
(5, 'Pelajar 3', '2023-03-15 00:20:00'),
(6, 'Pelajar 4', '2023-03-15 00:02:00'),
(7, 'Pelajar 5', '2023-03-15 00:12:00'),
(8, 'Pelajar 6', '2023-03-14 23:58:00'),
(9, 'Pelajar 3', '2023-03-15 02:01:00'),
(10, 'Pelajar 5', '2023-03-15 01:55:00'),
(11, 'Pelajar 2', '2023-03-15 02:00:00'),
(12, 'Pelajar 4', '2023-03-15 02:06:00'),
(13, 'Pelajar 6', '2023-03-15 01:58:00'),
(14, 'Pelajar 1', '2023-03-15 01:56:00'),
(15, 'Pelajar 3', '2023-03-15 03:31:00'),
(16, 'Pelajar 5', '2023-03-15 03:29:00'),
(17, 'Pelajar 2', '2023-03-15 03:30:00'),
(18, 'Pelajar 4', '2023-03-15 03:36:00'),
(19, 'Pelajar 6', '2023-03-15 03:38:00'),
(20, 'Pelajar 1', '2023-03-15 03:36:00'),
(21, 'Pelajar 3', '2023-03-15 05:31:00'),
(22, 'Pelajar 5', '2023-03-15 05:59:00'),
(23, 'Pelajar 4', '2023-03-15 06:06:00'),
(24, 'Pelajar 6', '2023-03-15 06:08:00'),
(25, 'Pelajar 1', '2023-03-15 06:01:00'),
(26, 'Pelajar 3', '2023-03-15 07:30:00'),
(27, 'Pelajar 5', '2023-03-15 07:31:00'),
(28, 'Pelajar 4', '2023-03-15 07:35:00'),
(29, 'Pelajar 6', '2023-03-15 07:28:00'),
(30, 'Pelajar 1', '2023-03-15 07:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `id_pelajar` int(10) NOT NULL,
  `nama_pelajar` varchar(255) DEFAULT NULL,
  `ndp` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`id_pelajar`, `nama_pelajar`, `ndp`) VALUES
(1, 'Pelajar 1 ', 1111),
(2, 'Pelajar 2', 2222),
(3, 'Pelajar 3', 3333),
(4, 'Pelajar 4', 4444),
(5, 'Pelajar 5', 55555),
(6, 'Pelajar 6', 6666);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iog_in_pelajar`
--
ALTER TABLE `iog_in_pelajar`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`id_pelajar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iog_in_pelajar`
--
ALTER TABLE `iog_in_pelajar`
  MODIFY `id_login` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id_pelajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
