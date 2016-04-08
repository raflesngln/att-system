-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2016 at 04:10 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_charge`
--

CREATE TABLE IF NOT EXISTS `booking_charge` (
  `id_booking` int(15) NOT NULL AUTO_INCREMENT,
  `JobNo` varchar(25) NOT NULL,
  `Reff` varchar(20) NOT NULL,
  `CostID` varchar(20) NOT NULL,
  `BusinessCode` varchar(15) NOT NULL,
  `Currency` varchar(25) NOT NULL,
  `Qty` int(100) NOT NULL,
  `Price` double NOT NULL,
  `Total` double NOT NULL,
  `ISPPN` int(15) NOT NULL,
  `ISPPNValue` double NOT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `booking_charge`
--

INSERT INTO `booking_charge` (`id_booking`, `JobNo`, `Reff`, `CostID`, `BusinessCode`, `Currency`, `Qty`, `Price`, `Total`, `ISPPN`, `ISPPNValue`) VALUES
(7, '0820160400001', '0820160400001', 'Quarantine', 'CST20160400001', 'Rp', 680, 23, 15640, 11111, 12121212),
(8, '0820160400001', '0820160400001', 'Airfreight', 'CST20160400001', 'Rp', 47268, 23, 1087141, 11111, 12121212),
(9, '0820160400001', '0820160400001', 'Delivery', 'CST20160400001', 'Rp', 0, 4, 4, 11111, 12121212),
(10, '0820160400001', '0820160400001', 'Adm SMU', 'CST20160400001', 'Rp', 0, 45, 45, 11111, 12121212),
(11, '0820160400001', '0820160400001', 'Other Cost', 'CST20160400001', 'Rp', 0, 435, 435, 11111, 12121212),
(12, '0820160400002', '0820160400002', 'Quarantine', 'CST20160400001', 'Rp', 234, 43, 0, 11111, 12121212),
(13, '0820160400002', '0820160400002', 'Airfreight', 'CST20160400001', 'Rp', 34, 533, 0, 11111, 12121212),
(14, '0820160400002', '0820160400002', 'Delivery', 'CST20160400001', 'Rp', 0, 0, 0, 11111, 12121212),
(15, '0820160400002', '0820160400002', 'Adm SMU', 'CST20160400001', 'Rp', 0, 2, 2, 11111, 12121212),
(16, '0820160400002', '0820160400002', 'Other Cost', 'CST20160400001', 'Rp', 0, 20, 20, 11111, 12121212);

-- --------------------------------------------------------

--
-- Table structure for table `booking_charges`
--

CREATE TABLE IF NOT EXISTS `booking_charges` (
  `idCharges` int(10) NOT NULL AUTO_INCREMENT,
  `HouseNo` varchar(20) NOT NULL,
  `ChargeName` varchar(50) NOT NULL,
  `Unit` float NOT NULL,
  `Qty` float NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`idCharges`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `booking_charges`
--

INSERT INTO `booking_charges` (`idCharges`, `HouseNo`, `ChargeName`, `Unit`, `Qty`, `Description`, `Date`) VALUES
(150, '0820160400002', 'Airfreight', 12, 12, '12', '2016-04-06 16:15:20'),
(151, '0820160400002', 'Delivery', 21, 12, '12', '2016-04-06 16:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `booking_items`
--

CREATE TABLE IF NOT EXISTS `booking_items` (
  `IdItems` int(10) NOT NULL AUTO_INCREMENT,
  `HouseNo` varchar(20) NOT NULL,
  `NoPack` int(10) NOT NULL,
  `Length` float NOT NULL,
  `Width` float NOT NULL,
  `Height` float NOT NULL,
  `Volume` float NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`IdItems`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=195 ;

--
-- Dumping data for table `booking_items`
--

INSERT INTO `booking_items` (`IdItems`, `HouseNo`, `NoPack`, `Length`, `Width`, `Height`, `Volume`, `Date`) VALUES
(192, '0820160400001', 23, 23, 23, 23, 2.03, '2016-04-06 14:59:49'),
(193, '0820160400001', 657, 657, 657, 657, 47265.6, '2016-04-06 14:59:49'),
(194, '0820160400002', 234, 234, 234, 3, 27.38, '2016-04-06 16:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('12b6d3c68de3d4b4fdc7ca52b7558963', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36', 1459937045, 'a:8:{s:9:"user_data";s:0:"";s:5:"idusr";s:1:"1";s:4:"usnm";s:6:"rafles";s:7:"passusr";N;s:7:"nameusr";s:17:"Rafles Nainggolan";s:8:"emailusr";s:17:"raflesn@gmail.com";s:8:"levelusr";s:5:"Admin";s:12:"login_status";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `consol`
--

CREATE TABLE IF NOT EXISTS `consol` (
  `NoSMU` varchar(20) NOT NULL,
  `HouseNo` varchar(22) NOT NULL,
  `desc_consol` varchar(12) NOT NULL,
  `CreateBy` varchar(25) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(25) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  KEY `NoSMU` (`NoSMU`),
  KEY `HouseNo` (`HouseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cost_house`
--

CREATE TABLE IF NOT EXISTS `cost_house` (
  `HouseNo` varchar(22) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Unit` varchar(12) NOT NULL,
  `Rate` double NOT NULL,
  `SubTotal` double NOT NULL,
  `id_charge` int(11) NOT NULL,
  KEY `id_charge` (`id_charge`),
  KEY `HouseNo` (`HouseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceNo` varchar(25) NOT NULL,
  `HouseNo` varchar(22) NOT NULL,
  `CreateBy` varchar(15) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(25) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `InvoiceStatus` enum('0','1') NOT NULL,
  PRIMARY KEY (`InvoiceNo`),
  UNIQUE KEY `HouseNo_3` (`HouseNo`),
  KEY `InvoiceNo` (`InvoiceNo`),
  KEY `HouseNo` (`HouseNo`),
  KEY `HouseNo_2` (`HouseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceNo`, `HouseNo`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `InvoiceStatus`) VALUES
('INV20160400001', '22222', '1', '2016-04-06 10:25:36', '', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_charges`
--

CREATE TABLE IF NOT EXISTS `jenis_charges` (
  `id_jenis_charge` int(10) NOT NULL AUTO_INCREMENT,
  `nm_jenis_charge` varchar(22) NOT NULL,
  `desc_jenis_charge` varchar(200) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`id_jenis_charge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `IdLog` int(10) NOT NULL AUTO_INCREMENT,
  `UserId` int(10) DEFAULT NULL,
  `TranscId` varchar(20) DEFAULT NULL,
  `TranscDesc` varchar(50) DEFAULT NULL,
  `TranscDate` datetime DEFAULT NULL,
  PRIMARY KEY (`IdLog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_address_type`
--

CREATE TABLE IF NOT EXISTS `ms_address_type` (
  `AddressTypeCode` int(10) NOT NULL AUTO_INCREMENT,
  `AddressTypeName` varchar(20) DEFAULT NULL,
  `AddressTypeDesc` varchar(25) DEFAULT NULL,
  `CreatedBy` int(10) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(10) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`AddressTypeCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ms_address_type`
--

INSERT INTO `ms_address_type` (`AddressTypeCode`, `AddressTypeName`, `AddressTypeDesc`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(15, 'Warehouse address', 'Warehouse address', 5, '2016-03-21 03:07:39', 1, '2016-04-04 01:03:44'),
(16, 'Office Address', 'Office address', NULL, NULL, 1, '2016-04-04 01:03:51'),
(23, 'Biling Address', 'Biling Address', 1, '2016-04-01 00:00:56', 1, '2016-04-04 01:04:08'),
(25, 'Invoicing address', 'Invoicing address', 1, '2016-04-05 09:56:27', 1, '2016-04-05 09:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `ms_airline`
--

CREATE TABLE IF NOT EXISTS `ms_airline` (
  `AirLineCode` int(11) NOT NULL AUTO_INCREMENT,
  `AirLineName` varchar(30) NOT NULL,
  `Description` varchar(30) NOT NULL,
  PRIMARY KEY (`AirLineCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_airline`
--

INSERT INTO `ms_airline` (`AirLineCode`, `AirLineName`, `Description`) VALUES
(1, 'Garuda', 'Garuda');

-- --------------------------------------------------------

--
-- Table structure for table `ms_bank`
--

CREATE TABLE IF NOT EXISTS `ms_bank` (
  `BankCode` varchar(25) NOT NULL,
  `BankName` varchar(25) DEFAULT NULL,
  `BankDesc` varchar(50) DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`BankCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_bank`
--

INSERT INTO `ms_bank` (`BankCode`, `BankName`, `BankDesc`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('008', 'Mandiri Bank', 'Bank Mandiri', '1', NULL, NULL, NULL),
('014', 'BCA', 'Bank BCA cabang General', '2', '2016-04-08 06:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_bankacc`
--

CREATE TABLE IF NOT EXISTS `ms_bankacc` (
  `BankAccNo` varchar(25) NOT NULL,
  `BankAccName` varchar(250) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `Desc` varchar(250) NOT NULL,
  `BusinessCode` int(10) NOT NULL,
  `CreatedDate` date NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `ModifiedDate` date NOT NULL,
  `ModifiedBy` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`BankAccNo`),
  KEY `BusinessCode` (`BusinessCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_charges_jenis`
--

CREATE TABLE IF NOT EXISTS `ms_charges_jenis` (
  `id_charge` int(10) NOT NULL AUTO_INCREMENT,
  `nm_charge` varchar(22) NOT NULL,
  `desc_charge` varchar(250) NOT NULL,
  `rate_charge` double NOT NULL,
  `id_jenis_charge` int(10) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`id_charge`),
  KEY `id_jenis_charge` (`id_jenis_charge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ms_city`
--

CREATE TABLE IF NOT EXISTS `ms_city` (
  `CityCode` varchar(7) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Country` varchar(5) DEFAULT NULL,
  `CityIATACode` varchar(3) DEFAULT NULL,
  `CityFIATACode` varchar(5) DEFAULT NULL,
  `CityICAOCode` varchar(4) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(15) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(15) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`CityCode`),
  KEY `Country` (`Country`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_city`
--

INSERT INTO `ms_city` (`CityCode`, `CityName`, `State`, `Country`, `CityIATACode`, `CityFIATACode`, `CityICAOCode`, `Remarks`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('ID00001', '- Ambon, Indonesia', '', 'ID', 'AMQ', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00002', 'Bali (Denpasar), Indonesia', '', 'ID', 'DPS', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00003', 'Balikpapan, Indonesia', '', 'ID', 'BPN', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00004', 'Bandung, Indonesia', '', 'ID', 'BDO', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00005', 'Banjarmasin, Indonesia', '', 'ID', 'BDJ', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00006', 'Batam, Indonesia', '', 'ID', 'BTH', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00007', 'Biak, Indonesia', '', 'ID', 'BIK', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00008', 'Gorontalo, Indonesia', '', 'ID', 'GTO', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00009', 'Jakarta, Indonesia', '', 'ID', 'CGK', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00010', 'Jayapura, Indonesia', '', 'ID', 'DJJ', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00011', 'Malang, Indonesia', '', 'ID', 'MLG', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00012', 'Manado, Indonesia', '', 'ID', 'MDC', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00013', 'Manokwari, Indonesia', '', 'ID', 'MKW', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00014', 'Mataram, Indonesia', '', 'ID', 'AMI', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00015', 'Medan, Indonesia', '', 'ID', 'MES', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00016', 'Naha, Indonesia', '', 'ID', 'NAH', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00017', 'Padang, Indonesia', '', 'ID', 'PDG', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00018', 'Palembang, Indonesia', '', 'ID', 'PLM', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00019', 'Palu, Indonesia', '', 'ID', 'PLW', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00020', 'Pekanbaru, Indonesia', '', 'ID', 'PKU', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00021', 'Pontianak, Indonesia', '', 'ID', 'PNK', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00022', 'Semarang, Indonesia', '', 'ID', 'SRG', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00023', 'Sentani, Indonesia', '', 'ID', 'DJJ', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00024', 'Sumbawa Island', '', 'ID', 'SWQ', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00025', 'Surabaya, Indonesia', '', 'ID', 'SUB', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00026', 'Tarakan, Indonesia', '', 'ID', 'TRK', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00027', 'Tembagapura, Indonesia', '', 'ID', 'TIM', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00028', 'Ternate, Indonesia', '', 'ID', 'TTE', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00029', 'Ujung Pandang, Indonesia', '', 'ID', 'UPG', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00030', 'Yogyakarta, Indonesia', '', 'ID', 'JOG', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00031', 'LAMPUNG, Indonesia', '', 'ID', 'TKG', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('ID00032', 'SORONG, Indonesia', '', 'ID', 'SOQ', NULL, NULL, NULL, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_commodity`
--

CREATE TABLE IF NOT EXISTS `ms_commodity` (
  `CommCode` varchar(25) NOT NULL DEFAULT '',
  `CommName` varchar(50) DEFAULT NULL,
  `CommDesc` varchar(25) DEFAULT NULL,
  `CommParentCode` varchar(25) DEFAULT NULL,
  `CountryCode` varchar(15) DEFAULT NULL COMMENT 'from ms_country',
  `CreatedBy` varchar(15) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`CommCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_commodity`
--

INSERT INTO `ms_commodity` (`CommCode`, `CommName`, `CommDesc`, `CommParentCode`, `CountryCode`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('ikan', 'Perikanan', 'perikanan', NULL, NULL, '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_contact_type`
--

CREATE TABLE IF NOT EXISTS `ms_contact_type` (
  `ContactTypeCode` int(10) NOT NULL AUTO_INCREMENT,
  `ContactTypeName` varchar(20) DEFAULT NULL,
  `ContactTypeDesc` varchar(33) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ContactTypeCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ms_contact_type`
--

INSERT INTO `ms_contact_type` (`ContactTypeCode`, `ContactTypeName`, `ContactTypeDesc`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'Contact person', 'kontak person', NULL, NULL, NULL, NULL),
(7, 'mobile phone', 'mobile phone', NULL, NULL, NULL, NULL),
(9, 'Office Contact', 'official contact', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_country`
--

CREATE TABLE IF NOT EXISTS `ms_country` (
  `CountryCode` varchar(2) NOT NULL,
  `CountryName` varchar(250) NOT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(30) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`CountryCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_country`
--

INSERT INTO `ms_country` (`CountryCode`, `CountryName`, `Remarks`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('ID', 'INDONESIA', 'Indonessian Nation', 'admin', '2015-08-20 10:16:08', 'Rafles Nainggolan', '2016-04-05 11:32:51'),
('MY', 'MALASYA', 'Malaysa Nation', 'Rafles Nainggolan', '2016-04-05 11:32:08', 'Rafles Nainggolan', '2016-04-05 11:32:42'),
('SG', 'SINGAPORE', 'Singapore Nation', 'administrator', '2015-08-20 10:01:08', 'Rafles Nainggolan', '2016-04-05 11:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `ms_currency`
--

CREATE TABLE IF NOT EXISTS `ms_currency` (
  `currCode` varchar(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`currCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_currency`
--

INSERT INTO `ms_currency` (`currCode`, `Name`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('IDR', 'Indonesian Rupiah', 'Admin', '2015-10-16 00:00:00', 'Rafles Nainggolan', '2015-10-23 09:01:10'),
('SGD', 'Singapore Dollars', 'Rafles Nainggolan', '2015-10-22 05:23:10', 'Rafles Nainggolan', '2015-10-23 09:13:10'),
('USD', 'American Dollars', 'Rafles Nainggolan', '2015-10-22 05:22:10', 'Rafles Nainggolan', '2015-10-23 09:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE IF NOT EXISTS `ms_customer` (
  `CustCode` varchar(15) NOT NULL,
  `custInitial` varchar(10) NOT NULL,
  `custName` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Country` varchar(8) DEFAULT NULL,
  `State` varchar(8) DEFAULT NULL,
  `City` varchar(8) DEFAULT NULL,
  `Phone` int(25) NOT NULL,
  `MobilePhone` int(13) DEFAULT NULL,
  `Fax` varchar(25) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `IsAgent` tinyint(1) unsigned NOT NULL,
  `IsShipper` tinyint(1) NOT NULL,
  `IsCnee` tinyint(1) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `CreditLimit` double NOT NULL,
  `TermsPayment` varchar(250) NOT NULL,
  `Deposit` double NOT NULL,
  `empCode` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `NPWP` varchar(50) NOT NULL,
  `NPWPAddress` varchar(250) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreatedBy` varchar(15) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`CustCode`),
  KEY `isShipper` (`IsShipper`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`CustCode`, `custInitial`, `custName`, `Address`, `Country`, `State`, `City`, `Phone`, `MobilePhone`, `Fax`, `PostalCode`, `IsAgent`, `IsShipper`, `IsCnee`, `Email`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('CST20160400001', 'RAf', 'Rafles Nainggolan', 'were', 'ID', 'DK', 'ID00001', 54654657, 787878, 'ewr', 'erwr', 1, 1, 1, 'wer', 22222, 'er', 389098, 0, 1, '42423432', 'ew', 'werewr', '1', '2016-04-05 20:04:28', '', '0000-00-00 00:00:00'),
('CST20160400002', 'BUD', 'Budi', 'were', 'ID', 'DK', 'ID00001', 796796, 5645745, 'ewr', 'erwr', 1, 1, 1, 'wer', 67765445, 'er', 12434, 0, 1, '42423432', 'ew', 'werewr', '1', '2016-04-05 20:04:36', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_disc`
--

CREATE TABLE IF NOT EXISTS `ms_disc` (
  `discCode` int(10) NOT NULL AUTO_INCREMENT,
  `custCode` varchar(10) NOT NULL,
  `svCode` varchar(250) NOT NULL,
  `cyCode` varchar(11) NOT NULL,
  `ori` varchar(50) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `venCode` varchar(10) NOT NULL,
  `DiscPersen` float NOT NULL,
  `DiscRupiah` double NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`discCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ms_disc`
--

INSERT INTO `ms_disc` (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(6, '5', '4', 'MDN', 'JAKARTA', 'SURABAYA', '2', 7, 1250000, 1, 'vvPt.Maju TerusPt.Maju TerusPt.Maju TerusPt.Maju Terus', 'administrator', '2015-09-09 11:47:09', 'administrator', '2015-09-28 09:30:09'),
(7, '6', '3', 'SKG', 'JAKARTA', 'SURABAYA', '1', 8, 90000, 1, 'asaslalsalsklakslklaskla', 'administrator', '2015-09-09 10:13:09', 'administrator', '2015-09-28 12:27:09'),
(8, '5', '4', '0', 'SURABAYA', 'SINGKARAK', '2', 9, 80000, 1, 'LOREM IPSUMDOLOR SITAMET', 'administrator', '2015-09-09 11:06:09', '', '0000-00-00 00:00:00'),
(9, '6', '3', '0', 'JAKARTA', 'MEDAN', '2', 5, 6, 0, 'LOREM IPSUMDOLOR SITAMET', 'administrator', '2015-09-09 11:26:09', 'administrator', '2015-09-28 12:14:09'),
(10, '11', '3', '0', 'JAKARTA', 'MEDAN', '2', 900, 8000000, 0, 'lorem ipsum dopoe sit a,.etr', 'aldi', '2015-10-07 05:50:10', 'aldi', '2015-10-09 09:28:10'),
(11, '12', '3', '0', 'MEDAN', 'SURABAYA', '1', 9, 800000, 0, 'dolor sit amet ', 'aldi', '2015-10-07 05:13:10', '', '0000-00-00 00:00:00'),
(12, '10', '6', '0', 'JAKARTA', 'JAKARTA', '2', 5, 77777, 0, 'ytjytgj', 'Rafles Nainggolan', '2015-10-22 06:33:10', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_linebusiness`
--

CREATE TABLE IF NOT EXISTS `ms_linebusiness` (
  `LineBusinessID` int(25) NOT NULL AUTO_INCREMENT,
  `LineBusinesName` varchar(30) DEFAULT NULL,
  `LineBusinessDesc` varchar(50) NOT NULL,
  `CreatedBy` int(10) NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedBy` int(10) NOT NULL,
  `ModifiedDate` date NOT NULL,
  PRIMARY KEY (`LineBusinessID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ms_linebusiness`
--

INSERT INTO `ms_linebusiness` (`LineBusinessID`, `LineBusinesName`, `LineBusinessDesc`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'Usaha Pertambangan', 'Usaha Pertambangan', 1, '2016-03-22', 0, '0000-00-00'),
(4, 'Perikanan', 'Usaha Perikanan', 2, '0000-00-00', 0, '0000-00-00'),
(5, 'Usaha Buah-buahan', 'Usaha Buah-buahan', 2, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_organitation`
--

CREATE TABLE IF NOT EXISTS `ms_organitation` (
  `OrgCode` varchar(20) NOT NULL,
  `OrgName` varchar(25) DEFAULT NULL,
  `OrgDesc` varchar(100) DEFAULT NULL,
  `IsAir` tinyint(4) DEFAULT NULL,
  `IsSea` tinyint(4) DEFAULT NULL,
  `IsLand` tinyint(4) DEFAULT NULL,
  `IsRail` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`OrgCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_organitation`
--

INSERT INTO `ms_organitation` (`OrgCode`, `OrgName`, `OrgDesc`, `IsAir`, `IsSea`, `IsLand`, `IsRail`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('FIATA', 'FIATA', 'FIATA', 0, 1, 0, 0, 'Rafles Nainggol', '2016-04-05 14:45:05', NULL, NULL),
('IATA', 'IATA', '', 1, 0, 0, 0, 'Rafles Nainggol', '2016-04-05 14:44:14', NULL, NULL),
('ICAO', 'ICAO', 'ICAO', 1, 0, 0, 0, 'Rafles Nainggol', '2016-04-05 14:44:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_payment_type`
--

CREATE TABLE IF NOT EXISTS `ms_payment_type` (
  `payCode` varchar(3) NOT NULL,
  `payName` varchar(50) NOT NULL,
  `CreatedBy` varchar(30) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`payCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_payment_type`
--

INSERT INTO `ms_payment_type` (`payCode`, `payName`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('CRD', 'CREDIT', 'Rafles Nainggolan', '2015-10-22 05:23:10', 'Rafles Nainggolan', '2015-10-23 09:13:10'),
('CSH', 'CASH', 'Admin', '2015-10-16 00:00:00', 'Administrator', '2015-10-27 03:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `ms_port`
--

CREATE TABLE IF NOT EXISTS `ms_port` (
  `PortCode` varchar(8) NOT NULL DEFAULT '',
  `PortName` varchar(50) DEFAULT NULL,
  `Organitation` varchar(8) DEFAULT NULL,
  `City` varchar(8) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(15) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` varchar(15) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`PortCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_port`
--

INSERT INTO `ms_port` (`PortCode`, `PortName`, `Organitation`, `City`, `Remarks`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('AAS', 'Apalapsili', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ABU', 'Haliwen', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('AEG', 'Aek Godang', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('AGD', 'Anggi', 'IATA', 'de', NULL, NULL, NULL, NULL, NULL),
('AHI', 'Amahai', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('AKQ', 'Gunung Batin', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('AMI', 'Selaparang', 'IATA', 'ID00014', NULL, NULL, NULL, NULL, NULL),
('AMQ', 'Pattimura, Ambon', 'IATA', 'ID00001', NULL, NULL, NULL, NULL, NULL),
('ARD', 'Mali', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ARJ', 'Arso', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('AYW', 'Ayawasi', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BDJ', 'Syamsudin Noor', 'IATA', 'ID00005', NULL, NULL, NULL, NULL, NULL),
('BDO', 'Husein Sastranegara International', 'IATA', 'ID00004', NULL, NULL, NULL, NULL, NULL),
('BEJ', 'Barau(Kalimaru)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BIK', 'Frans Kaisiepo', 'IATA', 'ID00007', NULL, NULL, NULL, NULL, NULL),
('BJG', 'Boalang', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BJK', 'Nangasuri', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BJW', 'Bajawa Soa', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BKS', 'Padang Kemiling (Fatmawati Soekarno)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BMU', 'Muhammad Salahuddin', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BPN', 'Sultan Aji Muhamad Sulaiman', 'IATA', 'ID00003', NULL, NULL, NULL, NULL, NULL),
('BTH', 'Hang Nadim', 'IATA', 'ID00006', NULL, NULL, NULL, NULL, NULL),
('BTJ', 'Sultan Iskandar Muda International', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BTW', 'Batu Licin', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BUI', 'Bokondini', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BUW', 'Betoambari', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BXB', 'Babo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BXD', 'Bade', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BXM', 'Batom', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BXT', 'Bontang', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('BYQ', 'Bunyu', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('CBN', 'Penggung', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('CGK', 'Soekarno-Hatta International', 'IATA', 'ID00009', NULL, NULL, NULL, NULL, NULL),
('CPF', 'Cepu', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('CXP', 'Tunggul Wulung', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('DJB', 'Sultan Thaha', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('DJJ', 'Sentani', 'IATA', 'ID00023', NULL, NULL, NULL, NULL, NULL),
('DOB', 'Rar Gwamar', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('DPS', 'Ngurah Rai (Bali) International', 'IATA', 'ID00002', NULL, NULL, NULL, NULL, NULL),
('DRH', 'Dabra', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('DTD', 'Datadawai', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('DUM', 'Pinang Kampai', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ELR', 'Elelim', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ENE', 'Ende (H Hasan Aroeboesman)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('EWE', 'Ewer', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('EWI', 'Enarotali', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('FKQ', 'Fakfak', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('FOO', 'Kornasoren Airfield', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('GAV', 'Gag Island', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('GEB', 'Gebe', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('GLX', 'Gamarmalamo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('GNS', 'Binaka', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('GTO', 'Jalaluddin', 'IATA', 'ID00008', NULL, NULL, NULL, NULL, NULL),
('HLP', 'Halim Perdanakusuma International', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ILA', 'Illaga', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('INX', 'Inanwatan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('IUL', 'Ilu', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('JOG', 'Adi Sutjipto International', 'IATA', 'ID00030', NULL, NULL, NULL, NULL, NULL),
('KAZ', 'Kao', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KBF', 'Karubaga', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KBU', 'Stagen', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KBX', 'Kambuaya', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KCD', 'Kamur', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KDI', 'Wolter Monginsidi', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KEA', 'Keisah', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KEI', 'Kepi', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KEQ', 'Kebar', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KLQ', 'Keluang', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KMM', 'Kimaam', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KNG', 'Kaimana', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KOD', 'Kotabangun', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KOE', 'El Tari', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KOX', 'Kokonau', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KRC', 'Kerinici airport', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KTG', 'Ketapang(Rahadi Usman)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('KWB', 'Dewadaru - Kemujan Island', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LAH', 'Oesman Sadik, Labuha', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LBJ', 'Komodo (Mutiara II)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LBW', 'Long Bawan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LHI', 'Lereh', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LII', 'Mulia', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LKA', 'Gewayentana', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LLN', 'Kelila', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LOP', 'Bandara International Lombok', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LPU', 'Long Apung', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LSW', 'Malikus Saleh', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LSX', 'Lhok Sukon', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LUV', 'Dumatumbun', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LUW', 'Bubung', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LWE', 'Lewoleba', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('LYK', 'Lunyuk', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MAL', 'Mangole, Falabisahaya', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MDC', 'Sam Ratulangi', 'IATA', 'ID00012', NULL, NULL, NULL, NULL, NULL),
('MDP', 'Mindiptana', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MEQ', 'Seunagan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MES', 'Medan/Polonia International', 'IATA', 'ID00015', NULL, NULL, NULL, NULL, NULL),
('MJU', 'Tampa Padang', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MJY', 'Mangunjaya', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MKQ', 'Mopah', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MKW', 'Rendani', 'IATA', 'ID00013', NULL, NULL, NULL, NULL, NULL),
('MLG', 'Abdul Rachman Saleh', 'IATA', 'ID00011', NULL, NULL, NULL, NULL, NULL),
('MNA', 'Melangguane', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MOF', 'Maumere(Wai Oti)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MPC', 'Muko Muko', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MSI', 'Masalembo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MTW', 'Beringin', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MUF', 'Muting', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MWK', 'Tarempa', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('MXB', 'Andi Jemma', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NAF', 'Banaina', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NAH', 'Naha', 'IATA', 'ID00016', NULL, NULL, NULL, NULL, NULL),
('NAM', 'Namlea', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NBX', 'Nabire', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NDA', 'Bandanaira', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NKD', 'Sinak', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NNX', 'Nunukan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NPO', 'Nanga Pinoh I', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NRE', 'Namrole', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NTI', 'Stenkol', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('NTX', 'Ranai', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('OBD', 'Obano', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('OKL', 'Oksibil', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('OKQ', 'Okaba', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ONI', 'Moanamani', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('OTI', 'Pitu', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PBW', 'Palibelo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PCB', 'Pondok Cabe Air Base', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PDG', 'Minangkabau', 'IATA', 'ID00017', NULL, NULL, NULL, NULL, NULL),
('PDO', 'Pendopo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PGK', 'Pangkal Pinang (Depati Amir)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PKN', 'Iskandar', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PKU', 'Sultan Syarif Kasim Ii (Simpang Tiga)', 'IATA', 'ID00020', NULL, NULL, NULL, NULL, NULL),
('PKY', 'Tjilik Riwut', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PLM', 'Sultan Mahmud Badaruddin Ii', 'IATA', 'ID00018', NULL, NULL, NULL, NULL, NULL),
('PLW', 'Mutiara', 'IATA', 'ID00019', NULL, NULL, NULL, NULL, NULL),
('PNK', 'Supadio', 'IATA', 'ID00021', NULL, NULL, NULL, NULL, NULL),
('PPJ', 'Pulau Panjang', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PPR', 'Pasir Pangaraan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PSJ', 'Kasiguncu', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PSU', 'Pangsuma', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PUM', 'Pomala', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('PWL', 'Purwokerto', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RAQ', 'Sugimanuru', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RDE', 'Merdei', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RGT', 'Japura', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RKI', 'Rokot', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RSK', 'Abresso', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RTG', 'Satar Tacik', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RTI', 'Roti', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RUF', 'Yuruf', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('RZS', 'Sawan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SAE', 'Sangir', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SAU', 'Sabu-Tardanu', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SBG', 'Maimun Saleh', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SEH', 'Senggeh', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SEQ', 'Sungai Pakning Bengkalis', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SGQ', 'Sanggata/Sangkimah', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SIQ', 'Dabo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SIW', 'Sibisa', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SMQ', 'Sampit(Hasan)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SOC', 'Adi Sumarmo Wiryokusumo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SOQ', 'Sorong (Jefman)', 'IATA', 'ID00032', NULL, NULL, NULL, NULL, NULL),
('SQG', 'Sintang(Susilo)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SQN', 'Emalamo Sanana', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SQR', 'Soroako', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SRG', 'Achmad Yani', 'IATA', 'ID00022', NULL, NULL, NULL, NULL, NULL),
('SRI', 'Temindung', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SUB', 'Juanda International', 'IATA', 'ID00025', NULL, NULL, NULL, NULL, NULL),
('SUP', 'Trunojoyo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SWQ', 'Sumbawa Besar', 'IATA', 'ID00024', NULL, NULL, NULL, NULL, NULL),
('SXK', 'Saumlaki/Olilit', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('SZH', 'Senipah', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TAX', 'Taliabu Island', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TBM', 'Tumbang Samba', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TIM', 'Moses Kilangin', 'IATA', 'ID00027', NULL, NULL, NULL, NULL, NULL),
('TJB', 'Sei Bati', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TJG', 'Warukin', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TJQ', 'Buluh Tumbang (H A S Hanandjoeddin)', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TJS', 'Tanjung Harapan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TKG', 'Radin Inten II (Branti)', 'IATA', 'ID00031', NULL, NULL, NULL, NULL, NULL),
('TLI', 'Toli Toli', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TMC', 'Tambolaka', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TMH', 'Tanah Merah', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TMY', 'Tiom', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TNB', 'Tanah Grogot', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TNJ', 'Kijang', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TPK', 'Teuku Cut Ali', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TRK', 'Juwata', 'IATA', 'ID00026', NULL, NULL, NULL, NULL, NULL),
('TSX', 'Tanjung Santan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TSY', 'Cibeureum', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TTE', 'Sultan Khairun Babullah', 'IATA', 'ID00028', NULL, NULL, NULL, NULL, NULL),
('TTR', 'Pongtiku', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('TXM', 'Teminabuan', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('UBR', 'Ubrub', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('UGU', 'Bilogai-Sugapa', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('UOL', 'Buol', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('UPG', 'Hasanuddin International', 'IATA', 'ID00029', NULL, NULL, NULL, NULL, NULL),
('WAAA', 'Hasanuddin International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAAG', 'Malimpung', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAAI', 'Malili', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAAL', 'Ponggaluku', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAAP', 'Kolaka', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAAT', 'Makale', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABB', 'Frans Kaisiepo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABC', 'Akimuga', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABD', 'Moanamani', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABF', 'Kornasoren Airfield', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABG', 'Wagethe', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABI', 'Nabire', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABL', 'Illaga', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABN', 'Kokonau', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABO', 'Serui', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABP', 'Moses Kilangin', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABT', 'Enarotali', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABU', 'Biak Manuhua', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABW', 'Waren', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WABY', 'Kebo Airstrip', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WADA', 'Selaparang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WADB', 'Muhammad Salahuddin', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WADD', 'Ngurah Rai (Bali) International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WADL', 'Bandara International Lombok', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WADS', 'Sumbawa Besar', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WADT', 'Tambolaka', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WADW', 'Waingapu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJA', 'Arso', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJB', 'Bokondini', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJD', 'Wakde', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJI', 'Sarmi', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJJ', 'Sentani', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJK', 'Kiwirok Airstrip', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJL', 'Lereh', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJM', 'Mulia', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJO', 'Oksibil', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJR', 'Waris', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJS', 'Senggeh', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJU', 'Ubrub', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJW', 'Wamena', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAJY', 'Werur/Mar', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAKD', 'Mindiptana', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAKE', 'Bade', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAKG', 'Agats', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAKK', 'Mopah', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAKO', 'Okaba', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAKP', 'Kepi', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAKT', 'Tanah Merah', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALE', 'Melak', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALG', 'Tanjung Harapan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALJ', 'Datadawai', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALK', 'Barau(Kalimaru)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALL', 'Sultan Aji Muhamad Sulaiman', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALN', 'Long Mawang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALQ', 'Muara Badak Pujangan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALR', 'Juwata', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALS', 'Temindung', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALT', 'Tanjung Santan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALV', 'Bunyu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALW', 'Muara Wahau', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WALX', 'Mangkajang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMA', 'Gamarmalamo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMB', 'Kotamubagu/Mopait', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMC', 'Tentena', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMD', 'Jailolo/Kuripasai', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMG', 'Jalaluddin', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMH', 'Naha', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMI', 'Toli Toli', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMJ', 'Gebe', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMK', 'Kao', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAML', 'Mutiara', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMM', 'Sam Ratulangi', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMN', 'Melangguane', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMP', 'Kasiguncu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMR', 'Pitu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMT', 'Sultan Khairun Babullah', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMU', 'Wuasa', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMW', 'Bubung', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAMY', 'Buol', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOC', 'Batu Licin', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOH', 'Mekar Putih', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOI', 'Iskandar', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOK', 'Stagen', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOL', 'Kuala Pembuang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOM', 'Beringin', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAON', 'Warukin', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOO', 'Syamsudin Noor', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOP', 'Tjilik Riwut', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOS', 'Sampit(Hasan)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOT', 'Teluk Kepayang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAOU', 'SANGGU, Buntok', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPA', 'Amahai', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPB', 'Bula', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPC', 'Banda, Kepulauan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPD', 'Rar Gwamar', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPE', 'Mangole, Falabisahaya', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPG', 'Namrole', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPH', 'Oesman Sadik, Labuha', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPI', 'Saumlaki/Olilit', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPK', 'Nangasuri', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPL', 'Dumatumbun', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPN', 'Emalamo Sanana', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPO', 'Larat', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPP', 'Pattimura, Ambon', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPQ', 'Kisar', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPR', 'Namlea', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAPT', 'Taliabu Island', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAR', 'Waris', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('WARA', 'Abdul Rachman Saleh', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WARB', 'Blimbingsari Airstrip', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WARC', 'Cepu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WARI', 'Iswahyudi', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WARJ', 'Adi Sutjipto International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WARQ', 'Adi Sumarmo Wiryokusumo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WARR', 'Juanda International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WARS', 'Achmad Yani', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WART', 'Trunojoyo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASB', 'Stenkol', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASC', 'Abresso', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASE', 'Kebar', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASF', 'Fakfak', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASI', 'Inanwatan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASK', 'Kaimana', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASM', 'Merdei', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASO', 'Babo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASR', 'Rendani', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASS', 'Sorong (Jefman)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAST', 'Teminabuan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WASW', 'Wasior', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WATB', 'Bajawa Soa', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WATC', 'Maumere(Wai Oti)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WATE', 'Ende (H Hasan Aroeboesman)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WATG', 'Satar Tacik', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WATM', 'Mali', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WATO', 'Komodo (Mutiara II)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WATT', 'El Tari', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAWB', 'Betoambari', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAWH', 'Selayar/Aroepala', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAWJ', 'Tampa Padang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAWM', 'Andi Jemma', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAWS', 'Soroako', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAWT', 'Pongtiku', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAWW', 'Wolter Monginsidi', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WAXX', 'Dominique Edward Osok', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WET', 'Wagethe', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('WGP', 'Waingapu', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('WIAP', 'Purwokerto', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIBB', 'Sultan Syarif Kasim Ii (Simpang Tiga)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIBD', 'Pinang Kampai', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIBS', 'Sungai Pakning Bengkalis', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIBT', 'Sei Bati', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WICB', 'Budiarto', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WICC', 'Husein Sastranegara International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WICD', 'Penggung', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WICJ', 'Semplak', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WICK', 'Margahayu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WICM', 'Cibeureum', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WICT', 'Radin Inten II (Branti)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIDD', 'Hang Nadim', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIDE', 'Pasir Pangaraan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIDN', 'Kijang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIDS', 'Dabo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIHH', 'Halim Perdanakusuma International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIHL', 'Tunggul Wulung', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIHP', 'Pondok Cabe Air Base', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIII', 'Soekarno-Hatta International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIIK', 'Kalijati', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIIR', 'Pelabuhan Ratu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIKL', 'Silampari', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMA', 'Labuhan Bilik', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMB', 'Binaka', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIME', 'Aek Godang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMH', 'Helvetia', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIML', 'Kisaran', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMM', 'Medan/Polonia International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMN', 'Silangit', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMO', 'Lasondre', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMP', 'Parapat', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMR', 'Pematang Siantar', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMS', 'Dr Ferdinand Lumban Tobing', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIMT', 'Tebing Tinggi', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOB', 'Bengkayang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOD', 'Buluh Tumbang (H A S Hanandjoeddin)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOG', 'Nanga Pinoh I', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOI', 'Singkawang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOK', 'Ketapang(Rahadi Usman)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOM', 'Tarempa', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WION', 'Ranai', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOO', 'Supadio', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOP', 'Pangsuma', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIOS', 'Sintang(Susilo)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPA', 'Sultan Thaha', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPD', 'Banding Agung', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPF', 'Kuala Tungkal', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPI', 'Muara Bungo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPK', 'Pangkal Pinang (Depati Amir)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPL', 'Padang Kemiling (Fatmawati Soekarno)', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPM', 'Menggala', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPO', 'Gatot Subrato', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPP', 'Sultan Mahmud Badaruddin Ii', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPQ', 'Pendopo', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPR', 'Japura', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPT', 'Minangkabau', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPU', 'Muko Muko', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPV', 'Keluang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WIPY', 'Bentayan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITA', 'Teuku Cut Ali', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITC', 'Seunagan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITG', 'Lasikin', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITL', 'Lhok Sukon', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITM', 'Malikus Saleh', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITN', 'Maimun Saleh', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITS', 'Seumayam', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WITT', 'Sultan Iskandar Muda International', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WMX', 'Wamena', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('WRBU', 'Buntok', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRKA', 'Haliwen', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRKJ', 'Mena', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRKL', 'Gewayentana', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRKM', 'Kalabahi', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRKN', 'Naikliu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRKS', 'Sabu-Tardanu', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLA', 'Sanggata/Sangkimah', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLB', 'Long Bawan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLC', 'Bontang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLF', 'Nunukan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLH', 'Tanah Grogot', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLJ', 'Tanjung Bara', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLL', 'Balikpapan', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLP', 'Long Apung', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRLU', 'Sangkulirang', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WRSP', 'Surabaya', 'ICAO', NULL, NULL, NULL, NULL, NULL, NULL),
('WSR', 'Wasior', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ZEG', 'Senggo', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ZKL', 'Steenkool', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ZRI', 'Serui', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL),
('ZRM', 'Sarmi', 'IATA', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_service`
--

CREATE TABLE IF NOT EXISTS `ms_service` (
  `svCode` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`svCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_service`
--

INSERT INTO `ms_service` (`svCode`, `Name`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('6', 'PORT TO PORT', 'Port to Port', 'Administrator', '2015-10-13 06:39:10', 'Rafles Nainggolan', '2015-10-23 00:00:00'),
('7', 'PORT TO DOOR', 'Port to door', 'Administrator', '2015-10-13 06:42:10', 'Administrator', '2015-10-13 00:00:00'),
('8', 'DOOR TO DOOR', 'door to door', 'Administrator', '2015-10-13 06:02:10', 'Rafles Nainggolan', '2015-10-22 00:00:00'),
('9', 'DOOR TO PORT', 'door to port', 'Administrator', '2015-10-13 06:41:10', 'Administrator', '2015-10-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_staff`
--

CREATE TABLE IF NOT EXISTS `ms_staff` (
  `empCode` int(10) NOT NULL AUTO_INCREMENT,
  `empInitial` varchar(10) NOT NULL,
  `empName` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `devisi` varchar(30) NOT NULL,
  PRIMARY KEY (`empCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ms_staff`
--

INSERT INTO `ms_staff` (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES
(1, 'fgdgf', 'fd', 'dgf', 'dfg', 45, 'fdfgd', '1', '2016-03-31 15:24:09', 'HTTRGH', '2016-03-20 22:29:58', 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `ms_state`
--

CREATE TABLE IF NOT EXISTS `ms_state` (
  `StateCode` varchar(2) NOT NULL,
  `StateName` varchar(250) NOT NULL,
  `Country` varchar(5) DEFAULT NULL,
  `CreatedBy` varchar(30) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`StateCode`),
  KEY `couCode` (`Country`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_state`
--

INSERT INTO `ms_state` (`StateCode`, `StateName`, `Country`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('DK', 'DKI', NULL, 'Rafles Nainggolan', '2016-04-04 01:36:16', 'Rafles Nainggolan', '2016-04-04 01:36:29'),
('JB', 'JAWA BARAT', NULL, 'Rafles Nainggolan', '2016-04-04 01:36:50', '', '0000-00-00 00:00:00'),
('JT', 'JAWA TIMUR', NULL, 'Rafles Nainggolan', '2016-04-04 01:37:01', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `FullName` varchar(220) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Level` enum('Admin','Kasir','K_Kasir') NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `UserName`, `Password`, `FullName`, `Email`, `Level`, `CreateDate`, `ModifiedDate`) VALUES
(1, 'rafles', '827ccb0eea8a706c4c34a16891f84e7b', 'Rafles Nainggolan', 'raflesn@gmail.com', 'Admin', '2016-03-15 06:16:09', '2016-03-16 13:17:02'),
(2, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'administrator@gmail.com', 'Admin', '2016-03-15 06:16:09', '2016-03-16 13:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_house`
--

CREATE TABLE IF NOT EXISTS `outgoing_house` (
  `JobNo` varchar(25) NOT NULL,
  `HouseNo` varchar(22) NOT NULL,
  `CustCode` int(15) NOT NULL,
  `BookingNo` varchar(11) NOT NULL,
  `PayCode` varchar(11) NOT NULL,
  `Service` varchar(10) NOT NULL,
  `Origin` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `ETD` datetime NOT NULL,
  `Shipper` varchar(20) NOT NULL,
  `CodeShipper` varchar(20) NOT NULL,
  `Consigne` varchar(100) NOT NULL,
  `CodeConsigne` varchar(20) NOT NULL,
  `Commodity` varchar(15) NOT NULL,
  `PCS` float NOT NULL,
  `GrossWeight` int(10) NOT NULL,
  `grandVolume` double NOT NULL,
  `Discount` double NOT NULL,
  `Amount` double NOT NULL,
  `SpecialIntraction` varchar(100) NOT NULL,
  `CWT` int(10) NOT NULL,
  `DeclareValue` varchar(100) NOT NULL,
  `DescofShipment` varchar(100) NOT NULL,
  `CreateBy` varchar(20) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(50) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `HouseStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`HouseNo`),
  KEY `Origin` (`Origin`),
  KEY `siper` (`Shipper`),
  KEY `Service` (`Service`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outgoing_house`
--

INSERT INTO `outgoing_house` (`JobNo`, `HouseNo`, `CustCode`, `BookingNo`, `PayCode`, `Service`, `Origin`, `Destination`, `ETD`, `Shipper`, `CodeShipper`, `Consigne`, `CodeConsigne`, `Commodity`, `PCS`, `GrossWeight`, `grandVolume`, `Discount`, `Amount`, `SpecialIntraction`, `CWT`, `DeclareValue`, `DescofShipment`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `HouseStatus`) VALUES
('JOH20160400001', '0820160400001', 0, '354', 'CRD-CREDIT', '9-DOOR TO ', 'WRLL', 'AYW', '2016-04-06 00:00:00', 'CST20160400001', '3423', 'CST20160400002', '234', 'ikan', 680, 0, 47267.6, 0, 1103265, '54', 47268, '435', '435', '1', '2016-04-06 14:59:50', '', '0000-00-00 00:00:00', 0),
('JOH20160400002', '0820160400002', 0, '234', 'CRD-CREDIT', '9-DOOR TO ', 'SOC', 'JOG', '2016-04-06 00:00:00', 'CST20160400001', '12', 'CST20160400002', '12', 'ikan', 234, 0, 27.38, 0, 22, 'efw', 34, 'we', 'few', '1', '2016-04-06 16:15:20', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing_master`
--

CREATE TABLE IF NOT EXISTS `outgoing_master` (
  `NoSMU` varchar(30) NOT NULL,
  `JobNo` varchar(20) NOT NULL,
  `BookingNo` varchar(11) NOT NULL,
  `PayCode` varchar(11) NOT NULL,
  `Service` varchar(100) NOT NULL,
  `Airlines` int(11) NOT NULL,
  `FlightNumbDate1` varchar(25) NOT NULL,
  `FlightNumbDate2` varchar(25) NOT NULL,
  `FlightNumbDate3` varchar(25) NOT NULL,
  `Origin` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `ETD` datetime NOT NULL,
  `Shipper` varchar(100) NOT NULL,
  `CodeShipper` varchar(20) NOT NULL,
  `Consigne` varchar(100) NOT NULL,
  `CodeConsigne` varchar(20) NOT NULL,
  `Commodity` varchar(100) NOT NULL,
  `PCS` int(11) NOT NULL,
  `GrossWeight` int(10) NOT NULL,
  `grandVolume` double NOT NULL,
  `AirFreight` double NOT NULL,
  `Adm` double NOT NULL,
  `Quarantine` double NOT NULL,
  `Delivery` double NOT NULL,
  `Others` double NOT NULL,
  `Amount` double NOT NULL,
  `SpecialIntraction` varchar(100) NOT NULL,
  `CWT` int(10) NOT NULL,
  `DeclareValue` varchar(100) NOT NULL,
  `DescofShipment` varchar(100) NOT NULL,
  `CreatedBy` varchar(20) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(50) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `status_proses` enum('0','1') NOT NULL,
  PRIMARY KEY (`NoSMU`),
  KEY `Airlines` (`Airlines`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outgoing_master`
--

INSERT INTO `outgoing_master` (`NoSMU`, `JobNo`, `BookingNo`, `PayCode`, `Service`, `Airlines`, `FlightNumbDate1`, `FlightNumbDate2`, `FlightNumbDate3`, `Origin`, `Destination`, `ETD`, `Shipper`, `CodeShipper`, `Consigne`, `CodeConsigne`, `Commodity`, `PCS`, `GrossWeight`, `grandVolume`, `AirFreight`, `Adm`, `Quarantine`, `Delivery`, `Others`, `Amount`, `SpecialIntraction`, `CWT`, `DeclareValue`, `DescofShipment`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `status_proses`) VALUES
('22222', 'JOB20160400001', '3453', 'CRD-CREDIT', '8-DOOR TO DOOR', 0, '32/2016-04-06', '/2016-04-06', '23/2016-04-06', 'ID00015', 'ID00016', '2016-04-06 00:00:00', '', '34', '', '43', 'ikan', 27, 0, 2.0599999999999996, 11136, 234, 6318, 24, 234, 0, '234', 464, '24', '24', '1', '2016-04-06 09:13:09', '', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `soa`
--

CREATE TABLE IF NOT EXISTS `soa` (
  `id_soa` int(11) NOT NULL AUTO_INCREMENT,
  `desc_soa` varchar(33) NOT NULL,
  `custCode` datetime NOT NULL,
  `CreateBy` int(10) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(22) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`id_soa`),
  KEY `CreateBy` (`CreateBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `soa_detail`
--

CREATE TABLE IF NOT EXISTS `soa_detail` (
  `id_soa` int(11) NOT NULL,
  `InvoiceNo` varchar(22) NOT NULL,
  `custCode` datetime NOT NULL,
  `CreateBy` varchar(33) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(22) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  KEY `InvoiceNo` (`InvoiceNo`),
  KEY `id_soa` (`id_soa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_address_detail`
--

CREATE TABLE IF NOT EXISTS `tr_address_detail` (
  `AddressNo` int(11) NOT NULL AUTO_INCREMENT,
  `UP` varchar(25) DEFAULT NULL,
  `AddressDesc` varchar(30) NOT NULL,
  `PartyCode` varchar(20) NOT NULL,
  `AddressTypeCode` int(11) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `PostalCode` varchar(8) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`AddressNo`),
  KEY `address_type_id` (`AddressTypeCode`),
  KEY `custCode` (`PartyCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tr_address_detail`
--

INSERT INTO `tr_address_detail` (`AddressNo`, `UP`, `AddressDesc`, `PartyCode`, `AddressTypeCode`, `City`, `Country`, `PostalCode`, `State`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(9, 'adsad', 'sdasd', 'CST20160400001', 1, 'ID00002', 'ID', 'adasda', 'DK', 1, '2016-04-06 02:39:45', NULL, NULL),
(10, 'sadas', 'dasd', 'CST20160400001', 1, 'ID00001', 'MY', 'dasa', 'DK', 1, '2016-04-06 03:00:16', NULL, NULL),
(11, 'sadas', 'dasd', 'CST20160400002', 1, 'ID00001', 'MY', 'dasa', 'DK', 1, '2016-04-06 03:01:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_bank_detail`
--

CREATE TABLE IF NOT EXISTS `tr_bank_detail` (
  `BankAccNo` varchar(20) NOT NULL COMMENT 'Rek Number',
  `BankAccName` varchar(50) NOT NULL COMMENT 'Rek Name',
  `BankCode` varchar(25) NOT NULL COMMENT 'foreign from ms_bank',
  `BranchName` varchar(50) NOT NULL,
  `PartyCode` varchar(25) NOT NULL COMMENT 'vendor code,customer code etc',
  `SwiftCode` varchar(15) DEFAULT NULL,
  `BankDetail` varchar(100) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `CreatedBy` varchar(15) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` varchar(15) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`BankAccNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_bank_detail`
--

INSERT INTO `tr_bank_detail` (`BankAccNo`, `BankAccName`, `BankCode`, `BranchName`, `PartyCode`, `SwiftCode`, `BankDetail`, `isActive`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('1231231232', 'ererere', '008', 'fafafasfafsafa', 'CST20160400001', '1231231232', 'ghghghg', 1, '1', '2016-04-06 02:39:46', '', '0000-00-00 00:00:00'),
('2147483647', 'yuyyu', '014', 'gsdvds a', 'CST20160400001', '2222222222', 'sasasasa', 1, '1', '2016-04-06 02:39:46', '', '0000-00-00 00:00:00'),
('asf', 'afs', '008', 'fasfsa', 'CST20160400002', 'asf', 'affaa', 1, '1', '2016-04-06 03:01:15', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tr_commodity`
--

CREATE TABLE IF NOT EXISTS `tr_commodity` (
  `tr_commNo` int(11) NOT NULL AUTO_INCREMENT,
  `tr_CommDesc` varchar(100) NOT NULL,
  `PartyCode` varchar(20) DEFAULT NULL COMMENT 'for customer etc',
  `CreatedBy` varchar(50) NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedBy` varchar(50) NOT NULL,
  `ModifiedDate` date DEFAULT NULL,
  PRIMARY KEY (`tr_commNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tr_contact_detail`
--

CREATE TABLE IF NOT EXISTS `tr_contact_detail` (
  `ContactNo` int(11) NOT NULL AUTO_INCREMENT,
  `UP` varchar(25) DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Extention` int(13) DEFAULT NULL,
  `Fax` int(13) DEFAULT NULL,
  `Handphone` int(13) DEFAULT NULL,
  `ContactDesc` varchar(30) NOT NULL,
  `ContactTypeCode` int(11) DEFAULT NULL,
  `PartyCode` varchar(20) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `CreatedBy` varchar(20) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(10) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`ContactNo`),
  KEY `address_type_id` (`ContactTypeCode`),
  KEY `custCode` (`PartyCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tr_contact_detail`
--

INSERT INTO `tr_contact_detail` (`ContactNo`, `UP`, `Phone`, `Extention`, `Fax`, `Handphone`, `ContactDesc`, `ContactTypeCode`, `PartyCode`, `Email`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(5, 'dsad', 23123, 34324, 1241, 1214, 'bxvcbvbxvb', 1, 'CST20160400001', '421421', '1', '2016-04-06 02:39:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_linebusiness`
--

CREATE TABLE IF NOT EXISTS `tr_linebusiness` (
  `tr_linebusinessNo` int(25) NOT NULL AUTO_INCREMENT,
  `LineBusiness` varchar(30) DEFAULT NULL,
  `PartyCode` varchar(20) NOT NULL,
  `Remarks` varchar(50) NOT NULL,
  `CreatedBy` int(10) NOT NULL,
  `CreatedDate` date NOT NULL,
  `ModifiedBy` int(10) NOT NULL,
  `ModifiedDate` date NOT NULL,
  PRIMARY KEY (`tr_linebusinessNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tr_linebusiness`
--

INSERT INTO `tr_linebusiness` (`tr_linebusinessNo`, `LineBusiness`, `PartyCode`, `Remarks`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(6, '1', 'CST20160400002', 'fasasfas', 1, '2016-04-06', 0, '0000-00-00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `soa`
--
ALTER TABLE `soa`
  ADD CONSTRAINT `soa_ibfk_1` FOREIGN KEY (`CreateBy`) REFERENCES `ms_user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
