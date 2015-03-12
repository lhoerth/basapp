-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2015 at 12:41 AM
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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UUID` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`firstName`, `lastName`, `email`, `password`, `UUID`) VALUES
('Casey', 'Morris', 'jmorris26@mail.greenriver.edu', 'Password01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `Key` int(11) NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prereqs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Credits` int(255) NOT NULL,
  `Transcript` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requestedDate` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Student_Info`
--

INSERT INTO `Student_Info` (`Key`, `First`, `Last`, `Email`, `Phone`, `Degree`, `Sid`, `Status`, `Prereqs`, `Education`, `Credits`, `Transcript`, `requestedDate`) VALUES
(1, 'Dustin', 'Morris', 'jmorris26@mail.greenriver.edu', '1234567890', 'network', 0, 'ns', 'Magic', 'none', 0, 'transcripts/monkeysmile.jpg', NULL),
(2, 'Monkey', 'Island', 'mon@treasure.com', '1234567890', 'software', 890123123, 'cs', 'IT101', 'Ph.D.', 12, 'transcripts/monkeysmile.jpg', NULL),
(8, 'John', 'Smith', 'lhoerth@mail.greenriver.edu', '2535554444', 'network', 111111111, 'running-start', 'I build metal things.', 'Associates degree (AA, AS, AAS, AAS-T)', 131, 'transcripts/JVasjsY.png', '2015-02-27'),
(29, 'Tina', 'Ostrander', 'tostrander@greenriver.edu', '2533332222', 'software', 0, 'veteran ', 'core,201,Hi.', 'Master''s degree', 200, 'NULL', '2015-02-28'),
(10, 'JohnDos', 'SmithDos', 'lhoerth@mail.greenriver.edu', '2535552222', 'ud', 0, 'international runnin', 'I am indecisive. =)', 'GED', 35, 'transcripts/Capture.PNG', '2015-02-27'),
(31, 'Tina', 'Ostrander', 'tostrander@greenriver.edu', '2223334444', 'software', 0, 'veteran ', 'core,201,hello', 'Master''s degree', 200, 'NULL', '2015-03-01'),
(32, 'Tina', 'Ostrander', 'tostrander@greenriver.edu', '2223334444', 'software', 0, 'veteran ', 'core,201,hello', 'Master''s degree', 200, 'NULL', '2015-03-03'),
(30, 'Casey', 'Morris', 'mobiuswheel@gmail.com', '1231231234', 'network', 0, 'veteran internationa', 'CCENT,Test', 'Bachelor''s degree', 0, 'transcripts/Project2.pdf', '2015-03-01'),
(14, 'Gorge', 'Rodriguez', 'lhoerth@mail.greenriver.edu', '8775757775', 'ud', 0, 'veteran internationa', 'I love pasta. Yay me.', 'Associates degree (AA, AS, AAS, AAS-T)', 97, 'transcripts/Capture.PNG', '2015-02-27'),
(15, 'Smart', 'Water', 'mobiuswheel@gmail.com', '1111111111', 'ud', 0, 'NA', '', 'Master''s degree', 0, 'NULL', '2015-02-27'),
(16, 'Dr', 'Pepper', 'mobiuswheel@gmail.com', '1238761234', 'network', 0, 'veteran internationa', 'MTA,', 'Master''s degree', 0, 'transcripts/premium_flat_social_icon_set.png', '2015-02-27'),
(17, 'Mickey', 'Mouse', 'naidu.shristhy@live.com', '2535328333', 'ud', 0, 'international runnin', 'IT 201, IT 333, IT222', 'Master''s degree', 7, 'transcripts/AudienceAnalysis.pdf', '2015-02-27'),
(18, 'John', 'Smith', 'jsmith@mail.greenriver.edu', '2534445555', 'software', 0, 'veteran internationa', '201,190,121', 'GED', 0, 'transcripts/JVasjsY.png', '2015-02-27'),
(28, 'Casey', 'Morris', 'mobiuswheel@gmail.com', '1231231234', 'software', 0, 'veteran internationa', 'core,201,190', 'Associates degree (AA, AS, AAS, AAS-T)', 1, 'transcripts/Screen Shot 2015-01-31 at 1.06.48 PM.png', '2015-02-27'),
(19, 'John', 'Smith', 'lhoerth@mail.greenriver.edu', '2534445555', 'ud', 0, 'veteran internationa', 'asdf', 'GED', 1, 'transcripts/JVasjsY.png', '2015-02-27'),
(20, 'John', 'Smith', 'lhoerth@mail.greenriver.edu', '2534445555', 'ud', 0, 'veteran internationa', 'asdf', 'GED', 1, 'transcripts/JVasjsY.png', '2015-02-27'),
(21, 'John', 'Smith', 'gundarkz@gmail.com', '2534445555', 'ud', 0, 'veteran internationa', 'asdf', 'GED', 1, 'transcripts/JVasjsY.png', '2015-02-27'),
(22, 'Gorge', 'Rodriguez', 'lhoerth@mail.greenriver.edu', '8775757775', 'ud', 0, 'veteran internationa', 'I love pasta. Yay me.', 'Associates degree (AA, AS, AAS, AAS-T)', 97, 'transcripts/Capture.PNG', '2015-02-27'),
(23, 'Flat', 'Top', 'mobiuswheel@gmail.com', '3421231234', 'network', 765754123, 'veteran internationa', 'CCENT,MTA,Linux,102,240,Keep on the rockin', 'Bachelor''s degree', 20, 'transcripts/striketeam.jpg', '2015-02-27'),
(24, 'John', 'again', 'gundarkz@gmail.com', '2534445555', 'network', 845513513, 'veteran internationa', 'CCENT,MTA,Linux,Security', 'Associates degree (AA, AS, AAS, AAS-T)', 50, 'transcripts/JVasjsY.png', '2015-02-27'),
(25, 'Flat', 'Top', 'mobiuswheel@gmail.com', '3421231234', 'network', 765754123, 'veteran internationa', 'CCENT,MTA,Linux,102,240,Keep on the rockin', 'Bachelor''s degree', 20, 'transcripts/striketeam.jpg', '2015-02-27'),
(26, 'Flat', 'Top', 'casemorris@hotmail.com', '3421231234', 'network', 765754123, 'veteran internationa', 'CCENT,MTA,Linux,102,240,Keep on the rockin', 'Bachelor''s degree', 20, 'transcripts/striketeam.jpg', '2015-02-27'),
(27, 'Flat', 'Top', 'casemorris@hotmail.com', '3421231234', 'network', 765754123, 'veteran internationa', 'CCENT,MTA,Linux,102,240,Keep on the rockin', 'Bachelor''s degree', 20, 'transcripts/striketeam.jpg', '2015-02-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UUID`);

--
-- Indexes for table `Student_Info`
--
ALTER TABLE `Student_Info`
  ADD PRIMARY KEY (`Key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `UUID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `Student_Info`
--
ALTER TABLE `Student_Info`
  MODIFY `Key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
