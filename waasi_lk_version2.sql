-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 11:56 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waasi.lk_version2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_promotion`
--

CREATE TABLE `confirmed_promotion` (
  `promo_id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `link` varchar(400) DEFAULT NULL,
  `state` varchar(15) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `end_date` varchar(15) NOT NULL,
  `location` varchar(400) DEFAULT NULL,
  `pr_username` varchar(45) NOT NULL,
  `ad_username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(45) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `phone_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pending_promotion`
--

CREATE TABLE `pending_promotion` (
  `promo_id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `promotor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_commenting`
--

CREATE TABLE `promotion_commenting` (
  `cus_username` varchar(45) DEFAULT NULL,
  `promo_id` int(11) DEFAULT NULL,
  `comment` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_rating`
--

CREATE TABLE `promotion_rating` (
  `cus_username` varchar(45) NOT NULL DEFAULT '',
  `promo_id` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotor`
--

CREATE TABLE `promotor` (
  `username` varchar(45) NOT NULL,
  `promotor_name` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `map_location` float DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `fb_link` varchar(200) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotor_address`
--

CREATE TABLE `promotor_address` (
  `pr_username` varchar(45) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotor_commenting`
--

CREATE TABLE `promotor_commenting` (
  `cus_username` varchar(45) NOT NULL,
  `pr_username` varchar(45) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotor_rating`
--

CREATE TABLE `promotor_rating` (
  `cus_username` varchar(45) NOT NULL,
  `pr_username` varchar(45) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotor_subscribing`
--

CREATE TABLE `promotor_subscribing` (
  `cus_username` varchar(45) NOT NULL,
  `pr_username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `confirmed_promotion`
--
ALTER TABLE `confirmed_promotion`
  ADD PRIMARY KEY (`promo_id`),
  ADD KEY `pr_username` (`pr_username`),
  ADD KEY `ad_username` (`ad_username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `password` (`password`,`email`);

--
-- Indexes for table `pending_promotion`
--
ALTER TABLE `pending_promotion`
  ADD PRIMARY KEY (`promo_id`),
  ADD KEY `promotor` (`promotor`);

--
-- Indexes for table `promotion_commenting`
--
ALTER TABLE `promotion_commenting`
  ADD KEY `cus_username` (`cus_username`),
  ADD KEY `promo_id` (`promo_id`);

--
-- Indexes for table `promotion_rating`
--
ALTER TABLE `promotion_rating`
  ADD PRIMARY KEY (`cus_username`,`promo_id`),
  ADD KEY `promo_id` (`promo_id`);

--
-- Indexes for table `promotor`
--
ALTER TABLE `promotor`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `promotor_address`
--
ALTER TABLE `promotor_address`
  ADD KEY `pr_username` (`pr_username`);

--
-- Indexes for table `promotor_commenting`
--
ALTER TABLE `promotor_commenting`
  ADD KEY `cus_username` (`cus_username`),
  ADD KEY `pr_username` (`pr_username`);

--
-- Indexes for table `promotor_rating`
--
ALTER TABLE `promotor_rating`
  ADD PRIMARY KEY (`cus_username`,`pr_username`),
  ADD KEY `pr_username` (`pr_username`);

--
-- Indexes for table `promotor_subscribing`
--
ALTER TABLE `promotor_subscribing`
  ADD PRIMARY KEY (`cus_username`,`pr_username`),
  ADD KEY `pr_username` (`pr_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confirmed_promotion`
--
ALTER TABLE `confirmed_promotion`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_promotion`
--
ALTER TABLE `pending_promotion`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmed_promotion`
--
ALTER TABLE `confirmed_promotion`
  ADD CONSTRAINT `confirmed_promotion_ibfk_1` FOREIGN KEY (`pr_username`) REFERENCES `promotor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `confirmed_promotion_ibfk_2` FOREIGN KEY (`ad_username`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pending_promotion`
--
ALTER TABLE `pending_promotion`
  ADD CONSTRAINT `pending_promotion_ibfk_1` FOREIGN KEY (`promotor`) REFERENCES `promotor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotion_commenting`
--
ALTER TABLE `promotion_commenting`
  ADD CONSTRAINT `promotion_commenting_ibfk_1` FOREIGN KEY (`cus_username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promotion_commenting_ibfk_2` FOREIGN KEY (`promo_id`) REFERENCES `confirmed_promotion` (`promo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotion_rating`
--
ALTER TABLE `promotion_rating`
  ADD CONSTRAINT `promotion_rating_ibfk_1` FOREIGN KEY (`cus_username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promotion_rating_ibfk_2` FOREIGN KEY (`promo_id`) REFERENCES `confirmed_promotion` (`promo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotor_address`
--
ALTER TABLE `promotor_address`
  ADD CONSTRAINT `promotor_address_ibfk_1` FOREIGN KEY (`pr_username`) REFERENCES `promotor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotor_commenting`
--
ALTER TABLE `promotor_commenting`
  ADD CONSTRAINT `promotor_commenting_ibfk_3` FOREIGN KEY (`cus_username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promotor_commenting_ibfk_4` FOREIGN KEY (`pr_username`) REFERENCES `promotor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotor_rating`
--
ALTER TABLE `promotor_rating`
  ADD CONSTRAINT `promotor_rating_ibfk_1` FOREIGN KEY (`cus_username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promotor_rating_ibfk_2` FOREIGN KEY (`pr_username`) REFERENCES `promotor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promotor_subscribing`
--
ALTER TABLE `promotor_subscribing`
  ADD CONSTRAINT `promotor_subscribing_ibfk_1` FOREIGN KEY (`cus_username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promotor_subscribing_ibfk_2` FOREIGN KEY (`pr_username`) REFERENCES `promotor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
