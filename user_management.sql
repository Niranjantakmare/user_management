-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2017 at 07:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user_management`
--
CREATE DATABASE IF NOT EXISTS `user_management` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user_management`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_firstname` varchar(25) DEFAULT NULL,
  `c_lastname` varchar(25) DEFAULT NULL,
  `c_emailid` varchar(50) DEFAULT NULL,
  `c_address` varchar(100) DEFAULT NULL,
  `c_zipcode` varchar(6) DEFAULT NULL,
  `c_telephoneno` varchar(13) DEFAULT NULL,
  `c_dob` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` date DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_firstname`, `c_lastname`, `c_emailid`, `c_address`, `c_zipcode`, `c_telephoneno`, `c_dob`, `is_active`, `created_on`, `updated_on`) VALUES
(5, 'asdfadf', 'adfadsfdsf', 'asdfasfdasf@gmail.com', 'asdfsdafd', '345345', '9858695869', '2017-09-12', 1, NULL, NULL),
(6, 'asdfsadfasdf', 'asdfasfsadfdsaf', 'asdfasdfdsfasfd@gmail.com', 'sadfasfasdf', '324534', '7878526355', '2017-09-27', 0, NULL, NULL),
(8, 'sagar', 'patil', 'sagarpatil@gmail.com', 'pune', '456789', '126345898', '2017-09-13', 1, '2017-09-05', NULL),
(9, 'ashok', 'sutar', 'ashoksutar@gmail.com', 'kolhapur', '123123', '456789', '2017-09-06', 1, '2017-09-05', NULL),
(10, 'asdfadsfsdf', 'asdfasdfasdf', 'asdfdsfasdfasdf@gmail.com', 'asdfasdfsadf', '345345', '2342134', '2017-09-07', 1, '2017-09-05', NULL),
(11, 'gajanan', 'sutar', 'asdfasdf@gmail.com', 'asdfasfdsad', '345345', '456456456', '2017-09-22', 1, '2017-09-05', NULL),
(12, 'asdfsdafadsf', 'afdasfdsfasdfasdf', 'dsfadsfasdffdsa@gmail.com', 'asdfasdfasdf', '234234', '234234234', '2017-09-13', 1, '2017-09-05', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
