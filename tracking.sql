-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2015 at 08:41 AM
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
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` varchar(10) NOT NULL,
  `date_invoice` date NOT NULL,
  `transc_id` varchar(20) NOT NULL,
  `cust_id` varchar(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount_pay` float NOT NULL,
  PRIMARY KEY (`invoice_id`,`transc_id`,`cust_id`,`currency`,`amount_pay`),
  UNIQUE KEY `transc_id` (`transc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `date_invoice`, `transc_id`, `cust_id`, `currency`, `amount_pay`) VALUES
('0', '1970-01-01', '0', '0', '0', 0),
('INV-001', '2015-08-18', 'CSS-001', '1', 'rp', 90000),
('INV-002', '2015-08-18', 'CSS-002', '2', 'rp', 300000),
('INV-003', '2015-08-18', 'CSS-005', '2', 'rp', 1355000),
('INV-004', '2015-08-18', 'CSS-006', '1', 'rp', 31000000),
('INV-005', '2015-08-18', 'CSS-004', '6', 'rp', 0),
('INV-006', '2015-09-02', 'CSS-003', '6', 'rp', 0),
('INV-007', '2015-09-02', 'CSS-008', '6', 'rp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobhistory`
--

CREATE TABLE IF NOT EXISTS `jobhistory` (
  `PKID` int(4) NOT NULL DEFAULT '0',
  `BranchID` varchar(5) DEFAULT '',
  `BookingNo` varchar(50) DEFAULT '',
  `MasterJob` varchar(50) DEFAULT '',
  `AWB` varchar(30) DEFAULT '',
  `AWB_Date` date NOT NULL DEFAULT '2012-01-01',
  `Origin_Code` varchar(5) DEFAULT '',
  `Destination_Code` varchar(5) DEFAULT '',
  `Shipper_Code` varchar(25) DEFAULT '',
  `Shipper_Name` varchar(100) DEFAULT '',
  `Shipper_Address` varchar(250) DEFAULT '',
  `Consigne_Name` varchar(100) DEFAULT '',
  `Consigne_Address` varchar(250) DEFAULT '',
  `StatusCode` varchar(10) DEFAULT '',
  `StatusName` varchar(100) DEFAULT '',
  `StatusUpdate` datetime NOT NULL DEFAULT '2012-01-01 00:00:00',
  `NamaUser` varchar(10) DEFAULT '',
  `TglInput` varchar(20) DEFAULT '',
  `DSNo` varchar(50) DEFAULT '',
  `DSDate` datetime NOT NULL DEFAULT '2012-01-01 00:00:00',
  `DSKurir` varchar(50) DEFAULT '',
  `Clean` varchar(15) DEFAULT '',
  `PONo` varchar(50) DEFAULT '',
  `KodeProject` varchar(50) DEFAULT '',
  PRIMARY KEY (`PKID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobhistory`
--

INSERT INTO `jobhistory` (`PKID`, `BranchID`, `BookingNo`, `MasterJob`, `AWB`, `AWB_Date`, `Origin_Code`, `Destination_Code`, `Shipper_Code`, `Shipper_Name`, `Shipper_Address`, `Consigne_Name`, `Consigne_Address`, `StatusCode`, `StatusName`, `StatusUpdate`, `NamaUser`, `TglInput`, `DSNo`, `DSDate`, `DSKurir`, `Clean`, `PONo`, `KodeProject`) VALUES
(1, '0101', '101-052015040763', '1', '125', '2015-08-26', 'HKG', 'CRG', '22015', 'CHUN SHING TRADING CO. (HK) LTD.', '', 'PT. MATTEL INDONESIA', 'PT. MATTEL INDONESIA', '03', 'ORIGIN MANIFEST-tes', '2015-08-27 05:17:20', 'aan', 'Jun 20 2015 12:00AM', '', '2015-08-20 05:14:14', '', '', '', ''),
(2, '0101', '101-052015040763', '1', '125', '0000-00-00', 'HKG', 'CRG', '22015', 'CHUN SHING TRADING CO. (HK) LTD.', '', 'PT. MATTEL INDONESIA', 'PT. MATTEL INDONESIA\r\nCIKARANG BARU PLANT,JL.INDUSTRI\r\nUTAMA BLOK SS KAV.1,2,3 KAWASAN\r\nINDUSTRI CIKARANG TAHAP II,CIKARANG,BEKASI\r\nJAWA BARAT-INDONESIA', '06', 'DELIVER TO CONSIGNEE-tes2', '2015-08-20 04:11:12', 'aan', 'Jun 20 2015 12:00AM', '', '2015-08-20 00:00:00', '', '', '', ''),
(3, '0101', '101-012015061124', '2', '126', '2015-08-28', 'CGK', 'PVG', '22061', 'CV SENTRAL PRATAMA EXPORTINDO', 'CV SENTRAL PRATAMA EXPORTINDO\r\nJL. JEND A. YANI (BY PASS)\r\nNO.6 RT.019/010, JAKARTA TIMUR 13120\r\n', 'KAPOK (KUNSHAN) CO.,LTD', 'KAPOK (KUNSHAN) CO.,LTD\r\nNO 200 THE 2ND ROAD EXPORT PROCESSING ZONE\r\nKUNSHAN, JIANGSU PROVINCE, CHINA', '01', 'DEPARTURE FROM ORIGIN AIRPORT-', '2015-08-03 05:12:11', 'dini', 'Jun 23 2015 12:00AM', '', '2015-08-25 05:10:10', '', '', '', ''),
(6, '0101', '101-012015061119', '2', '124', '2015-08-12', 'CGK', 'FRA', '22124', 'PT TASINDO MANDIRI INDONESIA', 'PT TASINDO MANDIRI INDONESIA\r\nJL. RAYA SERANG KM 13,8 CIKUPA \r\nTANGERANG 15710 - INDONESIA\r\n', '825 DISTRIBUTION GMBH', '825 DISTRIBUTION GMBH\r\nSTOLBERGER STRASSE 90D\r\n50933 COLOGNE-GERMANY\r\nTEL:+49 221 500 557-22\r\nATT. MR RALF SCHAEFAR\r\nEORI NUMBER: DE302478738745973', '01', 'DEPARTURE FROM ORIGIN AIRPORT-', '2015-08-12 04:08:09', 'dini', 'Jun 24 2015 12:00AM', '', '2015-08-03 00:00:00', '', '', '', ''),
(8, '0101', '101-012015061119', '2', '124', '2015-08-28', 'CGK', 'FRA', '21430', 'MORPHO CARDS (SINGAPORE) PTE. LTD', '', 'PT. CARDSINDO TIGA PERKASA', '', '03', 'ORIGIN MANIFEST-tes', '2015-08-15 03:09:09', 'dini', 'Jun 24 2015 12:00AM', '', '2015-08-03 00:00:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ms_city`
--

CREATE TABLE IF NOT EXISTS `ms_city` (
  `cyCode` varchar(3) NOT NULL,
  `cyName` varchar(250) NOT NULL,
  `couCode` varchar(2) NOT NULL,
  `stCode` varchar(2) NOT NULL,
  `isAirport` tinyint(1) NOT NULL,
  `isSeaport` tinyint(1) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`cyCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_city`
--

INSERT INTO `ms_city` (`cyCode`, `cyName`, `couCode`, `stCode`, `isAirport`, `isSeaport`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('AB', 'LOREM IPSUM', 'MY', 'SA', 0, 1, 'rafles', '2015-09-03 08:59:09', 'rafles', '2015-09-05 04:09:04'),
('AC', 'LOREM IPSUM', 'ID', 'LO', 1, 1, 'rafles', '2015-09-03 08:11:09', '', '0000-00-00 00:00:00'),
('AD', 'LOREM IPSUM', 'ID', 'SA', 0, 1, 'rafles', '2015-09-03 08:26:09', 'rafles', '2015-09-03 08:09:57'),
('AF', 'LOREM IPSUM', 'MY', 'LO', 1, 1, 'rafles', '2015-09-03 08:01:09', 'rafles', '2015-09-05 07:09:13'),
('AG', 'LOREM IPSUM', 'ID', 'SA', 1, 1, 'rafles', '2015-09-03 08:16:09', '', '0000-00-00 00:00:00'),
('AH', 'LOREM IPSUM', 'MY', 'SA', 0, 0, 'rafles', '2015-09-03 08:34:09', '', '0000-00-00 00:00:00'),
('JKT', 'JAKARTAAAA', 'ID', 'LO', 1, 1, 'rafles', '2015-08-21 05:59:08', 'administrator', '2015-09-03 06:09:36'),
('MDN', 'MEDAN', 'ID', 'SA', 0, 0, 'rafles', '2015-08-21 05:42:08', 'rafles', '2015-09-03 07:09:08'),
('SBY', 'SURABAYA', 'ID', 'LO', 1, 1, 'rafles', '2015-08-21 05:38:08', '', '0000-00-00 00:00:00'),
('SKG', 'SINGKARAK', 'MY', 'SA', 1, 1, 'rafles', '2015-08-21 05:47:08', '', '0000-00-00 00:00:00'),
('SRG', 'SERANG', 'ID', 'SA', 0, 1, 'rafles', '2015-09-05 04:42:09', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_country`
--

CREATE TABLE IF NOT EXISTS `ms_country` (
  `couCode` varchar(2) NOT NULL,
  `couName` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`couCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_country`
--

INSERT INTO `ms_country` (`couCode`, `couName`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('ID', 'INDONESIA', 'admin', '2015-08-20 10:16:08', 'rafles', '2015-08-21 05:08:04'),
('MY', 'MALAYSIA', 'administrator', '2015-08-20 10:13:08', 'rafles', '2015-08-21 05:08:02'),
('SG', 'HUHUHUHU', 'administrator', '2015-08-20 10:01:08', 'rafles', '2015-09-05 04:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE IF NOT EXISTS `ms_customer` (
  `custCode` int(10) NOT NULL AUTO_INCREMENT,
  `custInitial` varchar(10) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `cyCode` varchar(3) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Fax` varchar(25) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `isAgent` tinyint(1) NOT NULL,
  `isShipper` tinyint(1) NOT NULL,
  `isCnee` tinyint(1) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `PIC01` varchar(250) NOT NULL,
  `PIC02` varchar(250) NOT NULL,
  `HPPIC01` varchar(25) NOT NULL,
  `HPPIC02` varchar(25) NOT NULL,
  `CreditLimit` double NOT NULL,
  `TermsPayment` double NOT NULL,
  `Deposit` double NOT NULL,
  `empCode` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `NPWP` varchar(50) NOT NULL,
  `NPWPAddress` varchar(250) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`custCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`custCode`, `custInitial`, `custName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isShipper`, `isCnee`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(10, 'surya agun', 'mayang', '', 'SBY', '084847384', '786755', '7877', 1, 1, 1, 'suryaagung@gmail.com', 'surya agung', 'surya agung', 'surya agung', '3000', 90000, 120000, 2500000, 1, 1, '12345', '0921', 'lorem ipsum dolor sit amet lorem ', 'administrator', '2015-09-04 05:59:10', 'rafles', '2015-09-05 04:44:36'),
(11, 'maya', 'maygsari', '', 'MDN', '084847384', '088', '088', 0, 0, 0, 'marta@gmail.com', 'lorem ipsum dolor sit amet', 'lorem ipsum dolor sit amet', 'surya agung', 'lorem', 100000, 200000, 300000, 1, 1, '11111', 'jakbar12', 'lorem ipsum dolor sit amet lorem ', 'administrator', '2015-09-04 06:02:44', 'administrator', '2015-09-04 06:47:24'),
(12, 'lorem ipsu', 'lorem ipsum dolor', 'lorem ipsum dolor', 'MDN', '0986896', '896786785', '8775', 1, 0, 1, 'raflesngln@gmail.com', 'lorem ipsum dolor', 'lorem ipsum dolor`', 'lorem ipsum dolor', 'lorem ipsum dolor', 1200000, 6600000, 900000, 1, 1, '876756565', 'lorem ipsum dolor', 'lorem ipsum dolorlorem ipsum dolor', 'administrator', '2015-09-04 06:50:09', '', '0000-00-00 00:00:00'),
(14, 'rafles', 'rafles', '', 'MDN', '084847384', '0897878', '97878', 0, 1, 0, 'raflesngln@gmail.com', '677', '767', '6767', '76767', 900000, 600000, 1500000, 8, 1, 'np37376376', 'jakbar', 'lorem ipsum dolor sit amet lorem ', 'rafles', '2015-09-05 04:39:45', 'rafles', '2015-09-05 04:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `ms_disc`
--

CREATE TABLE IF NOT EXISTS `ms_disc` (
  `discCode` int(11) NOT NULL AUTO_INCREMENT,
  `custCode` int(11) NOT NULL,
  `svCode` int(11) NOT NULL,
  `cyCode` varchar(10) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ms_disc`
--

INSERT INTO `ms_disc` (`discCode`, `custCode`, `svCode`, `cyCode`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 10, 20, 'MDN', '1', 5, 12000, 1, 'lorem ipsum dolor sit amet', 'administrator', '2015-09-16 00:00:00', 'administrator', '2015-09-04 10:26:09'),
(2, 11, 10, 'AB', '1', 12, 300000, 1, 'lorem ipsum dolorr sit amet', 'administrator', '2015-09-04 09:10:09', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_service`
--

CREATE TABLE IF NOT EXISTS `ms_service` (
  `svCode` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(50) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(50) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`svCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_service`
--

INSERT INTO `ms_service` (`svCode`, `Name`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('10', 'SERVICE2', 'lorem ipsummm', 'administrator', '2015-09-04 07:39:09', 'administrator', '2015-09-04 00:00:00'),
('20', 'SERVICE33333', 'lorem ipsu dolorsitamet', 'administrator', '2015-09-04 07:53:09', 'administrator', '2015-09-04 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ms_staff`
--

INSERT INTO `ms_staff` (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES
(1, 'RAFLESN', 'rafles nainggolan', 'cengkareng barat', '084847384', 1, 'lorem ipsum dolor sit amet lorem ', 'administrator', '2015-09-03 10:40:09', 'rafles', '2015-09-05 04:06:09', 'sales'),
(2, 'BUDI', 'budi', 'cengjaranrn', '078334676', 0, 'lorem ipsum dolor sit amet', 'administrator', '2015-09-03 10:12:09', 'rafles', '2015-09-03 08:01:09', 'admin'),
(3, 'RIRIN', 'ririn', 'jakarta barat', '09938923', 1, 'lorem ipsum', 'administrator', '2015-09-03 11:14:09', 'administrator', '2015-09-03 04:38:09', 'accountant'),
(4, 'ANDI', 'andi', 'jakarta', '08997', 0, 'lorem ipsum', 'rafles', '2015-09-03 07:22:09', 'rafles', '2015-09-03 08:10:09', ''),
(5, 'MAYA', 'maya', 'jakarta', '089787', 1, 'lorem ipsum', 'rafles', '2015-09-03 07:40:09', '', '0000-00-00 00:00:00', 'it'),
(6, 'SURYA', 'surya', 'bandung', '07867785875656', 0, 'lorem ipsum sit amet', 'rafles', '2015-09-03 07:22:09', 'administrator', '2015-09-04 03:52:09', ''),
(7, 'LOREM IPSU', 'lorem ipsum', 'lorem ipsum', '0079798676', 1, 'lorem ipsum', 'rafles', '2015-09-03 07:24:09', '', '0000-00-00 00:00:00', ''),
(8, 'LOREM', 'lorem ipsum', 'lorem ipsum', '0097896786', 1, 'lorem ipsum', 'rafles', '2015-09-03 07:39:09', '', '0000-00-00 00:00:00', 'sales'),
(9, 'LOREM IPSU', 'lorem ipsum', 'lorem ipsum', '0867775', 1, 'lorem ipsum', 'rafles', '2015-09-03 07:23:09', '', '0000-00-00 00:00:00', ''),
(10, 'LOREM IP', 'lorem ipsum', 'lorem ipsum', '087676565', 1, 'lorem ipsum', 'rafles', '2015-09-03 07:40:09', '', '0000-00-00 00:00:00', 'sales'),
(11, 'LOREM IPS', 'lorem ipsum', 'lorem ipsum', '0867686565', 1, 'lorem ipsum', 'rafles', '2015-09-03 07:19:09', '', '0000-00-00 00:00:00', 'sales'),
(12, 'RERER', 'rere', 'rererer', '6565656', 0, 'rerererer', 'rafles', '2015-09-05 04:02:09', 'rafles', '2015-09-05 04:14:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `ms_state`
--

CREATE TABLE IF NOT EXISTS `ms_state` (
  `stCode` varchar(2) NOT NULL,
  `stName` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_state`
--

INSERT INTO `ms_state` (`stCode`, `stName`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
('LO', 'LOREM IPSUM SIT AMET', 'administrator', '2015-08-20 11:25:08', 'administrator', '2015-08-27 00:00:00'),
('SA', 'LOREM', 'rafles', '2015-08-21 04:45:08', 'administrator', '2015-08-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `UserName` varchar(30) NOT NULL DEFAULT '0',
  `Password` varchar(100) DEFAULT NULL,
  `FullName` varchar(220) DEFAULT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`UserName`, `Password`, `FullName`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'administrator'),
('rafles', '827ccb0eea8a706c4c34a16891f84e7b', 'rafles');

-- --------------------------------------------------------

--
-- Table structure for table `ms_vendor`
--

CREATE TABLE IF NOT EXISTS `ms_vendor` (
  `venCode` int(11) NOT NULL AUTO_INCREMENT,
  `venInitial` varchar(25) NOT NULL,
  `venName` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `cyCode` varchar(3) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Fax` varchar(25) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `isAgent` tinyint(1) NOT NULL,
  `isAirlines` tinyint(1) NOT NULL,
  `isShippingLines` tinyint(1) NOT NULL,
  `isTrucking` tinyint(1) NOT NULL,
  `isWarehouse` tinyint(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PIC01` varchar(250) NOT NULL,
  `PIC02` varchar(250) NOT NULL,
  `HPPIC01` varchar(25) NOT NULL,
  `HPPIC02` varchar(25) NOT NULL,
  `TermsPayment` double NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `NPWP` varchar(50) NOT NULL,
  `NPWPAddress` varchar(250) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`venCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ms_vendor`
--

INSERT INTO `ms_vendor` (`venCode`, `venInitial`, `venName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isAirlines`, `isShippingLines`, `isTrucking`, `isWarehouse`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `TermsPayment`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'multi', 'PT.Multi Sejahtera', 'jakarta barat', 'MDN', '089897978', '97897878', '77412', 1, 0, 1, 0, 1, 'raflesngln@gmail.com', 'lorem ipsum dolor sit amet', 'lorem ipsum dolor sit amet', 'lorem ipsum dolor sit ame', 'lorem ipsum dolor sit ame', 900000, 1, '7656565656', 'jakarta barat', 'lorem ipsum dolor sit amet', 'Administrator', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'ASAL', 'asal', 'asal', 'MDN', '078787', '978787', '87678', 0, 1, 0, 1, 0, 'raflesngln@gmail.com', 'asal', 'asal', 'asal', 'asl', 900000, 1, '88878686', 'jakbar', 'lorem ipsum', 'administrator', '2015-09-04 11:39:09', '', '0000-00-00 00:00:00'),
(4, 'BASRU', 'basru', 'jakr', 'SRG', '089898', '8767867', '7676', 0, 1, 0, 0, 0, 'raflesngln@gmail.com', '97878', '787', '878', '787', 87, 0, '8878', 'jkjkjkjk', 'jkkhjkhjh', 'rafles', '2015-09-05 04:54:09', 'rafles', '2015-09-05 05:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `transc_id` varchar(50) NOT NULL,
  `awb_no` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `gwt` int(10) NOT NULL,
  `panjang` int(10) NOT NULL,
  `lebar` int(10) NOT NULL,
  `tinggi` int(10) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transc_id` varchar(10) NOT NULL,
  `custCode` int(10) NOT NULL,
  `date_receive` varchar(10) NOT NULL,
  PRIMARY KEY (`transc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `transc_id` varchar(10) NOT NULL,
  `custCode` int(10) NOT NULL,
  `date_receive` varchar(10) NOT NULL,
  `awb_no` varchar(10) NOT NULL,
  `qty` float NOT NULL,
  `gwt` int(10) NOT NULL,
  `panjang` float NOT NULL,
  `lebar` float NOT NULL,
  `tinggi` float NOT NULL,
  `volume` float NOT NULL,
  `cwt` float NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
