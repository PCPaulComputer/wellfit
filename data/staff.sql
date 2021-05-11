
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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

INSERT INTO `staff` (`firstname`, `lastname`, `staffid`, `position`, `hire`, `username`, `password`) VALUES
('Admin', 'Admin', 100100, 'Admin', '0000-00-00', 'admin', 'AdminSystem'),
('Lakesha', 'Thomes', 445461, 'Staff', '0000-00-00', 'lakesha.thomes', 'lakesha123'),
('Jirae', 'Lomo', 456135, 'Staff', '0000-00-00', 'jirae.limo', 'jirae123'),
('Kasim', 'Brascal', 325971, 'Staff', '0000-00-00', 'kasim.brascal', 'kasim123'),
('Roy', 'Thomson', 789143, 'Staff', '0000-00-00', 'roy.thomson', 'roy123');
