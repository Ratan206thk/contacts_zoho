-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 02:21 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `secret` varchar(200) DEFAULT NULL,
  `contacts` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `secret`, `contacts`) VALUES
('hari@hari.har', '$2y$10$j9hBCw287FHSynAhOJFGsep/i.1AwHjzEVbfg/UcREfWw0N.66GEq', '$2y$10$Cj2dMEUHUjOIzN23hwLAoOJirDDWFAy4SisTWA21HQI1Bs3lhhFAa', '>sdff,84995894,tan206thk@ab.c>sds,8431894,ratan6thk@ab.c>sd,895894,ra06thk@ab.c>sff,8439589,rat6thk@ab.c>faas,84315995894,ratanaaa206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c'),
('manu@ma.nu', '$2y$10$8KocuRGQRzdVpg491P67ie5vKjL2ZOOU8q74TIDLKgFN.LkTV0EgW', '$2y$10$dSGvMPVeF/xOkL8B4tNZWepnBxS3nxCfK0XWvG/dAKdeIcMw8lSsG', '>sdff,84995894,tan206thk@ab.c>sds,8431894,ratan6thk@ab.c>sd,895894,ra06thk@ab.c>sff,8439589,rat6thk@ab.c>faas,84315995894,ratanaaa206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c'),
('ratan206thk@gmail.com', '$2y$10$7xx7eKm/O1wo607dIAuateQzXjNlJuLplKvFjlOIyvlY.CHQNxpLe', '$2y$10$gqkCXC5OsBa50Uy3I6ge/OdGMD7J/Bnp7dlqKdOLBDppS.RItLd9a', '>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c'),
('shyam@shy.sh', '$2y$10$dVt7Nm2EhShXNkVbZmPPLek8XeWOid3E.aXDYWw1GmIbr0M3.psBm', '$2y$10$xPoCycsh4qKFDujcFiS77.bxPVyJkLD02VtaRvnGJGbsBu2EbTmaq', '>sdff,84995894,tan206thk@ab.c>sds,8431894,ratan6thk@ab.c>sd,895894,ra06thk@ab.c>sff,8439589,rat6thk@ab.c>faas,84315995894,ratanaaa206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c>sdffs,8431995894,ratan206thk@ab.c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
