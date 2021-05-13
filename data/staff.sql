
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `staff`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `membershipdate` date NOT NULL,
  `accommodation` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
('Paul', 'Madduma', 1562, 26, '10 Avenue St.', '2010-11-11', '    Hello World!            '),
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
('213234', '2132', 4545, 25, 'dsadsfdsfd', '2010-01-01', '            '),
('11133', '123213', 213214, 332, 'sfsdgdsg', '2020-11-02', '       '),
('Jason', 'Object', 213215, 24, '123 Notation Street, Toronto, Ontario', '2020-12-12', 'Personal Training'),
('Cezar', 'Lopes', 213216, 32, '120 Highway Street, Global City', '2020-12-12', 'Not applicable'),
('Sasha', 'Mokli', 213217, 45, '78 Fayhennes Street, Vanwoord', '2015-06-29', 'Pet daycare please'),
('Sasha', 'Mokli', 213218, 45, '78 Fayhennes Street, Vanwoord', '2015-06-29', 'Pet daycare please'),
('Paul', 'Madduma', 123, 21, '228 Cedar Springs, Colorado ', '2021-01-02', 'Nothing       '),
('123', '3131', 23334, 34, '43q4r0320349wt504wtr46o0-45', '1995-11-24', ''),
('1222', '1222', 213219, 14, '3iorwjsfv90ww4jfg3e9jfe309', '2020-11-12', 'ds fvswifvjnvdweiun  neofinwdegvnuwsdu             '),
('1222', '1222', 213220, 14, '3iorwjsfv90ww4jfg3e9jfe309', '2020-11-12', 'ds fvswifvjnvdweiun  neofinwdegvnuwsdu             '),
('1222', '1222', 213221, 14, '3iorwjsfv90ww4jfg3e9jfe309', '2020-11-12', 'ds fvswifvjnvdweiun  neofinwdegvnuwsdu             '),
('1222', '1222', 213222, 14, '3iorwjsfv90ww4jfg3e9jfe309', '2020-11-12', 'ds fvswifvjnvdweiun  neofinwdegvnuwsdu             '),
('1222', '1222', 213223, 14, '3iorwjsfv90ww4jfg3e9jfe309', '2020-11-12', 'ds fvswifvjnvdweiun  neofinwdegvnuwsdu             '),
('1222', '1222', 213224, 54, '3iorwjsfv90ww4jfg3e9jfe309', '2019-10-12', 'dfklzgwvopedSgmop;wmvbs           '),
('1222', '1222', 213225, 23, '3iorwjsfv90ww4jfg3e9jfe309', '2021-05-01', 'ajfnauinfiansviafnoiaeosgnsaiwogj'),
('Rome', 'Zelda', 213226, 45, '25 Traittle Avenue Road', '2021-05-10', ' Yes please send notification               '),
('Rome', 'Zelda', 213227, 45, '25 Traittle Avenue Road', '2021-05-10', ' Yes please send notification               '),
('Rome', 'Zelda', 213228, 45, '25 Traittle Avenue Road', '2021-05-10', ' Yes please send notification               '),
('Rome', 'Zelda', 213229, 45, '25 Traittle Avenue Road', '2021-05-10', ' Yes please send notification               '),
('Rome', 'Zelda', 213230, 45, '25 Traittle Avenue Road', '2021-05-10', ' Yes please send notification               '),
('Rome', 'Zelda', 213231, 45, '25 Traittle Avenue Road', '2021-05-10', ' Yes please send notification               '),
('Rome', 'Zelda', 213232, 45, '25 Traittle Avenue Road', '2021-05-10', ' Yes please send notification               '),
('Kaycee', 'Servicions', 213233, 34, '12 Lufacilionzh Street, Markhath', '2021-05-25', 'None'),
('dsmfkomdjmdsjfn', 'oiewfmjiowefmweoif', 213234, 23, '25 Rainbow Road', '2016-08-19', 'ksdvmkvsb;dsfbdrfbdfml;h.'),
('Paul', 'Madduma', 213235, 18, '228 Fernwood Street', '2010-12-25', 'Gym time');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `staffid` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `hire` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`firstname`, `lastname`, `staffid`, `position`, `hire`, `username`, `password`) VALUES
('Admin', 'Admin', 100100, 'Admin', '0000-00-00', 'admin', '@dMin-123'),
('Lakesha', 'Thomes', 445461, 'Staff', '0000-00-00', 'lakesha.thomes', 'St@ff-123'),
('Jirae', 'Lomo', 456135, 'Staff', '0000-00-00', 'jirae.limo', 'St@ff-456'),
('Kasim', 'Brascal', 325971, 'Staff', '0000-00-00', 'kasim.brascal', 'St@ff-7890'),
('Roy', 'Thomson', 789143, 'Staff', '0000-00-00', 'roy.thomson', 'St@ff-3210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213236;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=789144;
COMMIT;

