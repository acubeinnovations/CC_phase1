-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2014 at 05:29 AM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cc`
--

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `address`, `status_id`, `created`, `updated`) VALUES
(1, 'TALC1', 'TALC,Ernakulam,Kerala', 1, '2014-08-28 05:10:37', NULL),
(2, 'CONNECTNCABS', 'connectncabs,ernakulam,kerala', 1, '2014-08-28 05:19:14', NULL);

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `description`) VALUES
(1, 'Active', 'Active'),
(2, 'Inactive', 'Inactive');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `address`, `occupation`, `user_status_id`, `password_token`, `user_type_id`, `organisation_id`, `organisation_admin_id`, `created`, `updated`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'System', 'Administrator', 'admin@connectncabs.local', NULL, NULL, NULL, 1, NULL, 1, -1, NULL, '2014-08-11 00:00:00', '0000-00-00 00:00:00'),
(2, 'talc123', '1402c1b89ebcf3cd9d713aec00513a93', 'TALC', 'TALC', 'talc@talc.com', '9020964268', 'TALC,Ernakulam,Kerala', NULL, 1, NULL, 2, 1, NULL, '2014-08-28 05:10:37', '0000-00-00 00:00:00'),
(3, 'connectncabs', '7e4da08906338586b3756c3fa0f5bb89', 'connectn', 'cabs', 'connectncabs@connectncabs.com', '9020964268', 'connectncabs,ernakulam,kerala', NULL, 1, NULL, 2, 2, NULL, '2014-08-28 05:19:14', '0000-00-00 00:00:00'),
(4, 'nijojoseph', 'bf8191475f55068537a0dc716078dddb', 'Nijo', 'Joseph', 'nijojoseph@acube.co', '9020964268', 'Kaloor,Ernakulam,Kerala', NULL, 1, NULL, 3, 2, NULL, '2014-08-28 05:25:06', '0000-00-00 00:00:00'),
(5, 'divya', '6a670fed44634a9e6967bc5cec37840b', 'Divya', 'Manoj', 'divya@acube.co', '9020964268', 'Kaloor,ernakulam,kerala', NULL, 1, NULL, 3, 1, NULL, '2014-08-28 05:26:37', '0000-00-00 00:00:00');

--
-- Dumping data for table `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `name`, `description`) VALUES
(1, 'Active', 'Active'),
(2, 'Suspended', 'Suspended'),
(3, 'Disabled', 'Disabled');

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `description`) VALUES
(1, 'System Administrator', 'System Administrator'),
(2, 'Organisation Administrator', 'Organisation Administrator'),
(3, 'Front Desk', 'Front Desk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
