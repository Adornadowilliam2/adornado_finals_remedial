-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 06:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dts_finalsdb`
--
CREATE DATABASE IF NOT EXISTS `dts_finalsdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dts_finalsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminpass'),
(2, 'admin', 'jake the dog');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `name`) VALUES
(2, 'Are you an IT student because you are studying programming languages, or are you studying programming languages because you are an IT student?'),
(3, 'Learning Web Development is fun.'),
(14, 'おはようございます'),
(16, 'Bakit sir Naka-constraint yung database :('),
(17, 'I am interested in programming.'),
(18, 'Ang hirap ng walang table join :('),
(21, 'Are you alive because you have a purpose, or do you have a purpose because you are alive?');

-- --------------------------------------------------------

--
-- Table structure for table `questions_answers`
--

DROP TABLE IF EXISTS `questions_answers`;
CREATE TABLE `questions_answers` (
  `question_id` int(11) NOT NULL,
  `sd` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0,
  `n` int(11) NOT NULL DEFAULT 0,
  `a` int(11) NOT NULL DEFAULT 0,
  `sa` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions_answers`
--

INSERT INTO `questions_answers` (`question_id`, `sd`, `d`, `n`, `a`, `sa`) VALUES
(2, 0, 7, 0, 0, 3),
(3, 0, 0, 5, 0, 0),
(14, 2, 0, 1, 0, 5),
(16, 0, 1, 0, 0, 1),
(17, 0, 0, 2, 0, 0),
(18, 2, 0, 0, 5, 0),
(21, 2, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_answers`
--
ALTER TABLE `questions_answers`
  ADD UNIQUE KEY `question_id_2` (`question_id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions_answers`
--
ALTER TABLE `questions_answers`
  ADD CONSTRAINT `questions_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
