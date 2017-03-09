-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2017 at 06:40 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ASS`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` varchar(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `complete_address` varchar(100) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `emergency_no` varchar(50) NOT NULL,
  `license_no` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `change_password_status` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `email_address`, `password`, `image`, `fname`, `mname`, `lname`, `complete_address`, `contact_no`, `emergency_no`, `license_no`, `lat`, `lng`, `change_password_status`) VALUES
('1', 'LindaBScott@armyspy.com', '1', '', 'Linda', 'B', 'Scott', '4241 Biddie Lane, Richmond, VA 23224', '804-571-2504', '804-571-2505', '5117 0767 4343 9662', 0, 0, 0),
('2', 'TiaJRyan@rhyta.com', '', '', 'Tia ', 'J. ', 'Ryan', '1344 Prospect Street, Philadelphia, NJ 19123', '856-726-3169', '856-726-3170', '5383 9186 2580 9388', 0, 0, 0),
('3', 'LeticiaRLewis@rhyta.com', '', 'images/3_pp.jpeg', 'aaaa', 'testMiddleName', 'test lname', 'test add', 'test contact', 'test emer', 'test license', 0, 0, 0),
('d1', 'test1@gmail.com', 'bbbb', 'images/d1_pp.jpg', 'aaaa', 'testMiddleName', 'test lname', 'test add', 'test emer', 'test contact', 'test license', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
  `id` varchar(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `title`, `message`, `date`) VALUES
('rem1', 'test title', 'test msg', '2017-02-25'),
('rem2', 'test tsasd', 'aaa', '2017-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `id` varchar(50) NOT NULL,
  `driver_id` varchar(50) NOT NULL,
  `taxi_id` varchar(50) NOT NULL,
  `rental_date_from` date NOT NULL,
  `rental_date_to` date NOT NULL,
  `total_payment` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `driver_id`, `taxi_id`, `rental_date_from`, `rental_date_to`, `total_payment`) VALUES
('r1', 'd1', 't1', '2017-02-14', '2017-02-16', 9999),
('r2', 'd1', 't2', '2017-02-12', '2017-02-20', 2000),
('r3', 'd1', 't1', '2017-02-13', '2017-02-14', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `taxi`
--

CREATE TABLE IF NOT EXISTS `taxi` (
  `id` varchar(50) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `brand` text NOT NULL,
  `body_no` varchar(50) NOT NULL,
  `last_change_oil_date` date NOT NULL,
  `availability_status` tinyint(1) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxi`
--

INSERT INTO `taxi` (`id`, `plate_no`, `brand`, `body_no`, `last_change_oil_date`, `availability_status`, `lat`, `lng`) VALUES
('t1', 'test plate no', 'ssss', 'test body no', '2017-02-14', 0, 0, 0),
('t2', 'test pllate2', 'vivo', 'test vody2', '2017-02-15', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
