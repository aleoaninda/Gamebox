-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 07:57 PM
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
  `paid` int(1) NOT NULL,
  `processed` int(1) NOT NULL,
  KEY `p_id` (`p_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `c_id`, `quantity`, `date`, `paid`, `processed`) VALUES
(1, 11, 1, '2016-03-27', 1, 0),
(2, 11, 1, '2016-03-27', 1, 0),
(1, 11, 1, '2016-03-27', 1, 0),
(3, 11, 1, '2016-03-27', 1, 0),
(1, 7, 1, '2016-03-27', 1, 0),
(2, 7, 1, '2016-03-27', 1, 0),
(3, 7, 1, '2016-03-28', 1, 0),
(3, 10, 1, '2016-03-28', 0, 0),
(4, 7, 2, '2016-03-28', 1, 0);

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
  `c_username` varchar(20) NOT NULL,
  `c_password` varchar(20) NOT NULL,
  `trxid` int(30) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `phone`, `c_username`, `c_password`, `trxid`) VALUES
(6, 'Nafeu', 'nafeu.aungshu@gmail.com', 1712526543, 'aungshu', '123456', NULL),
(7, 'Aleo Aninda', 'aleoaninda@gmail.com', 1781443639, 'aleoaninda', 'abrakadabra', NULL),
(8, 'Nafeu', 'nafeu.aungshu@gmail.com', 1712526543, 'aungshu', '123456', NULL),
(9, 'sadasl', 'lsklskdf', 245615, 'sdsada', '87465416', NULL),
(10, 'anda unda', 'bla bla', 84451, 'ajaira', 'abar', NULL),
(11, 'Sabbir Ahmed', 'ahmed.sabbir@gmail.com', 1919760055, 'sabbir', 'sabbir', 13213),
(12, 'Ali baba', 'alibaba@420.com', 6564654, 'alibaba', 'alibaba', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_group` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_desc` varchar(200) NOT NULL,
  `price` int(4) NOT NULL,
  `p_img` varchar(40) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_group`, `p_name`, `p_desc`, `price`, `p_img`) VALUES
(1, 'Origin', 'Star Wars Battlefront', 'Desc', 4800, './img/prod/starwars.jpg'),
(2, 'Origin', 'Battlefield 4', 'Desc', 3200, './img/prod/battlefield.png'),
(3, 'Uplay', 'Rainbow Six Siege', 'Desc', 4800, './img/prod/Rainbow-Six-Siege.jpg'),
(4, 'Steam', 'Counter Strike: Global Offensive', 'Desc', 750, './img/prod/CSGO.jpg'),
(5, 'Steam', 'Steam Wallet Code', 'Desc', 2200, './img/prod/steam_wallet.png'),
(6, 'Uplay', 'The Division', 'Desc', 4800, './img/prod/the_division.png'),
(7, 'Steam', 'Evolve', 'Desc', 780, './img/prod/evolve.png');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
