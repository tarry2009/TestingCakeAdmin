-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2015 at 06:44 PM
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
-- Table structure for table `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `readr` tinyint(1) NOT NULL,
  `creater` tinyint(1) NOT NULL,
  `updater` tinyint(1) NOT NULL,
  `deleter` tinyint(1) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(48) NOT NULL,
  `name` varchar(254) NOT NULL,
  `contents` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `type` varchar(254) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `uuid`, `file_name`, `file_path`, `original_name`, `type`, `status`) VALUES
(37, '54e75ae6-2420-4a21-b517-0c7b368c', '54e75ae6-4b24-4652-add0-0c7b368c8156.png', '/home/flik/projects/CakeAdmin/app/webroot//files/54e75ae6-4b24-4652-add0-0c7b368c8156.png', 'Screenshot from 2015-02-19 10:38:56.png', 'image/png', 0),
(38, '54e75b3f-19fc-4f98-83f2-1105368c', '54e75b3f-c774-4bee-9241-1105368c8156.png', '/home/flik/projects/CakeAdmin/app/webroot//files/54e75b3f-c774-4bee-9241-1105368c8156.png', 'Screenshot from 2015-02-19 10:41:08.png', 'image/png', 0),
(39, '54e75c76-e284-4839-9b43-11e4368c', '54e75c76-ea74-4a1a-b17d-11e4368c8156.jpg', '/home/flik/projects/CakeAdmin/app/webroot//files/54e75c76-ea74-4a1a-b17d-11e4368c8156.jpg', 'it_photo_122395.jpg', 'image/jpeg', 0),
(40, '54e75d7b-5940-480c-8ae3-120c368c', '54e75d7b-1724-4dd2-9c81-120c368c8156.jpeg', '/home/flik/projects/CakeAdmin/app/webroot//files/54e75d7b-1724-4dd2-9c81-120c368c8156.jpeg', 'webdevelopment.jpeg', 'image/jpeg', 0),
(43, '54e763a1-7a1c-46f4-ac08-1103368c', '54e763a1-5000-47ff-bb15-1103368c8156.pdf', '/home/flik/projects/CakeAdmin/app/webroot//files/54e763a1-5000-47ff-bb15-1103368c8156.pdf', 'BillSTMT-4588260000464174.pdf', 'application/pdf', 0),
(44, '54e76910-c9b0-4f7d-afbf-11e5368c', '54e76910-af40-4707-9546-11e5368c8156.png', '/home/flik/projects/CakeAdmin/app/webroot//files/54e76910-af40-4707-9546-11e5368c8156.png', 'Screenshot from 2015-02-19 10:39:46.png', 'image/png', 0),
(45, '54e769b7-8980-4190-a1f0-12fc368c', '54e769b7-8a14-4c1d-ac3e-12fc368c8156.png', '/home/flik/projects/CakeAdmin/app/webroot//files/54e769b7-8a14-4c1d-ac3e-12fc368c8156.png', 'Screenshot from 2015-02-19 10:28:15.png', 'image/png', 0),
(48, '54e76cb1-6fac-4208-9614-0c7b368c', '54e76cb1-4390-49fd-8d62-0c7b368c8156.png', '/home/flik/projects/CakeAdmin/app/webroot//files/54e76cb1-4390-49fd-8d62-0c7b368c8156.png', 'Screenshot from 2015-02-19 10:28:52.png', 'image/png', 0),
(49, '54e76d26-ee08-4ac1-a82c-12fc368c', '54e76d26-e750-4c9f-9767-12fc368c8156.jpg', '/home/flik/projects/CakeAdmin/app/webroot//files/54e76d26-e750-4c9f-9767-12fc368c8156.jpg', 'images.jpg', 'image/jpeg', 0);

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
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` char(48) NOT NULL,
  `key` char(254) NOT NULL,
  `value` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `uuid`, `key`, `value`, `status`, `lang_id`, `created_by`) VALUES
(1, '54da963a-9b34-40fb-b6c2-0a7e368c8156', 'Meta Tag', '<p>Here are meta Tags</p>', 1, 0, 0),
(2, '54da9a6d-47dc-4ee1-80f9-0fbe368c8156', 'Title', '<p>My Admin Panel</p>', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(32) NOT NULL,
  `username` varchar(254) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(17) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `original_pass` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `note` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=191 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `username`, `name`, `phone`, `dob`, `email`, `password`, `original_pass`, `status`, `role`, `note`, `created`, `updated`, `created_user_id`, `updated_user_id`) VALUES
(158, '4000000-2688-489', '', 'root', '', '0000-00-00', 'ashfaqzp@gmail.com', '63a9f0ea7bb98050796b649e85481845', '', 0, 'admin', '', '2013-11-21 13:15:38', '2013-11-21 13:15:38', 0, 0),
(170, '54d87238-06f0-4a22-b798-0175368c', '', 'bbbbb', '222', '0000-00-00', 'Sin@gmail.com', '202cb962ac59075b964b07152d234b70', 'u7xYBohrGt4_EQUALS_', 1, 'user', '', '2015-02-10 21:12:56', '2015-02-10 21:12:56', 160, 0),
(190, '54df4d78-1a18-4422-a1a2-3a82368c', '', 'Mohammad Ashfaq', '34234', '0000-00-00', 'admin@gmail.com', '$2a$10$Ei/aTJOhhLdXrPuMddvq8OEmf6HNwik7oZ3AwutjMXFUHpSDZM04.', '', 1, 'admin', '', '2015-02-14 08:28:24', '2015-02-14 08:28:24', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
