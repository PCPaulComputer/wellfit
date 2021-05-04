-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2019 at 08:06 PM
-- Server version: 5.1.73
-- PHP Version: 5.5.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `000390255`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `staffid` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `hire` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`staffid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`firstname`, `lastname`, `staffid`, `position`, `hire`, `username`, `password`) VALUES
('Admin', 'Admin', 100100, 'Admin', '0000-00-00', 'admin', 'AdminSystem'),
('Lakesha', 'Thomes', 445461, 'Staff', '0000-00-00', 'lakesha.thomes', 'lakesha123'),
('Jirae', 'Lomo', 456135, 'Staff', '0000-00-00', 'jirae.limo', 'jirae123'),
('Kasim', 'Brascal', 325971, 'Staff', '0000-00-00', 'kasim.brascal', 'kasim123'),
('Roy', 'Thomson', 789143, 'Staff', '0000-00-00', 'roy.thomson', 'roy123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
