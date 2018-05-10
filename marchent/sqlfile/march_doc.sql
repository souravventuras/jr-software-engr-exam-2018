-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 04:08 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `march_doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_log_rec`
--

CREATE TABLE `emp_log_rec` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_log_rec`
--

INSERT INTO `emp_log_rec` (`id`, `uname`, `email`, `password`, `usertype`, `action`) VALUES
(1, 'masud', 'masud@sparrow.com', '123', 'a', 'on'),
(1, 'masud', 'masud@sparrow.com', '123', 'a', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `styleid` varchar(10) NOT NULL,
  `itemdesc` varchar(50) NOT NULL,
  `matcol` varchar(50) NOT NULL,
  `garqty` varchar(20) NOT NULL,
  `marker` varchar(20) NOT NULL,
  `allowence` varchar(20) NOT NULL,
  `totqty` varchar(20) NOT NULL,
  `reqqty` varchar(20) NOT NULL,
  `reciveqty` varchar(20) NOT NULL,
  `bal_qty` varchar(20) NOT NULL,
  `inhouse` varchar(20) NOT NULL,
  `etd_date` varchar(20) NOT NULL,
  `del_mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabrics`
--

INSERT INTO `fabrics` (`styleid`, `itemdesc`, `matcol`, `garqty`, `marker`, `allowence`, `totqty`, `reqqty`, `reciveqty`, `bal_qty`, `inhouse`, `etd_date`, `del_mode`) VALUES
('1', 'fab', 'red', '20', '3', '2', '3.06', '61.2', '30', '31.200000000000003', '49.02%', '01/03/2018', 'ship');

-- --------------------------------------------------------

--
-- Table structure for table `interlining`
--

CREATE TABLE `interlining` (
  `styleid` varchar(10) NOT NULL,
  `itemdesc` varchar(50) NOT NULL,
  `matcol` varchar(50) NOT NULL,
  `garqty` varchar(20) NOT NULL,
  `marker` varchar(20) NOT NULL,
  `allowence` varchar(20) NOT NULL,
  `totqty` varchar(20) NOT NULL,
  `reqqty` varchar(20) NOT NULL,
  `reciveqty` varchar(20) NOT NULL,
  `bal_qty` varchar(20) NOT NULL,
  `inhouse` varchar(20) NOT NULL,
  `etd_date` varchar(20) NOT NULL,
  `del_mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `styleid` varchar(10) NOT NULL,
  `itemdesc` varchar(50) NOT NULL,
  `matcol` varchar(50) NOT NULL,
  `garqty` varchar(20) NOT NULL,
  `marker` varchar(20) NOT NULL,
  `allowence` varchar(20) NOT NULL,
  `totqty` varchar(20) NOT NULL,
  `reqqty` varchar(20) NOT NULL,
  `reciveqty` varchar(20) NOT NULL,
  `bal_qty` varchar(20) NOT NULL,
  `inhouse` varchar(20) NOT NULL,
  `etd_date` varchar(20) NOT NULL,
  `del_mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `styledesc`
--

CREATE TABLE `styledesc` (
  `styleno` varchar(10) NOT NULL,
  `styledescript` varchar(50) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `colour` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `wash_desc` varchar(30) NOT NULL,
  `total_qty` varchar(30) NOT NULL,
  `first_del_date` varchar(30) NOT NULL,
  `trim_in_house` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `styledesc`
--

INSERT INTO `styledesc` (`styleno`, `styledescript`, `destination`, `colour`, `size`, `wash_desc`, `total_qty`, `first_del_date`, `trim_in_house`) VALUES
('1', 'shirt', 'polland', 'red', '5', 'non wash', '2000', '03/02/2018', '40'),
('1', 'shirt', 'polland', 'red', '5', 'non wash', '2000', '03/02/2018', '40');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `styleid` varchar(10) NOT NULL,
  `itemdesc` varchar(50) NOT NULL,
  `matcol` varchar(50) NOT NULL,
  `garqty` varchar(20) NOT NULL,
  `marker` varchar(20) NOT NULL,
  `allowence` varchar(20) NOT NULL,
  `totqty` varchar(20) NOT NULL,
  `reqqty` varchar(20) NOT NULL,
  `reciveqty` varchar(20) NOT NULL,
  `bal_qty` varchar(20) NOT NULL,
  `inhouse` varchar(20) NOT NULL,
  `etd_date` varchar(20) NOT NULL,
  `del_mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trims`
--

CREATE TABLE `trims` (
  `styleid` varchar(10) NOT NULL,
  `itemdesc` varchar(50) NOT NULL,
  `matcol` varchar(50) NOT NULL,
  `garqty` varchar(20) NOT NULL,
  `marker` varchar(20) NOT NULL,
  `allowence` varchar(20) NOT NULL,
  `totqty` varchar(20) NOT NULL,
  `reqqty` varchar(20) NOT NULL,
  `reciveqty` varchar(20) NOT NULL,
  `bal_qty` varchar(20) NOT NULL,
  `inhouse` varchar(20) NOT NULL,
  `etd_date` varchar(20) NOT NULL,
  `del_mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
