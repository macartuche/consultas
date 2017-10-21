-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 09:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dashtemp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `datatable`
--

CREATE TABLE IF NOT EXISTS `datatable` (
  `trans_id` varchar(15) NOT NULL,
  `trans_date` datetime DEFAULT NULL,
  `trans_type` varchar(30) DEFAULT NULL,
  `trans_txt` text,
  `trans_status` varchar(30) DEFAULT NULL,
  `trans_amount` double DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatable`
--

INSERT INTO `datatable` (`trans_id`, `trans_date`, `trans_type`, `trans_txt`, `trans_status`, `trans_amount`, `created_date`, `updated_date`) VALUES
('TR1600002', '2016-12-30 00:00:00', 'Payment', 'Biaya Listrik', 'Draft', 200000, '2016-12-29 23:05:02', '2016-12-29 23:05:31'),
('TR1600003', '2016-12-24 00:00:00', 'Invoice', 'Tes aja', 'Draft', 1200000, '2016-12-29 23:06:02', NULL),
('TR1600004', '2016-12-17 00:00:00', 'Invoice', 'Payment 2', 'Approved', 100000, '2016-12-30 13:34:25', NULL),
('TR1600005', '2016-12-17 00:00:00', 'Invoice', 'Invoice 3', 'Posted', 220000, '2016-12-30 13:34:46', NULL),
('TR1600006', '2016-12-09 00:00:00', 'Payment', 'Payment 33', 'Approved', 2400000, '2016-12-30 13:35:03', NULL),
('TR1600007', '2016-12-23 00:00:00', 'Payment', 'Payment 5', 'Posted', 3400000, '2016-12-30 13:35:37', NULL),
('TR1600008', '2016-12-10 00:00:00', 'Invoice', 'Invoice 123', 'Posted', 200000, '2016-12-30 13:42:49', NULL),
('TR1600009', '2016-12-23 00:00:00', 'Payment', 'Payment 100', 'Approved', 200000, '2016-12-30 14:40:07', NULL),
('TR1700001', '2017-01-19 00:00:00', 'Invoice', 'description', 'Draft', 100000, '2017-01-18 12:25:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datatable`
--
ALTER TABLE `datatable`
 ADD PRIMARY KEY (`trans_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
