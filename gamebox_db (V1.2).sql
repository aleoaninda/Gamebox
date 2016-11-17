-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 02:22 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamebox_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) NOT NULL,
  `password` int(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `date` date NOT NULL,
  `trxid` int(20) NOT NULL,
  `processed` int(1) NOT NULL,
  KEY `p_id` (`p_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `c_id`, `quantity`, `date`, `trxid`, `processed`) VALUES
(2, 14, 1, '2016-04-02', 0, 0),
(7, 14, 4, '2016-04-02', 0, 0),
(11, 14, 4, '2016-04-02', 0, 0),
(2, 20, 1, '2016-11-17', 0, 0),
(4, 20, 1, '2016-11-17', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

DROP TABLE IF EXISTS `catagory`;
CREATE TABLE IF NOT EXISTS `catagory` (
  `p_group` varchar(20) NOT NULL,
  `group_img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`p_group`, `group_img`) VALUES
('Steam', './img/clients/steam.png'),
('Origin', './img/clients/origin.png'),
('Uplay', './img/clients/uplay.png'),
('Rockstar', './img/clients/rockstar.png'),
('Gift', './img/clients/gift.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `c_name` varchar(30) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_phone` int(11) DEFAULT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_name`, `c_email`, `c_phone`, `message`) VALUES
('Aladin', 'aleo@xyz.com', 8455, 'sadsadsa'),
('Zack', 'abd@kfd.com', 415415415, 'sadsadas'),
('Zack ', 'zack@snider@gmail.com', 54131, 'sadsadas');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `c_username` varchar(20) NOT NULL,
  `c_password` varchar(32) NOT NULL,
  `trxid` int(30) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `phone`, `age`, `area`, `c_username`, `c_password`, `trxid`) VALUES
(14, 'Aleo Aninda', 'aleoaninda@gmail.com', 1781443639, 0, '', 'aleoaninda', 'cf20d7c302b08cb0d8bb5fe35b36634b', 54654646),
(15, 'Sabbir Ahmed', 'sabbir@gmail.com', 1781443639, 20, 'Dhaka', 'sabbir', 'c4ca4238a0b923820dcc509a6f75849b', 12312),
(16, 'Sabbir Ahmed', 'sabbir@gmail.com', 78952, 20, 'Dhaka', 'subu', '202cb962ac59075b964b07152d234b70', 12312),
(17, 'Sabbir Ahmed', 'sabbir@gmail.com', 78952, 20, 'Dhaka', 'subu', '202cb962ac59075b964b07152d234b70', 12312),
(18, 'Sabbir Ahmed', 'sabbir@gmail.com', 78952, 20, 'Dhaka', 'subu', '202cb962ac59075b964b07152d234b70', 12312),
(19, 'Sabbir Ahmed', 'sabbir@gmail.com', 78952, 20, 'Dhaka', 'subu', '202cb962ac59075b964b07152d234b70', 12312),
(20, 'Alif', 'alif@gmail.com', 7323, NULL, NULL, 'alif', '202cb962ac59075b964b07152d234b70', NULL),
(21, 'Alif ALif', 'alif@gmail.com', 12346, NULL, NULL, 'alif', 'd41d8cd98f00b204e9800998ecf8427e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(20) NOT NULL,
  `g_add` varchar(20) NOT NULL,
  `g_img` varchar(20) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

DROP TABLE IF EXISTS `license`;
CREATE TABLE IF NOT EXISTS `license` (
  `c_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  KEY `c_id` (`c_id`),
  KEY `g_id` (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `popularity`
--

DROP TABLE IF EXISTS `popularity`;
CREATE TABLE IF NOT EXISTS `popularity` (
  `c_id` int(11) NOT NULL,
  `gen_fps` varchar(20) NOT NULL,
  `gen_moba` varchar(20) NOT NULL,
  KEY `c_id` (`c_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_group` varchar(20) NOT NULL,
  `p_gen` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_desc` varchar(200) NOT NULL,
  `price` int(4) NOT NULL,
  `p_img` varchar(40) NOT NULL,
  `click_count` int(20) NOT NULL,
  `purch_count` int(20) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_group`, `p_gen`, `p_name`, `p_desc`, `price`, `p_img`, `click_count`, `purch_count`) VALUES
(1, 'Origin', '', 'Star Wars Battlefront', 'Star Wars Battlefront is an action shooter video game developed by EA DICE, with additional work from Criterion Games, and published by Electronic Arts.', 4800, './img/prod/starwars.jpg', 0, 0),
(2, 'Origin', '', 'Battlefield 4', 'Battlefield 4 is a 2013 first-person shooter video game developed by Swedish video game developer EA Digital Illusions CE and published by Electronic Arts.', 3200, './img/prod/battlefield.png', 0, 0),
(3, 'Uplay', '', ' Tom Clancy''s Rainbow Six Siege', 'Tom Clancy''s Rainbow Six Siege is a first-person shooter video game developed by Ubisoft Montreal and published by Ubisoft.', 4800, './img/prod/Rainbow-Six-Siege.jpg', 0, 0),
(4, 'Steam', '', 'Counter Strike: Global Offensive', 'Counter-Strike: Global Offensive (CS:GO) is an online first-person shooter developed by Hidden Path Entertainment and Valve Corporation. It is the fourth game in the main Counter-Strike franchise.', 750, './img/prod/CSGO.jpg', 0, 0),
(5, 'Gift', '', 'Steam Wallet Code', 'Desc', 2200, './img/prod/steam_wallet.png', 0, 0),
(6, 'Uplay', '', 'Tom Clancy''s The Division', 'Tom Clancy''s The Division is a third-person shooter video game developed and published by Ubisoft, with assistance from Red Storm Entertainment, for Microsoft Windows, PlayStation 4 and Xbox One.', 4800, './img/prod/the_division.png', 0, 0),
(7, 'Steam', '', 'Evolve', 'Evolve is a first-person shooter video game developed by Turtle Rock Studios, published by 2K Games and distributed by Take-Two Interactive. ', 780, './img/prod/evolve.png', 0, 0),
(8, 'Rockstar', '', 'Grand Theft Auto V', 'Grand Theft Auto Online is a persistent, open world online multiplayer video game developed by Rockstar North and published by Rockstar Games.', 4800, './img/prod/gtav.jpg', 0, 0),
(9, 'Rockstar', '', 'Max Payne 3', 'Max Payne 3 is a third-person shooter video game developed by Rockstar Studios and published by Rockstar Games.', 1350, './img/prod/maxpayne3.jpg', 0, 0),
(10, 'Uplay', '', 'Assassin''s Creed II', 'Assassin''s Creed II is a 2009 action-adventure video game developed by Ubisoft Montreal and published by Ubisoft.', 1350, './img/prod/ac2.jpg', 0, 0),
(11, 'Gift', '', 'Netflix Gift Card', 'Netflix', 2200, './img/prod/netflix.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `trxid` int(11) NOT NULL,
  KEY `c_id` (`c_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `g_name` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`g_name`, `url`, `c_name`, `c_email`) VALUES
('Aladin', 'http://www.bkash.com/', 'Aladin', 'aleo@xyz.com'),
('Aladin', 'http://www.bkash.com/', 'Aladin', 'aleo@xyz.com'),
('Ali Baba', 'http://www.bkash.com/', 'Ali baba', 'abd@xyz.com');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `rec_flag` int(1) NOT NULL,
  `statement` text NOT NULL,
  KEY `c_id` (`c_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `c_id` int(11) NOT NULL,
  `gen_fps` int(20) NOT NULL,
  `gen_moba` int(20) NOT NULL,
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `Lic_cust` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Lic_game` FOREIGN KEY (`g_id`) REFERENCES `game` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `popularity`
--
ALTER TABLE `popularity`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `cust_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prod_id` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `Rev_customer` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Rev_prod` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `customerid` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
