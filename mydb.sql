-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 12:26 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `id` int(8) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `email`) VALUES
(6, 'abc@example.com'),
(2, 'demo@sample.com'),
(5, 'nasrin@example.com'),
(3, 'nasrin@yahoo.com'),
(7, 'saru@example.com'),
(1, 'test@demo.com'),
(4, 'user1@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `dev_language`
--

CREATE TABLE IF NOT EXISTS `dev_language` (
  `id` int(8) NOT NULL,
  `dev_id` int(8) NOT NULL,
  `language_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dev_language`
--

INSERT INTO `dev_language` (`id`, `dev_id`, `language_id`) VALUES
(1, 1, 'en'),
(2, 2, 'vn'),
(3, 3, 'bd'),
(4, 4, 'en'),
(5, 5, 'ja'),
(6, 6, 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `dev_proglanguage`
--

CREATE TABLE IF NOT EXISTS `dev_proglanguage` (
  `id` int(8) NOT NULL,
  `dev_id` int(8) NOT NULL,
  `proglang_id` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dev_proglanguage`
--

INSERT INTO `dev_proglanguage` (`id`, `dev_id`, `proglang_id`) VALUES
(1, 1, 'php'),
(2, 2, 'php'),
(3, 3, 'php'),
(4, 3, 'javascript'),
(5, 4, 'javascript'),
(6, 5, 'kotlin'),
(7, 6, 'scala'),
(8, 6, 'ruby');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(8) NOT NULL,
  `short_code` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `short_code`) VALUES
(1, 'bd'),
(3, 'en'),
(4, 'ja'),
(2, 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `programming_language`
--

CREATE TABLE IF NOT EXISTS `programming_language` (
  `id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programming_language`
--

INSERT INTO `programming_language` (`id`, `name`) VALUES
(3, 'javascript'),
(6, 'kotlin'),
(1, 'php'),
(4, 'python'),
(2, 'ruby'),
(5, 'scala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dev_language`
--
ALTER TABLE `dev_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_proglanguage`
--
ALTER TABLE `dev_proglanguage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `short_code` (`short_code`);

--
-- Indexes for table `programming_language`
--
ALTER TABLE `programming_language`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dev_language`
--
ALTER TABLE `dev_language`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dev_proglanguage`
--
ALTER TABLE `dev_proglanguage`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `programming_language`
--
ALTER TABLE `programming_language`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
