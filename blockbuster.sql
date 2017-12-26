-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 08:25 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blockbuster`
--

-- --------------------------------------------------------

--
-- Table structure for table `celebrity`
--

CREATE TABLE IF NOT EXISTS `celebrity` (
  `celeb_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  PRIMARY KEY (`celeb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `celebrity`
--

INSERT INTO `celebrity` (`celeb_id`, `firstName`, `lastName`, `gender`) VALUES
(1, 'Daniel', 'Kaluuya', 'M'),
(2, 'Shailene', 'Woodley', 'F'),
(3, 'Sam', 'Worthington', 'M'),
(4, 'Ryan', 'Reynolds', 'M'),
(5, 'Michael', 'Keaton', 'M'),
(6, 'Gena', 'Rowlands', 'F'),
(7, 'Tom', 'Holland', 'M'),
(8, 'Scott', 'Mechlowicz', 'M'),
(9, 'Danny', 'Elfman', 'M'),
(10, 'Donald', 'Pleasence', 'M'),
(11, 'Sigourney', 'Weaver', 'F'),
(12, 'Idris', 'Elba', 'M'),
(13, 'Zach', 'Galifianakis', 'M'),
(14, 'Ice', 'Cube', 'M'),
(15, 'Denzel', 'Washington', 'M'),
(16, 'Leonardo', 'DiCaprio', 'M'),
(17, 'Keanu', 'Reeves', 'M'),
(18, 'Arnold', 'Schwarzenegger', 'M'),
(19, 'Gina', 'Carano', 'F'),
(20, 'Mandy', 'Moore', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `formats`
--

CREATE TABLE IF NOT EXISTS `formats` (
  `format_id` varchar(5) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `format_type` varchar(10) NOT NULL,
  PRIMARY KEY (`format_id`),
  UNIQUE KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formats`
--

INSERT INTO `formats` (`format_id`, `movie_id`, `format_type`) VALUES
('1', 0, 'DVD'),
('2', 1, 'Blueray'),
('3', 2, 'Digital');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(40) DEFAULT NULL,
  `movie_category` varchar(40) DEFAULT NULL,
  `duration` int(3) NOT NULL,
  `release_year` int(4) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_title`, `movie_category`, `duration`, `release_year`) VALUES
(1, 'Get Out', 'Horror', 104, 2017),
(2, 'The Fault in Our Stars', 'Drama', 126, 2014),
(3, 'Avatar', 'Fantasy', 162, 2009),
(4, 'Deadpool', 'Action', 108, 2016),
(5, 'Batman', 'Adventure', 126, 1989),
(6, 'The Notebook', 'Romance', 123, 2004),
(7, 'Spider Man Homecoming', 'Action', 133, 2017),
(8, 'Euro Trip', 'Comedy', 93, 2004),
(9, 'The Nightmare Before Christmas', 'Horror', 76, 1993),
(10, 'Halloween', 'Horror', 91, 1978),
(11, 'Alien', 'Horror', 117, 1979),
(12, 'Pacific Rim', 'Adventure', 131, 2013),
(13, 'The Hangover', 'Comedy', 100, 2009),
(14, 'Friday', 'Drama', 91, 1995),
(15, 'The Equalizer', 'Crime', 132, 2014),
(16, 'Inception', 'Action', 148, 2010),
(17, 'John Wick', 'Crime', 101, 2014),
(18, 'Kindergarten Cop', 'Comedy', 111, 1990),
(19, 'In the Blood', 'Action', 108, 2014),
(20, 'A Walk to Remember', 'Romance', 101, 2002);

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart`
--

CREATE TABLE IF NOT EXISTS `shop_cart` (
  `select_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `format_id` int(11) NOT NULL,
  `celeb_id` int(11) NOT NULL,
  PRIMARY KEY (`select_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
