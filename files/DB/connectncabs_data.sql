-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2014 at 11:24 AM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `connectncabs`
--

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Inactive');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `address`, `occupation`, `user_status_id`, `registration_date`, `password_token`, `user_type_id`, `organisation_id`, `organisation_admin_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'System', 'Administrator', 'admin@connectncabs.local', NULL, NULL, NULL, 1, '2014-08-11 00:00:00', NULL, 1, -1, NULL);

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

INSERT INTO `user_types` (`id`, `name`) VALUES
(3, 'Front Desk'),
(2, 'Organisation Administrator'),
(1, 'System Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
