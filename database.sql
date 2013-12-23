-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 08:28 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `letsmake_p4_letsmakewebapps_biz`
--
CREATE DATABASE IF NOT EXISTS `letsmake_p4_letsmakewebapps_biz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `letsmake_p4_letsmakewebapps_biz`;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `performance` (
  `user_id` int(11) NOT NULL,
  `stock_symbol` varchar(255) NOT NULL,
  `count_bought` int(11) NOT NULL,
  `count_sold` int(11) NOT NULL,
  `cost_basis` float NOT NULL,
  `realized_gain` float NOT NULL,
  `unrealized_gain` float NOT NULL,
  `amount_invested` float NOT NULL,
  PRIMARY KEY (`user_id`,`stock_symbol`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`user_id`, `stock_symbol`, `count_bought`, `count_sold`, `cost_basis`, `realized_gain`, `unrealized_gain`, `amount_invested`) VALUES
(9, 'axp', 25, 0, 87.57, 0, 0, 2189.25),
(9, 'f', 100, 65, 15.42, 0, 0, 539.7),
(9, 'g', 50, 0, 17.72, 0, 0, 886);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `txn_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `txn_time` int(11) NOT NULL,
  `stock_symbol` varchar(255) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `stocks_count` int(11) NOT NULL,
  `market_price` float NOT NULL,
  `total_order` float NOT NULL,
  PRIMARY KEY (`txn_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`txn_id`, `user_id`, `txn_time`, `stock_symbol`, `txn_type`, `stocks_count`, `market_price`, `total_order`) VALUES
(21, 9, 1387743787, 'f', 'Buy', 100, 15.42, 1542),
(22, 9, 1387743902, 'axp', 'Buy', 25, 87.57, 2189.25),
(23, 9, 1387743936, 'f', 'Sell', 15, 15.42, 231.3),
(24, 9, 1387744005, 'g', 'Buy', 50, 17.72, 886),
(25, 9, 1387744033, 'f', 'Sell', 50, 15.42, 771);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `closed` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `closed`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `balance`) VALUES
(9, 1387588727, 0, 'flSb.FxCUnmf2zutazu', 'coZ076b.nao1g', 0, '', 'test', 'case', 'test@case', 908.85);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
