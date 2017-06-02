-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2015 at 07:55 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flowchart`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_images`
--

CREATE TABLE IF NOT EXISTS `custom_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `custom_images`
--

INSERT INTO `custom_images` (`id`, `image_name`, `tags`) VALUES
(1, '3.jpg', 'circle'),
(2, '2.jpg', 'rectangle'),
(3, '3.jpg', 'circle'),
(4, '2.jpg', 'rectangle'),
(5, '2.jpg', 'rectangle'),
(6, '3.jpg', 'rectangle'),
(7, '2.jpg', 'triangle'),
(8, '2.jpg', 'triangle');

-- --------------------------------------------------------

--
-- Table structure for table `flowchart_comments`
--

CREATE TABLE IF NOT EXISTS `flowchart_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flowchart_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flowchart_likes`
--

CREATE TABLE IF NOT EXISTS `flowchart_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `flowchart_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flowchart_users`
--

CREATE TABLE IF NOT EXISTS `flowchart_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dt_created` datetime NOT NULL,
  `image` varchar(100) NOT NULL,
  `editor_code` text NOT NULL,
  `flowchart_name` varchar(100) NOT NULL,
  `flowchart_category` varchar(100) NOT NULL,
  `flowchart_description` text NOT NULL,
  `flowchart_image1` varchar(100) NOT NULL,
  `flowchart_image2` varchar(100) NOT NULL,
  `flowchart_iframe` text NOT NULL,
  `flowchart_pdf` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
