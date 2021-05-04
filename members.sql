SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `membershipdate` date NOT NULL,
  `accommodation` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`firstname`, `lastname`, `id`, `age`, `address`, `membershipdate`, `accommodation`) VALUES
(' Brenda', 'House', 1000, 56, '10 main Street', '2012-12-12', '      afdsafdasdsadsaas  '),
('Simon ', 'Peters', 1001, 25, '', '2019-06-01', NULL),
('Bethsaida ', 'Andrews', 1002, 0, '', '0000-00-00', NULL),
('James', 'Burgess', 1003, 25, '', '0000-00-00', NULL),
('Galvin', 'Phillips', 1004, 26, '', '0000-00-00', NULL),
('Jada', 'Tadeo', 1005, 46, '', '2019-06-04', NULL),
('Bart', 'Season', 1006, 45, '', '2019-06-01', NULL),
('Tomas', 'Diloronso', 1007, 24, '', '2019-06-05', NULL),
('Matthew', 'Cinaughfe', 1008, 23, '', '2019-06-01', NULL),
('Zia', 'Simon', 1009, 35, '', '2019-06-02', NULL),
('dsffsdf', 'dsfsdfsd', 1052, 5624, 'sdasdasdasdasdasdsad', '2015-01-01', '     fdgdsgasgasdvxzcvxzcvczvvsrfegx           '),
('fgjgdgh', 'hfhdhd', 1054, 45, 'fgfgfgfgjdfgjf', '2015-01-01', '         vnnbncbc       '),
('vjfxfgx', 'gxfjfx', 1078, 120, 'vjvjkfg', '2015-01-01', '            hjhjhhhgg    '),
('John', 'Smith', 1234, 52, 'John St', '2012-12-12', '             cxvxcvxcvzx   '),
('Peter', 'Griffin', 1235, 62, '10 Avenue St.', '2015-06-05', '        safsafaf        '),
('Halo', 'Cybollien', 5482, 32, '1000 Market Road', '2017-11-20', '            Fit'),
('Laroche', 'Petrousch', 5831, 56, '10 Avenue St.', '2015-12-12', '              vdsvsdcasdasdasdas  '),
('Jeu', 'Mon', 3423, 25, '10 Avenue Street', '2014-12-12', '                vbncbzddfsfsdfsdf'),
('Kei', 'More', 4258, 78, '34 Road Road', '2013-06-05', '            '),
('Lois', 'Griffin', 1486, 52, '10 Ermitano Road', '2018-05-04', 'dzsfsdfasfasa'),
('13213', '31213213', 213213, 23, 'dsggsdgdfg', '2015-01-01', '            '),
('Monty', 'Python', 1426, 35, '10 Avenue Avenue', '2015-04-06', 'ok    '),
('1233', '4611', 1466, 56, '15 Main Road', '2015-05-06', '       gfsdfasassd         '),
('Kieran', 'Knows', 4267, 23, '10 Avenue Street', '2016-12-12', 'Hello World        '),
('cxvcv', 'cvcvxc', 1026, 56, '45 Avenue Street', '2018-01-03', '            sdsadasdsaddfsdfsdzdf'),
('4654', '466', 4652, 56, 'zvsdvgwgvsdf', '2015-11-20', '            fsdfsdfsdfsdf'),
('Andres', 'Sandoval', 6345, 36, '10 Delmonte Road', '2017-12-12', '         fdgdfgfdgdfgfdgsdewds   '),
('Amir', 'Yecho', 3478, 34, '34 Para Street', '2016-11-20', '           fdfsdfsdfsdfsdfsdf '),
('Chloe', 'Cardashitu', 7891, 45, '67 Main Street', '2017-04-06', 'dsfdsfdsfsdfvfdbyjytmgh '),
('vcxvc123', 'vcxvcx1212', 2343, 56, 'dsfasdfddsfsd', '2018-04-05', ' dsfsdfsdf           '),
('121212', '212121', 2212, 56, '67 gewpjergiobgfdgdf', '2019-01-05', '        vbnnfdhgytuytujfhgfhjh    '),
('gfdgd3432', 'wre235w3r', 43, 5648, '10 hefwepofgwepf Strett', '2016-03-05', 'sdgsdgfdgdfs       '),
('213234', '2132', 4545, 25, 'dsadsfdsfd', '2010-01-01', '            ');

