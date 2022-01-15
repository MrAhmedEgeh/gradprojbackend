-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 02:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `level_name`) VALUES
(1, 'Skull Forest'),
(2, 'Dark Dungeon'),
(3, 'Sky Eye');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `playerid` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `coins` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerid`, `username`, `password`, `email`, `level_id`, `coins`) VALUES
(2, 'testuser', 1998, 'mrxb114@gmail.com', 2, 0),
(3, 'test2', 2020, 'test2@emu.edu.tr', 1, 0),
(4, 'regTest', 19982020, 'regTest@gmail.com', 2, 6),
(5, 'kingpower114', 123456, 'kingpower114@gmail.c', 1, 0),
(6, 'noop', 123456, 'noop@gmail.com', 1, 0),
(7, 'guy114', 1234567, 'guy114@gmail.com', 3, 0),
(8, 'test2022', 1234567, 'test@gmail.com', 3, 0),
(9, 'finaltester', 1234567, 'tester@gmail.com', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `scoring`
--

CREATE TABLE `scoring` (
  `player_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `score` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scoring`
--

INSERT INTO `scoring` (`player_id`, `level_id`, `score`) VALUES
(2, 2, '3'),
(2, 1, '1'),
(2, 3, '0'),
(7, 1, '0'),
(7, 2, '0'),
(7, 3, '0'),
(8, 1, '0'),
(8, 2, '0'),
(8, 3, '0'),
(9, 1, '0'),
(9, 2, '0'),
(9, 3, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`playerid`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `scoring`
--
ALTER TABLE `scoring`
  ADD KEY `player_id` (`player_id`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `playerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`);

--
-- Constraints for table `scoring`
--
ALTER TABLE `scoring`
  ADD CONSTRAINT `scoring_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`playerid`),
  ADD CONSTRAINT `scoring_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
