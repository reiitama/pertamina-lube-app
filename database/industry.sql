-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 09:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oilclini`
--

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `industryID` int(11) NOT NULL,
  `industryName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`industryID`, `industryName`) VALUES
(1, 'Steel'),
(2, 'Cement'),
(3, 'Marine'),
(4, 'Mining'),
(5, 'Power Generating'),
(6, 'Fleet'),
(7, 'Rail Road'),
(8, 'Petrochemical'),
(12, 'Keramik'),
(13, 'K3S'),
(18, 'Industri Keramik'),
(16, 'Industri Gas'),
(17, 'minyak dan gas'),
(19, 'Nilon'),
(20, 'Industri Kertas'),
(21, 'Industri Listrik'),
(22, 'Industri Semen'),
(23, 'Rental equipment'),
(24, 'Other'),
(26, 'Industri Plastik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `industryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
