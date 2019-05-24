-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 02:22 AM
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
-- Database: `newmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `promoter` varchar(55) NOT NULL,
  `customer` varchar(55) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `promoter`, `customer`, `comment`, `date`) VALUES
(85, 'arthurspizza', 'ruchin1', 'w', '2019-05-19'),
(86, 'arthurspizza', 'ruchin1', '     ', '2019-05-19'),
(87, 'arthurspizza', 'ruchinamaratunga', 'this is one of the best place, make sure to try this', '2019-05-19'),
(88, 'arthurspizza', 'ruchinamaratunga', '', '2019-05-19'),
(89, 'arthurspizza', 'ruchinamaratunga', 'a', '2019-05-19'),
(90, 'arthurspizza', 'ruchinamaratunga', 'a', '2019-05-19'),
(91, 'arthurspizza', 'ruchinamaratunga', 'this place is awesome', '2019-05-19'),
(92, 'arthurspizza', 'ruchinamaratunga', 'great place for a peaceful evening', '2019-05-19'),
(93, 'arthurspizza', 'ruchinamaratunga', 'my name is ruchin amaratunga', '2019-05-20'),
(94, 'arthurspizza', 'ruchinamaratunga', 'great', '2019-05-20'),
(95, 'arthurspizza', 'ruchinamaratunga', 'not as good as pizza hut', '2019-05-20'),
(96, 'arthurspizza', 'ruchinamaratunga', 'dsafs', '2019-05-20'),
(97, 'arthurspizza', 'ruchinamaratunga', 'ruchin', '2019-05-20'),
(98, 'arthurspizza', 'ruchinamaratunga', 'e', '2019-05-20'),
(99, 'arthurspizza', 'ruchinamaratunga', 'adfas', '2019-05-20'),
(100, 'arthurspizza', 'ruchinamaratunga', 'asfsdf', '2019-05-20'),
(101, 'arthurspizza', 'ruchinamaratunga', 'asdf', '2019-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(175) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(150) NOT NULL,
  `zip` varchar(65) NOT NULL,
  `home_phone` varchar(55) NOT NULL,
  `cell_phone` varchar(55) NOT NULL,
  `work_phone` varchar(55) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `fname`, `lname`, `email`, `address`, `address2`, `city`, `state`, `zip`, `home_phone`, `cell_phone`, `work_phone`, `deleted`) VALUES
(1, 1, 'Ruchin', 'Amaratunga', 'raruchin@gmail.com', '6/2, Convent Road , Bolawalana ', '', 'Negombo', 'Western Province', '1709', '031-2221736', '0776644179', '', 0),
(3, 0, 'Antoinette', 'Parham', 'antoinette@sharklasers.com', '', '', '', '', '', '', '', '', 0),
(5, 0, 'Toni', 'Anote', 'toni@sharklasers.com', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(350) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fname`, `lname`, `email`, `deleted`) VALUES
(1, 'ruchinamaratunga', '$2y$10$Y7YBTBy3Favmk0xhbs5V0.eZaZvALDTSyE5oGDXhjsasyFLnWFWlG', 'Ruchin', 'Amaratunga', 'raruchin@gmail.com', 0),
(2, 'kolithafernando', '$2y$10$Y7YBTBy3Favmk0xhbs5V0.eZaZvALDTSyE5oGDXhjsasyFLnWFWlG', 'Kolith', 'Fernando', 'kfernando@gmail.com', 0),
(3, 'ruchin1', '$2y$10$oDxgXiB07sMZxP7nP6bUC.jzkiuSbBd9b8jT.nWLXFfCdtH17s0PO', 'ru', 'chin', 'ruchin@gmail.com', 0),
(4, 'pathi12', '$2y$10$HsLiiUlCf5on1M4/irkrreBHoviMjZJ7JcAdM.lT2w4/Nm3QNPNTu', 'hasitha', 'pathirana', 'hasithap@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promoter`
--

CREATE TABLE `promoter` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `promoter_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(355) NOT NULL,
  `map_location` varchar(150) DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `website` varchar(250) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promoter`
--

INSERT INTO `promoter` (`id`, `username`, `promoter_name`, `email`, `password`, `map_location`, `phone_number`, `website`, `fb_link`, `rating`, `deleted`) VALUES
(1, 'pizzahut', 'Pizza Hut', 'pizzahut@gmail.com', '$2y$10$G/S9BV0Xugv6971HSOhRiekB7by/Prjkpm.RdSeEDj28HlcxFCq42', 'Negombo', '222222333', 'https://www.pizzahut.lk/', 'https://www.facebook.com/pizzahutsrilanka/', 4, 0),
(2, 'foodcity', 'Cargilles Food City', 'foodcity@gmail.com', '$2y$10$NZsqPYyVz0.Ee5vpSs.DRu5DS/nxaPnwSIx9k86Q5MOT.CPwpOgSK', 'Colombo', '0112225345', 'http://www.cargillsceylon.com/OurBusinesses/FoodCity.aspx', 'https://www.facebook.com/cargillsfoodcity/', 4, 0),
(3, 'odel', 'Odel', 'odel123@gmail.com', '$2y$10$wcKO8CyBSpUATAAr.PNd7OfNCFQ/NKkRqfPnTe.jLuwXD.9IiL98q', NULL, '0312221212', 'http://www.odel.lk/', 'https://www.facebook.com/OdelOnline/', NULL, 0),
(4, 'arthurspizza', 'Arther\'s Pizza', 'arthurspizza@gmail.com', '$2y$10$BZ7G1cUQK7t9K.Y0TaX3f.YP1wJpasAjmGLdLkf40I3/cZZ3Ki5Ry', 'Moratuwa', '0312217177', 'https://www.yamu.lk/menu/arthurs-pizza', 'https://www.facebook.com/arthurspizzas/', 3.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promo_id` int(11) NOT NULL,
  `catagory` varchar(45) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image_path` varchar(300) DEFAULT NULL,
  `link` varchar(400) NOT NULL,
  `state` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(400) DEFAULT NULL,
  `pr_username` varchar(45) NOT NULL,
  `ad_username` varchar(45) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promo_id`, `catagory`, `title`, `description`, `image_path`, `link`, `state`, `start_date`, `end_date`, `location`, `pr_username`, `ad_username`, `deleted`) VALUES
(1, 'Food', 'Pizza Hut', 'Pizza Hut is an American restaurant chain and international franchise which was founded in 1958 by Dan and Frank Carney. ', 'img/blog/04-fashion-upgrades-classic-coats.jpg', 'https://www.pizzahut.lk/', 'Approved', '2019-05-03', '2019-05-30', 'Negombo', 'pizzahut', 'string1', 0),
(2, 'Food', 'Arthurs place', 'Authurs place is an American restaurant chain and international franchise which was founded in 1958 by Dan and Frank Carney. ', 'img/blog/04-fashion-upgrades-classic-coats.jpg', 'https://www.pizzahut.lk/', 'Approved', '2019-05-05', '2019-05-25', 'Negombo', 'arthurspizza', 'string1', 0),
(3, 'Cloths', 'Odel', 'Shop online now at ODEL, the best shopping destination in Sri Lanka for ladies wear, menswear, kids wear, homeware, food and more', 'img/blog/04-fashion-upgrades-classic-coats (1).jpg', 'http://www.odel.lk/', 'Approved', '2019-05-04', '2019-05-20', 'Negombo', 'odel', 'string1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `promoter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `customer`, `promoter`) VALUES
(1, 'ruchin1', 'pizzahut'),
(9, 'ruchinamaratunga', 'arthurspizza'),
(16, 'ruchin1', 'arthurspizza');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `acl` text,
  `deleted` tinyint(4) DEFAULT '0',
  `user_type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `acl`, `deleted`, `user_type`) VALUES
(1, 'ruchinamaratunga', 'raruchin@gmail.com', '$2y$10$Y7YBTBy3Favmk0xhbs5V0.eZaZvALDTSyE5oGDXhjsasyFLnWFWlG', 'Ruchin', 'Amaratunga', '', 0, 'Customer'),
(2, 'kolithafernando', 'kfernando@gmail.com', '$2y$10$Y7YBTBy3Favmk0xhbs5V0.eZaZvALDTSyE5oGDXhjsasyFLnWFWlG', 'Kolith', 'Fernando', '', 0, 'Customer'),
(3, 'ruchin1', 'ruchin@gmail.com', '$2y$10$oDxgXiB07sMZxP7nP6bUC.jzkiuSbBd9b8jT.nWLXFfCdtH17s0PO', 'ru', 'chin', '', 0, 'Customer'),
(6, 'pathi12', 'hasithap@gmail.com', '$2y$10$HsLiiUlCf5on1M4/irkrreBHoviMjZJ7JcAdM.lT2w4/Nm3QNPNTu', 'hasitha', 'pathirana', NULL, NULL, 'Customer'),
(7, 'admin', 'raruchin@gmail.com', '$2y$10$Fq.birm0NW2jWxcJdfKXQuezwu5IURqC.B8DhgOXEfC8MrFF.oonu', 'ruchin', 'amaratunga', '[\"Admin\"]', 0, 'Admin'),
(9, 'pizzahut', 'pizzahut@gmail.com', '$2y$10$G/S9BV0Xugv6971HSOhRiekB7by/Prjkpm.RdSeEDj28HlcxFCq42', '', '', '[\"Promoter\"]', 0, 'Promoter'),
(10, 'foodcity', 'foodcity@gmail.com', '$2y$10$NZsqPYyVz0.Ee5vpSs.DRu5DS/nxaPnwSIx9k86Q5MOT.CPwpOgSK', '', '', '[\"Promoter\"]', 0, 'Promoter'),
(11, 'odel', 'odel123@gmail.com', '$2y$10$A1NR94C746bdrSLYxvMbjeZNCSrDhFiafUHdyb0oO1oFGS8MBfriS', '', '', NULL, 0, 'Promoter');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleted` (`deleted`),
  ADD KEY `deleted_2` (`deleted`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promoter`
--
ALTER TABLE `promoter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promoter`
--
ALTER TABLE `promoter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
