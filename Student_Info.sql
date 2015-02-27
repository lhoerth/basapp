-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2015 at 10:12 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caseym_BAS`
--

-- --------------------------------------------------------

--
-- Table structure for table `Student_Info`
--

CREATE TABLE IF NOT EXISTS `Student_Info` (
  `Key` int(11) NOT NULL,
  `First` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Last` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `Degree` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Sid` int(9) NOT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Prereqs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Credits` int(255) NOT NULL,
  `Transcript` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `requestedDate` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Student_Info`
--
ALTER TABLE `Student_Info`
  ADD PRIMARY KEY (`Key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Student_Info`
--
ALTER TABLE `Student_Info`
  MODIFY `Key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
