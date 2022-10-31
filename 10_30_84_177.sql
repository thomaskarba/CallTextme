-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 10.30.84.177:3306
-- Generation Time: Oct 28, 2022 at 03:55 AM
-- Server version: 5.6.51-91.0-56-log
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qmr`
--
CREATE DATABASE IF NOT EXISTS `qmr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `qmr`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(15) NOT NULL,
  `logindate` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  `ori` varchar(3) NOT NULL,
  `mobile` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `country` varchar(30) NOT NULL,
  `region` varchar(2) NOT NULL,
  `sp` int(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `travelsearch`
--
CREATE TABLE `travelsearch` (
`country` varchar(30)
,`region` varchar(2)
,`sp` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nudity` int(1) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT 'prof051487.jpg',
  `name` varchar(27) DEFAULT NULL,
  `availability` varchar(8) NOT NULL DEFAULT 'anyone',
  `btc` varchar(50) DEFAULT '0',
  `region` varchar(2) DEFAULT NULL,
  `emailnotifications` varchar(3) NOT NULL DEFAULT 'on',
  `orientation` varchar(3) NOT NULL DEFAULT 'str',
  `sex` varchar(1) NOT NULL,
  `g` int(8) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `r` int(8) NOT NULL DEFAULT '0',
  `country` varchar(30) DEFAULT NULL,
  `fake` int(1) NOT NULL DEFAULT '0',
  `hide` int(1) NOT NULL DEFAULT '0',
  `localintl` int(1) NOT NULL DEFAULT '0',
  `popularity` int(10) NOT NULL DEFAULT '0',
  `share` int(1) NOT NULL DEFAULT '1',
  `friends` int(1) NOT NULL DEFAULT '0',
  `ip` varchar(32) NOT NULL,
  `longitude` varchar(11) NOT NULL,
  `latitude` varchar(11) NOT NULL,
  `paid` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `travelsearch`
--
DROP TABLE IF EXISTS `travelsearch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`thomaskarba`@`%` SQL SECURITY DEFINER VIEW `travelsearch`  AS  select `users`.`country` AS `country`,`users`.`region` AS `region`,sum(`users`.`popularity`) AS `sp` from `users` group by `users`.`country` order by `sp` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
