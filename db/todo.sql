-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 12, 2020 at 06:57 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `user` int(4) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `dueDate` varchar(30) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `noteID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`noteID`),
  KEY `usedID` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=297 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`user`, `title`, `description`, `dueDate`, `color`, `noteID`) VALUES
(152, 'helloe ', 'whazzyp', '', '#80ff80', 240),
(150, 'hello there', 'note', '', '#ffffff', 241),
(150, 'hello', '', '2020-04-25', '#8087e1', 264),
(150, 'heheheh', '', '', '#ffffff', 265),
(151, 'Buy groceries', 'Milk\r\nbread\r\neggs', '2020-04-30', '#89edde', 289),
(151, 'Birthday', 'Monday - Jessica\r\nFriday - James', '2020-05-01', '#cfa8d5', 292),
(151, 'Car parts', 'Fuel filter R100\r\nOil filter R40\r\nTire R500', '2020-05-08', '#febebc', 293),
(151, 'sdklfvlskmv', '', '', '#ffffff', 296);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(128) NOT NULL,
  `verified` int(1) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniqueUser` (`name`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `password`, `email`, `verified`, `pic`) VALUES
(150, 'Leonardus', 'Botes', 'leonardus', 'leonardusdirkstofbergbotes@gmail.com', 1, '20200303_192531-min.jpg'),
(151, 'Hendrik', 'hendrik', 'hendrik', 'hendrik@gmail.com', 1, ''),
(152, 'tess', 'tess', 'tessie', 'tess@gmail.co', 1, ''),
(153, 'Jeandre', 'van Dyk', 'jeandre', 'jeandre@gmail.com', 1, ''),
(154, 'jordan', 'jordan', 'jordan', 'jordan@gmail.com', NULL, ''),
(155, 'joe', 'joe', 'joedirt', 'joedirt@gmail.com', 1, ''),
(156, 'Ben', 'ben', 'bennie', 'ben@gmail.com', NULL, ''),
(157, 'shen', 'shen', 'shennie', 'shen@gmail.com', 1, ''),
(158, 'Tess', 'Slioserg', 'tessie', 'tess@gmail.com', 1, ''),
(159, 'drake', 'drake', 'drakies', 'drake@gmail.com', 1, '1_hp-yfKsmzsj711iLbM8eEw.jpeg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
