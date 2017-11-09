-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 31, 2017 at 09:02 PM
-- Server version: 5.5.45
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `type` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `body`, `type`) VALUES
(1, 'POST TITLE', '<div class="card card-inverse">\r\n          <img class="card-img img-fluid w-100" src="img/slide-1.jpg" alt="">\r\n          <div class="card-img-overlay bg-overlay">\r\n            <h2 class="card-title text-shadow text-white text-uppercase mb-0">Post Title</h2>\r\n            <h4 class="text-shadow text-white">March 1, 2017</h4>\r\n            <p class="lead card-text text-shadow text-white w-50 d-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit repellat provident quo aliquam eius ea, animi porro magnam totam dolor nam error quas labore eveniet dicta nostrum inventore veniam. Ipsam?</p>\r\n            <a href="#" class="btn btn-secondary">Read More</a>\r\n          </div>\r\n        </div>', 'Read More');

-- --------------------------------------------------------

--
-- Table structure for table `maintexts`
--

CREATE TABLE IF NOT EXISTS `maintexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `url` tinytext NOT NULL,
  `showhide` enum('show','hide') NOT NULL DEFAULT 'show',
  `lang` enum('ru','eng') NOT NULL DEFAULT 'ru',
  `putdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `maintexts`
--

INSERT INTO `maintexts` (`id`, `name`, `body`, `url`, `showhide`, `lang`, `putdate`) VALUES
(1, 'Добро пожаловать на сайт', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam soluta dolore voluptatem, deleniti dignissimos excepturi veritatis cum hic sunt perferendis ipsum perspiciatis nam officiis sequi atque enim ut! Velit, consectetur.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur perspiciatis reprehenderit illo et vitae iste provident debitis quos corporis saepe deserunt ad, officia, minima natus molestias assumenda nisi velit?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit totam libero expedita magni est delectus pariatur aut, aperiam eveniet velit cum possimus, autem voluptas. Eum qui ut quasi voluptate blanditiis?', 'index', 'show', 'ru', '2017-10-24'),
(2, 'CONTACT', 'Phone, Email, Address', 'contacts', 'show', 'ru', '2017-10-24'),
(3, 'BLOG', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit repellat provident quo aliquam eius ea, animi porro magnam totam dolor nam error quas labore eveniet dicta nostrum inventore veniam. Ipsam?', 'BLOG', 'show', 'ru', '2017-10-24'),
(4, 'ABOUT', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam soluta dolore voluptatem, deleniti dignissimos excepturi veritatis cum hic sunt perferendis ipsum perspiciatis nam officiis sequi atque enim ut! Velit, consectetur.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam pariatur perspiciatis reprehenderit illo et vitae iste provident debitis quos corporis saepe deserunt ad, officia, minima natus molestias assumenda nisi velit?', 'ABOUT', 'show', 'ru', '2017-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `body` text NOT NULL,
  `picture` tinytext NOT NULL,
  `price` tinytext NOT NULL,
  `vip` tinytext CHARACTER SET utf32 NOT NULL,
  `putdate` date NOT NULL,
  `url` tinytext NOT NULL,
  `product_code` tinytext NOT NULL,
  `status` tinytext NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `body`, `picture`, `price`, `vip`, `putdate`, `url`, `product_code`, `status`, `catalog_id`, `user_id`) VALUES
(1, 'gyujmkry', 'tu,dety', '17_10_31_08_43_41.jpg', '-', '0', '2017-10-31', '-', '171031084341', 'new', 1, 5),
(2, 'gyujmkry', 'tu,dety', '17_10_31_08_45_38.jpg', '-', '0', '2017-10-31', '-', '171031084538', 'new', 1, 5),
(3, 'hfykfly', 'fyhij,l', '17_10_31_08_45_59.jpg', '-', '0', '2017-10-31', '-', '171031084559', 'new', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `blockunblock` enum('unblock','block') NOT NULL DEFAULT 'unblock',
  `dataReg` date NOT NULL,
  `lastVisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `blockunblock`, `dataReg`, `lastVisit`) VALUES
(1, 'dtyhk', 'tykm@srtj.rftgj', '321', 'unblock', '2017-10-26', '2017-10-26 19:39:35'),
(2, 'srj', 'rsfyjsry@sretj.dxfyhkm', '345', 'unblock', '2017-10-26', '2017-10-26 19:40:03'),
(3, 'dfhn', 'tykm@srtj.rftgj', '456', 'unblock', '2017-10-26', '2017-10-26 19:48:27'),
(4, 'srh', 'rsfyjsry@sretj.dxfyhkm', '345', 'unblock', '2017-10-26', '2017-10-26 19:48:59'),
(5, 'ghsfd', 'kk@gmail.com', '567', 'unblock', '2017-10-26', '2017-10-26 19:49:36'),
(6, '', 'kk@gmail.com', '567', 'unblock', '2017-10-26', '2017-10-26 20:27:04'),
(7, '', 'kk@gmail.com', '567', 'unblock', '2017-10-26', '2017-10-26 20:27:11'),
(8, '', 'kk@gmail.com', '567', 'unblock', '2017-10-26', '2017-10-26 21:04:08'),
(9, '', 'kk@gmail.com', '567', 'unblock', '2017-10-26', '2017-10-26 21:04:44'),
(10, '', 'kk@gmail.com', '567', 'unblock', '2017-10-31', '2017-10-31 18:51:17'),
(11, '', 'kk@gmail.com', '567', 'unblock', '2017-10-31', '2017-10-31 19:26:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
