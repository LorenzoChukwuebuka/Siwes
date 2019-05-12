-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2019 at 02:24 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwes`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `remarks_id` int(11) NOT NULL,
  `day` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `remarks_id`, `day`) VALUES
(1, 'uuu', 1, 6, '2019-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept`) VALUES
(1, 'IMT'),
(2, 'PMT'),
(3, 'FMT'),
(4, 'TMT'),
(5, 'MMT'),
(6, 'EEE'),
(7, 'MME'),
(8, 'MEE'),
(9, 'AEC'),
(10, 'FAT'),
(11, 'PUH'),
(12, 'EVT'),
(13, 'ABE'),
(14, 'URP'),
(15, 'FST');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

DROP TABLE IF EXISTS `duration`;
CREATE TABLE IF NOT EXISTS `duration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_duration` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`id`, `time_duration`) VALUES
(1, 3),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `school` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `school`) VALUES
(1, 'SMAT'),
(2, 'SEET'),
(3, 'SAAT'),
(4, 'SOPS'),
(5, 'SOBS'),
(6, 'SOHT');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `place`) VALUES
(1, 'Abia'),
(2, 'Anambra'),
(3, 'Imo'),
(4, 'Enugu'),
(5, 'Abuja'),
(6, 'kaduna'),
(7, 'Ebonyi'),
(8, 'Lagos'),
(9, 'Bayelsa'),
(10, 'Delta');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

DROP TABLE IF EXISTS `remarks`;
CREATE TABLE IF NOT EXISTS `remarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `remark`) VALUES
(5, 'Very Poor'),
(6, 'Poor'),
(7, 'Good'),
(8, 'Satisfactory'),
(9, 'Very Satisfactory');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `duration_id` tinyint(4) NOT NULL,
  `yos_id` tinyint(4) NOT NULL,
  `regNumber` bigint(12) NOT NULL,
  `location_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Fname`, `Mname`, `Lname`, `dept_id`, `faculty_id`, `duration_id`, `yos_id`, `regNumber`, `location_id`) VALUES
(1, 'hello', 'hello', 'why', 1, 1, 2, 2, 12121212121, 2),
(2, 'gggg', 'hhhhh', 'jdju', 13, 5, 1, 1, 84848484848, 7),
(3, 'hello', 'hwllo', 'juiu', 9, 3, 1, 1, 84848484848, 6),
(4, 'hello', 'jugiuu', 'yuuiii', 8, 3, 2, 3, 67676767676, 7),
(5, 'mbkbk', 'nvjhvjvvjv', 'vjjjj', 6, 3, 2, 1, 879, 5),
(6, ' mjm', 'jbjkbub', 'jioioi', 9, 5, 2, 2, 98088888888, 6),
(7, 'brihj', 'hhhh', 'fgghh', 8, 2, 2, 2, 76767676767, 5),
(8, 'helloa', 'hhhha', 'yuuuuaa', 7, 2, 1, 3, 20151011216, 5);

-- --------------------------------------------------------

--
-- Table structure for table `yos`
--

DROP TABLE IF EXISTS `yos`;
CREATE TABLE IF NOT EXISTS `yos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yos`
--

INSERT INTO `yos` (`id`, `level`) VALUES
(1, 2),
(2, 3),
(3, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
