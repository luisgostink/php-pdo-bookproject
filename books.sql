-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 24, 2023 at 11:38 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `isbn` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `category` enum('HTML','CSS','JAVASCRIPT') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `author`, `year`, `category`) VALUES
(1, 3454, 'Man\'s Search for Meaning', 'Viktor Frankl', 1946, 'HTML'),
(2, 3455, 'Steve Jobs', 'Walter Isaacson', 2015, 'HTML'),
(3, 4765, 'The Master: The Brilliant Career of Roger Federer.', 'Christopher Clarey', 2021, 'HTML'),
(4, 9654, 'Strokes of Genius: Federer, Nadal, and the Greatest Match Ever Played\r\n', 'L. Jon Wertheim', 2010, 'HTML'),
(5, 8471, 'Rafa: My Story', 'John Carlin, Rafael Nadal', 2012, 'HTML'),
(6, 5482, 'Roger Federer and Rafael Nadal\r\nThe Lives and Careers of Two Tennis Legends', 'S, Fest', 2018, 'HTML'),
(7, 6354, 'Un Verdor Terrible', 'Benjamin Labatut', 2020, 'HTML'),
(8, 4632, 'La piedra de la locura', 'Benjamin Labatut', 2023, 'HTML');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
