-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 12:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
(1, 'Pelajar 1', '2023-03-14 06:37:31'),
(2, 'Pelajar 2', '2023-03-14 06:37:31');

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
  MODIFY `id_login` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id_pelajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
