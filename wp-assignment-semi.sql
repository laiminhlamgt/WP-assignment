-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 12:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_assignment_semi`
--
CREATE DATABASE IF NOT EXISTS `wp_assignment_semi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wp_assignment_semi`;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` binary(16) NOT NULL,
  `data` mediumblob NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `type_of_house_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `price_unit_id` int(11) NOT NULL,
  `acreage` decimal(10,0) NOT NULL,
  `address` varchar(200) NOT NULL,
  `number_of_floor` decimal(10,0) NOT NULL,
  `number_of_room` int(11) NOT NULL,
  `number_of_restroom` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_description` varchar(200) NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_address` varchar(200) NOT NULL,
  `telephone_number` varchar(200) NOT NULL,
  `mobile_number` varchar(200) NOT NULL,
  `is_use_user_contact` tinyint(1) NOT NULL,
  `picture1_id` int(11) NOT NULL,
  `picture2_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `custom_name` varchar(200) NOT NULL,
  `street_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_unit`
--

CREATE TABLE `price_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `symbol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

CREATE TABLE `street` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_of_house`
--

CREATE TABLE `type_of_house` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `telephone_number` varchar(20) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `role` char(5) NOT NULL DEFAULT 'guest',
  `avatar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `telephone_number`, `mobile_number`, `role`, `avatar_id`) VALUES
(1, NULL, NULL, 'lam', '2f765f363d82bb933634d96dae26b83d', NULL, NULL, 'admin', NULL),
(2, NULL, NULL, 'duong', 'd1bf9a3a272b0b1cf15783cabaf29211', NULL, NULL, 'admin', NULL),
(3, NULL, NULL, 'minh', '8bfe98edf23dae257637df7792125500', NULL, NULL, 'admin', NULL),
(4, NULL, NULL, 'tran', 'a87d8de39c1a156e00c438b42dd6bb28', NULL, NULL, 'admin', NULL),
(5, NULL, NULL, 'minhlam', 'd4dd2af04afe267a129ee6a6462b0426', NULL, NULL, 'guest', NULL),
(13, NULL, NULL, 'baotran', 'ab1c0fc125a9ceb3021d5f3987128fcf', NULL, NULL, 'guest', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_of_house_id` (`type_of_house_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `price_unit_id` (`price_unit_id`),
  ADD KEY `picture_1` (`picture1_id`),
  ADD KEY `picture_2` (`picture2_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `street_id` (`street_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `ward_id` (`ward_id`);

--
-- Indexes for table `price_unit`
--
ALTER TABLE `price_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_house`
--
ALTER TABLE `type_of_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `avatar` (`avatar_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_of_house`
--
ALTER TABLE `type_of_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`type_of_house_id`) REFERENCES `type_of_house` (`id`),
  ADD CONSTRAINT `house_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `house_ibfk_3` FOREIGN KEY (`picture1_id`) REFERENCES `gallery` (`id`),
  ADD CONSTRAINT `house_ibfk_4` FOREIGN KEY (`picture2_id`) REFERENCES `gallery` (`id`),
  ADD CONSTRAINT `house_ibfk_5` FOREIGN KEY (`price_unit_id`) REFERENCES `price_unit` (`id`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`street_id`) REFERENCES `street` (`id`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `location_ibfk_3` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`avatar_id`) REFERENCES `gallery` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
