-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2024 at 09:40 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `bookcover` varchar(64) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `members_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `bookcover`, `status`, `members_id`) VALUES
(6, 'Made with Paper', 'Florence Temko', '1733517016-madewithpaper.jpg', 'Availible', 12345),
(7, 'Made with Paper', 'Florence Temko', '1733517032-madewithpaper.jpg', 'Availible', 12345),
(8, 'Of Mice and Men', 'John Stienbeck', '1733535764-ofmiceandmen.jpg', 'Availible', 12345),
(9, 'The Great International Paper Airplane', 'Jerry Mander', '1733758394-thegreatinternationalpaperairplane.jpg', 'Availible', 54321),
(10, 'Self-Working Close-Up Card Magic', 'Karl Fulves', '1734018497-cardmagic.jpg', 'Availible', 22334),
(11, 'The Ultimate Paperairplane', 'Richard Kline', '1734028634-ultimatepaperairplane.jpg', 'Availible', 77777);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `borrow_date` datetime DEFAULT NULL,
  `return_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `members_id`, `books_id`, `borrow_date`, `return_date`) VALUES
(1, 12345, 9, '2024-12-10 03:24:39', '2024-12-11 23:37:34'),
(2, 54321, 8, '2024-12-10 14:46:54', '2024-12-11 23:06:46'),
(3, 54321, 6, '2024-12-11 22:09:55', '2024-12-11 23:39:28'),
(4, 12345, 9, '2024-12-11 23:20:52', '2024-12-11 23:37:34'),
(5, 22334, 9, '2024-12-12 10:49:50', '2024-12-12 10:49:59'),
(6, 77777, 8, '2024-12-12 13:37:44', '2024-12-12 13:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `members_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `email`, `password`, `members_id`) VALUES
(2, 'aJustice@waa.com', '*A6228E8DD67D448610B42F0AA385C62A2EE2AB15', 12345),
(3, 'kGavin@jppo.com', '*BA9EC5AFDE2F49A2A7C59D62AA0055E1D76CDC0E', 54321),
(4, 'tWright@waa.com', '*86BFCA1F0855C27EE2E6CE0EACCDB9BE67D103C5', 22334),
(6, 'jcode@gmail.com', '*A61B941C0A5F9569124B0F07499EF1C9ECB8B587', 77777);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(5) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `address`, `phonenumber`) VALUES
(12345, 'Apollo', 'Justice', '123 Japanfornia', '8009992222'),
(22334, 'Trucy', 'Wright', '134 Japanfornia', '2245534323'),
(54321, 'Klavier', 'Gavin', '223 Japanfornia', '6883339984'),
(77777, 'John', 'Code', '123 street', '7777777777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_books_members1_idx` (`members_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_borrow_members1_idx` (`members_id`),
  ADD KEY `fk_borrow_books1_idx` (`books_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_credentials_members_idx` (`members_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77778;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `fk_borrow_books1` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_borrow_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `credentials`
--
ALTER TABLE `credentials`
  ADD CONSTRAINT `fk_credentials_members` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
