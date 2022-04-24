-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 02:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `gymclass`
--

CREATE TABLE `gymclass` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trainer` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymclass`
--

INSERT INTO `gymclass` (`id`, `name`, `trainer`, `time`, `description`) VALUES
(1, 'Yoga Class', 'ALi', '16:00:00', 'Yoga Class'),
(2, 'Cycling', 'Arham', '18:00:00', 'Cycling Class'),
(5, 'Yoga', 'Umar', '19:00:00', 'Yoga class 2');

-- --------------------------------------------------------

--
-- Table structure for table `gymmemberships`
--

CREATE TABLE `gymmemberships` (
  `id` int(11) NOT NULL,
  `gymclassid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymmemberships`
--

INSERT INTO `gymmemberships` (`id`, `gymclassid`, `userid`) VALUES
(21, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `address`, `isadmin`) VALUES
(3, 'ashar', 'f30aa7a662c728b7407c54ae6bfd27d1', 'ashar@gmail.com', '0990909', '2341', 1),
(6, 'ashar2', 'f30aa7a662c728b7407c54ae6bfd27d1', 'ashar2@gmail.com', '0990901', 'ABD Block, Sgf.', 0),
(8, 'ashar3', 'f30aa7a662c728b7407c54ae6bfd27d1', 'ashar3@gmail.com', '090078601', 'House #5, ABC.', 0),
(9, 'umar', 'f30aa7a662c728b7407c54ae6bfd27d1', 'umar@gmail.com', '080938128', 'ABC Colony', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gymclass`
--
ALTER TABLE `gymclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymmemberships`
--
ALTER TABLE `gymmemberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gymclass`
--
ALTER TABLE `gymclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gymmemberships`
--
ALTER TABLE `gymmemberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
