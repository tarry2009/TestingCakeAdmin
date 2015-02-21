-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2015 at 03:48 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rootx`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(32) NOT NULL,
  `file_name` char(254) NOT NULL,
  `file_path` char(254) NOT NULL,
  `original_name` char(254) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `uuid`, `file_name`, `file_path`, `original_name`, `status`) VALUES
(1, '', 'fs', 'dfs', 'sf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_relations`
--

CREATE TABLE IF NOT EXISTS `file_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` enum('courses','users','extra') NOT NULL DEFAULT 'courses',
  `file_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(32) NOT NULL,
  `language` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(32) NOT NULL,
  `name` char(254) NOT NULL,
  `contents` text NOT NULL,
  `lang_id` tinyint(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(17) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `original_pass` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=171 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `phone`, `dob`, `email`, `pass`, `original_pass`, `status`, `role`, `created`, `updated`, `created_user_id`, `updated_user_id`) VALUES
(158, '4000000-2688-489', 'root', '', '0000-00-00', 'ashfaqzp@gmail.com', '63a9f0ea7bb98050796b649e85481845', '', 0, 'admin', '2013-11-21 13:15:38', '2013-11-21 13:15:38', 0, 0),
(160, '402222220-2688-4', 'admin', '', '0000-00-00', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 1, 'admin', '2013-11-22 11:54:52', '2013-11-22 11:54:52', 0, 0),
(170, '54d87238-06f0-4a22-b798-0175368c', 'bbbbb', '222', '0000-00-00', 'Sin@gmail.com', '202cb962ac59075b964b07152d234b70', 'u7xYBohrGt4_EQUALS_', 1, 'user', '2015-02-09 03:45:16', '2015-02-09 03:45:16', 160, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
