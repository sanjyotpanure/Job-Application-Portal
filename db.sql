-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2022 at 11:38 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(100) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_user_name`, `admin_password`) VALUES
(1, 'admin', '$2y$10$D74Zy1qMkATvmGRoVeq7hed4ajWof2aqDGnEaD3yPHABA.p.e7f4u');

-- --------------------------------------------------------

--
-- Table structure for table `jobregistration`
--

DROP TABLE IF EXISTS `jobregistration`;
CREATE TABLE IF NOT EXISTS `jobregistration` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `refer` varchar(50) NOT NULL,
  `planguage` varchar(50) NOT NULL,
  `cv_doc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobregistration`
--

INSERT INTO `jobregistration` (`id`, `name`, `phone`, `email`, `degree`, `refer`, `planguage`, `cv_doc`) VALUES
(1, 'Demo User', '7894561230', 'demo@user.com', 'ME/MTech', '', 'Python, JAVA', 'Resume Template (1).pdf'),
(2, 'Test User', '9578463210', 'test@user.com', 'BCA', '', 'Python, Ruby, JAVA', 'Resume Template (2).pdf'),
(3, 'Dummy User', '9784565465', 'dummy@user.com', 'BE/BTech', '', 'PHP, MySQL', 'Resume Template (3).pdf'),
(4, 'Demo Test', '8945671237', 'demo@test.com', 'MBA', '', 'PHP', 'Resume Template (4).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `email`, `phone`, `password`, `cpassword`, `profile`) VALUES
(1, 'Demo User', 'demo@user.com', '7894561230', '$2y$10$OyHuG1587gLNTgdAdVYjaef0acCTvPqIQ1TdF6MVPvm69nC2mlzqS', '$2y$10$PR8FdqnLxpFb1DrqVyCUiuaMGK7CysYNq2w13/KnFrScbQPEFbPEe', 'profile2.png'),
(2, 'Test User', 'test@user.com', '9578463210', '$2y$10$vxn7XympnUwRNaDlWMbzT.iOw/1.QSV2YxCK5cG5TvHZfYFVQbbsK', '$2y$10$VUAjpHIiVVgpXn5ItOibu.nMce8x18pWnBvT1QAW0UCB0AklmVMo6', 'profile1.png'),
(3, 'Dummy User', 'dummy@user.com', '9784565465', '$2y$10$Eep9IuUpGHfqG5rvhKikQOffq4jdus296sVLPp0cSr/enTXoCXzNi', '$2y$10$BLx3QijTWzlgtTlhLk6I7.N0EMkRzseVVEoJRIlDkJ3se8o1/puZ6', 'profile0.png'),
(4, 'Demo Test', 'demo@test.com', '8945671237', '$2y$10$HsakELHCyLeSpfnjlRThIeRBEbyRWeVKMW1nKBVNdeuKayVPyPB.u', '$2y$10$brUJO4uOFlL/O78k1U83t.G2nPlKb0s/JZgqB0ihC4KBY9DHJUEWe', 'profile4.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
