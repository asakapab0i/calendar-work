-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2013 at 05:26 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `calendar`
--
CREATE DATABASE IF NOT EXISTS `calendar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `calendar`;

-- --------------------------------------------------------

--
-- Table structure for table `mycal`
--

CREATE TABLE IF NOT EXISTS `mycal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `mycal`
--

INSERT INTO `mycal` (`id`, `email`, `date_start`, `date_end`, `title`, `description`, `dateCreated`, `image`) VALUES
(5, 'hello@yahoo.com', '2013-10-22 13:00:00', '2013-10-15 14:59:00', 'adadsadsadasdas', 'adasadsadsadasdas', '2013-10-22 19:11:20', ''),
(8, 'admin@yahoo.com', '2012-12-01 12:31:00', '2012-12-02 12:31:00', 'quick testsss', 'sdasdasdasdasdas', '2013-10-28 02:17:23', ''),
(9, 'rrongie@gmail.com', '2013-10-13 15:12:00', '2013-10-13 12:31:00', 'hope its workssss', 'adaasdasa', '2013-10-27 23:57:39', ''),
(10, 'rrongie@gmail.com', '2013-10-28 12:31:00', '2013-10-28 12:55:00', 'ulit daw ,hehe', 'ayus na delete nlng kulangdasdas', '2013-10-27 19:52:03', ''),
(11, 'rrongie@gmail.com', '2013-10-26 02:03:00', '2013-10-26 17:05:00', 'add tru profile', 'helllo event this one', '2013-10-26 21:12:06', ''),
(13, 'rrongie@gmail.com', '2013-10-08 12:31:00', '2013-10-08 12:33:00', 'new title heheheheh', 'new titleeeee gsgg rhdhdfhdf', '2013-10-27 19:59:07', ''),
(16, 'admin@yahoo.com', '2013-10-09 12:31:00', '2013-10-09 12:31:00', 'the quick brown foxs', 'test asdasdasdas', '2013-10-28 01:12:33', ''),
(17, 'admin@yahoo.com', '2013-10-08 12:31:00', '2013-10-08 12:31:00', 'test this one asdasd1', 'hahahahahahaha', '2013-10-27 13:28:22', ''),
(18, 'admin@yahoo.com', '2013-10-30 14:31:00', '2013-10-30 00:32:00', 'delete this one ', 'delete this one coll them asdasd tafasfjdhfj;sj sdfhsfjsdhfjsfsd', '2013-10-27 23:41:14', ''),
(19, 'admin@yahoo.com', '2013-10-29 12:31:00', '2013-10-29 12:31:00', 'qqqqqqqqqqqq', 'sadasdasdas', '2013-10-28 04:47:23', ''),
(20, 'rrongie@gmail.com', '2013-10-31 12:31:00', '2013-10-31 12:32:00', 'add in display all events', 'ok na', '2013-10-28 10:45:04', ''),
(21, 'rrongie@gmail.com', '2013-11-19 12:31:00', '2013-11-19 12:31:00', 'add events', 'start of my class', '2013-11-18 13:15:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `image`, `date_created`) VALUES
(1, 'rrongie@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'user', 'polaris-sportsman-700-blue.jpg', '2013-11-18 14:44:10'),
(2, 'admin@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 'Jellyfish.jpg', '2013-11-18 14:11:27'),
(3, 'hello@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'user', '2003-honda-rincon-four-wheeler-in-olive.jpg', '2013-11-22 16:00:00'),
(11, 'abel@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'user', 'default-profile-picture.png', '2013-11-18 14:43:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
