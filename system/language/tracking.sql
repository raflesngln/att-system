-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2015 at 04:40 AM
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
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(100) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `phone` int(13) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_address`, `phone`) VALUES
(1, 'PT.ABC', 'jaarta', 897979),
(2, 'PT.XYZ', 'jjakarta', 924857856),
(6, 'PT. Sejahtera', 'sejater@gmail.com', 7483656);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` varchar(10) NOT NULL,
  `date_invoice` date NOT NULL,
  `transc_id` varchar(20) NOT NULL,
  `custCode` varchar(10) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount_pay` float NOT NULL,
  PRIMARY KEY (`invoice_id`,`transc_id`,`custCode`,`currency`,`amount_pay`),
  UNIQUE KEY `transc_id` (`transc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, '0101', '101-012015061119', '2', '124', '2015-08-28', 'CGK', 'FRA', '21430', 'MORPHO CARDS (SINGAPORE) PTE. LTD', '', 'PT. CARDSINDO TIGA PERKASA', '', '05', 'ARRIVED AT ORIGIN AIRPORT-', '2015-08-15 03:09:09', 'dini', 'Jun 24 2015 12:00AM', '', '2015-08-03 00:00:00', '', '', '', '');

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
('JKT', 'JAKARTA', 'ID', 'LO', 1, 1, 'rafles', '2015-08-21 05:59:08', 'administrator', '2015-08-26 06:08:49'),
('MDN', 'MEDAN', 'ID', 'SA', 1, 0, 'rafles', '2015-08-21 05:42:08', '', '0000-00-00 00:00:00'),
('SBY', 'SURABAYA', 'ID', 'LO', 0, 1, 'rafles', '2015-08-21 05:38:08', 'administrator', '2015-09-25 03:09:37'),
('SKG', 'SINGKARAK', 'MY', 'SA', 1, 1, 'rafles', '2015-08-21 05:47:08', '', '0000-00-00 00:00:00');

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
('SG', 'SINGAPURA', 'administrator', '2015-08-20 10:01:08', 'rafles', '2015-08-21 05:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE IF NOT EXISTS `ms_customer` (
  `custCode` int(10) NOT NULL AUTO_INCREMENT,
  `custInitial` varchar(10) NOT NULL,
  `custName` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `cyCode` varchar(3) NOT NULL,
  `Phone` int(25) NOT NULL,
  `Fax` varchar(25) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `isAgent` tinyint(1) NOT NULL,
  `isShipper` tinyint(1) NOT NULL,
  `isCnee` tinyint(1) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `PIC01` varchar(250) NOT NULL,
  `PIC02` varchar(250) NOT NULL,
  `HPPIC01` int(25) NOT NULL,
  `HPPIC02` varchar(25) NOT NULL,
  `CreditLimit` double NOT NULL,
  `TermsPayment` varchar(250) NOT NULL,
  `Deposit` double NOT NULL,
  `empCode` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `NPWP` varchar(50) NOT NULL,
  `NPWPAddress` varchar(250) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`custCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`custCode`, `custInitial`, `custName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isShipper`, `isCnee`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(6, 'budi', 'BUDI', 'JAKARTA', 'JKT', 64, '6646', '64Y4Y', 0, 1, 0, 'raflesngln@gmail.com', '34343', '5445', 6565, '87878', 65656, '454654645', 56546546, 3, 0, '564645645', '45456456', 'THHYSTHY', 'administrator', '2015-10-01 10:00:58', 'administrator', '2015-10-01 05:00:58'),
(8, 'rerer', 'erer', 'erer', 'MDN', 986778767, 'erer', 'erere', 1, 0, 0, 'raflesn@yahoo.comdgf', '1212', '12121', 3232, '2323', 0, 'erere', 0, 3, 0, 'erer', 'erre', 'rerere', 'aldi', '2015-10-02 06:07:38', 'administrator', '2015-10-02 01:07:38'),
(9, 'Nuri', 'Nuri', 'Jakarta barat', 'JKT', 343545, '43434', '3434', 1, 0, 1, 'rerere@gmmg.hgj', '1313', '244', 4545, '7676', 34434, 'trhtrhrshyh', 2343434, 3, 0, '343434', '343434', 'tghthyrthyrthryhrtyh', 'aldi', '2015-10-02 06:06:34', 'administrator', '2015-10-02 01:06:34');

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
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`discCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ms_disc`
--

INSERT INTO `ms_disc` (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(6, '5', '4', 'MDN', 'JAKARTA', 'SURABAYA', '2', 7, 1250000, 1, 'vvPt.Maju TerusPt.Maju TerusPt.Maju TerusPt.Maju Terus', 'administrator', '2015-09-09 11:47:09', 'administrator', '2015-09-28 09:30:09'),
(7, '6', '3', 'SKG', 'JAKARTA', 'SURABAYA', '1', 8, 90000, 1, 'asaslalsalsklakslklaskla', 'administrator', '2015-09-09 10:13:09', 'administrator', '2015-09-28 12:27:09'),
(8, '5', '4', '0', 'SURABAYA', 'SINGKARAK', '2', 9, 80000, 1, 'LOREM IPSUMDOLOR SITAMET', 'administrator', '2015-09-09 11:06:09', '', '0000-00-00 00:00:00'),
(9, '6', '3', '0', 'JAKARTA', 'MEDAN', '2', 5, 6, 0, 'LOREM IPSUMDOLOR SITAMET', 'administrator', '2015-09-09 11:26:09', 'administrator', '2015-09-28 12:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `ms_service`
--

CREATE TABLE IF NOT EXISTS `ms_service` (
  `svCode` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`svCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ms_service`
--

INSERT INTO `ms_service` (`svCode`, `Name`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(3, 'PAKET KIRIM', 'Paket Kirim', 'administrator', '2015-09-09 10:49:09', 'administrator', '2015-09-28 00:00:00'),
(4, 'POTONG BAYAR', 'Diskon biaya kirimDiskon biaya kirimDiskon biaya kirim', 'administrator', '2015-09-09 11:58:09', 'administrator', '2015-09-28 00:00:00'),
(5, 'DISKON KIRIM', 'Lorem ipsum', 'administrator', '2015-09-28 09:03:09', 'administrator', '2015-09-28 00:00:00');

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
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `devisi` varchar(30) NOT NULL,
  PRIMARY KEY (`empCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ms_staff`
--

INSERT INTO `ms_staff` (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES
(3, 'DEDE', 'Dede', 'Serang bantene', '0878091655', 1, 'lorem ipsum dolor sit amet', 'administrator', '2015-09-09 10:49:09', 'administrator', '2015-09-28 09:23:09', 'sales'),
(4, 'RIA', 'Ria', 'lorem ipsum', 'jakarta', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:23:09', 'administrator', '2015-09-28 09:09:09', ''),
(5, 'SANDI', 'Sandi', 'lorem ipsum', 'vlorem ipsum`', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:41:09', 'administrator', '2015-09-19 03:53:09', 'sales'),
(6, 'IRMA', 'Irma', 'jakartabarat', '08888787878', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:01:09', '', '0000-00-00 00:00:00', ''),
(7, 'SAHRUL', 'sahrul', 'lorem ipsum', '9898989', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:44:09', 'administrator', '2015-09-19 03:04:09', ''),
(8, 'MMININ', 'mimin', 'jaktarta', '02213u339', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:31:09', '', '0000-00-00 00:00:00', ''),
(9, 'BUDI', 'Budi', 'lorem ipsum', '09809898', 1, '9lorem ipsum', 'administrator', '2015-09-09 11:57:09', 'administrator', '2015-09-19 03:24:09', ''),
(10, 'LOREM IPSU', 'Suryadi', 'lorem ipsum', '898989', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:23:09', 'administrator', '2015-09-25 03:04:09', ''),
(11, 'MARNI', 'Marni', 'lorem ipsum', '98989898', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:39:09', 'administrator', '2015-09-25 03:08:09', ''),
(12, 'LOREM IPSU', 'Rani', 'lorem ipsum', '989898989', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:00:09', 'administrator', '2015-09-25 03:39:09', ''),
(13, 'HENDRA', 'Hendra', 'lorem ipsum', '9789789798', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:11:09', 'administrator', '2015-09-25 03:06:09', '');

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
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `FullName` varchar(220) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id_user`, `UserName`, `Password`, `FullName`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'administrator'),
(2, 'rafles', '827ccb0eea8a706c4c34a16891f84e7b', 'aldi'),
(3, 'anton', '827ccb0eea8a706c4c34a16891f84e7b', 'rafles');

-- --------------------------------------------------------

--
-- Table structure for table `ms_vendor`
--

CREATE TABLE IF NOT EXISTS `ms_vendor` (
  `venCode` int(10) NOT NULL AUTO_INCREMENT,
  `venInitial` varchar(10) NOT NULL,
  `venName` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `cyCode` varchar(3) NOT NULL,
  `Phone` int(25) NOT NULL,
  `Fax` varchar(25) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `isAgent` tinyint(1) NOT NULL,
  `isAirlines` tinyint(1) NOT NULL,
  `isShippingLines` tinyint(1) NOT NULL,
  `isTrucking` tinyint(1) NOT NULL,
  `isWarehouse` tinyint(1) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `PIC01` varchar(250) NOT NULL,
  `PIC02` varchar(250) NOT NULL,
  `HPPIC01` int(25) NOT NULL,
  `HPPIC02` varchar(25) NOT NULL,
  `CreditLimit` double NOT NULL,
  `TermsPayment` varchar(250) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `NPWP` varchar(50) NOT NULL,
  `NPWPAddress` varchar(250) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`venCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ms_vendor`
--

INSERT INTO `ms_vendor` (`venCode`, `venInitial`, `venName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isAirlines`, `isShippingLines`, `isTrucking`, `isWarehouse`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'SUMBERREJE', 'Sumberrejeki', 'Sumberrejeki', 'JKT', 8868, '6868686', '868', 1, 1, 1, 1, 1, '', '676', '7676', 767, '6767', 0, '7676', 1, 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'administrator', '2015-09-09 21:42:19', 'administrator', '2015-09-09 18:19:09'),
(2, 'PT.MAJU TE', 'Maju Terus', 'jakta abarat', 'SBY', 907987878, 'u878767', '7729', 1, 1, 0, 0, 1, 'raflesn@yahoo.com', '88999898', '898989', 898, '989', 0, '900000', 1, '909090909', 'serang', 'vvPt.Maju TerusPt.Maju TerusPt.Maju TerusPt.Maju Terus', 'administrator', '2015-09-28 10:59:32', 'administrator', '2015-09-28 05:32:09');

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
