-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2018 at 06:39 AM
-- Server version: 5.6.39-log
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpcrudsample`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  `account_creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(10) NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `firstname`, `lastname`, `email`, `password`, `account_creation_time`, `role`, `is_subscribed`) VALUES
(3, 'walter', 'wong03', 'wong@hotmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2017-12-25 14:30:08', 'admin', 0),
(4, 'philiptom', 'koko1', 'philip@hotmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-01-04 17:23:50', 'user', 0),
(8, 'Geetha', 'Thambi', 'geethatnt@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-09-14 13:03:04', 'user', 1),
(11, 'Kavya', 'Thambi', 'findkavya28@gmail.com', '797cb93f8b1159e6dc68b2b7fddd6c55', '2018-09-28 08:06:41', 'user', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
