-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 07:40 AM
-- Server version: 5.1.73-community
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twist`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(50) NOT NULL,
  `photos` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `url` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `album_big` varchar(255) NOT NULL,
  `album_cover` varchar(255) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`url`, `title`, `category`, `description`, `album_big`, `album_cover`) VALUES
(1, 'Round Icons', 'Graphic Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/roundicons-free.png', 'img/portfolio/roundicons.png'),
(2, 'Startup Framework', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/startup-framework-preview.png', 'img/portfolio/startup-framework.png'),
(3, 'Treehouse', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/treehouse-preview.png', 'img/portfolio/treehouse.png'),
(4, 'Golden', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/golden-preview.png', 'img/portfolio/golden.png'),
(5, 'Escape', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/escape-preview.png', 'img/portfolio/escape.png'),
(6, 'Dreams', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/dreams-preview.png', 'img/portfolio/dreams.png'),
(9, 'Round Icons', 'Graphic Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/roundicons-free.png', 'img/portfolio/roundicons.png'),
(10, 'Startup Framework', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/startup-framework-preview.png', 'img/portfolio/startup-framework.png'),
(11, 'Treehouse', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/treehouse-preview.png', 'img/portfolio/treehouse.png'),
(12, 'Golden', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/golden-preview.png', 'img/portfolio/golden.png'),
(13, 'Escape', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/escape-preview.png', 'img/portfolio/escape.png'),
(14, 'Dreams', 'Website Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/dreams-preview.png', 'img/portfolio/dreams.png'),
(15, 'Round Icons 2', 'Graphic Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/roundicons-free.png', 'img/portfolio/roundicons.png'),
(16, 'Startup Framework', 'Application Design', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rutrum ullamcorper tellus faucibus varius. Phasellus maximus ex in eros cursus, vel euismod urna ultricies. Nullam tristique nibh quis nisi dignissim, quis pellentesque urna condimentum. Fusce c', 'img/portfolio/startup-framework-preview.png', 'img/portfolio/startup-framework.png');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`url`) VALUES
('img/promo.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
