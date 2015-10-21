#
# TABLE STRUCTURE FOR: ms_currency
#

DROP TABLE IF EXISTS ms_currency;

CREATE TABLE `ms_currency` (
  `curCode` int(10) NOT NULL AUTO_INCREMENT,
  `curName` varchar(25) NOT NULL,
  `curDetail` varchar(100) NOT NULL,
  PRIMARY KEY (`curCode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO ms_currency (`curCode`, `curName`, `curDetail`) VALUES (1, 'USD', 'American Dollar');


#
# TABLE STRUCTURE FOR: ms_state
#

DROP TABLE IF EXISTS ms_state;

CREATE TABLE `ms_state` (
  `stCode` varchar(2) NOT NULL,
  `stName` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ms_state (`stCode`, `stName`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('LO', 'LOREM IPSUM SIT AMET', 'administrator', '2015-08-20 11:25:08', 'administrator', '2015-08-27 00:00:00');
INSERT INTO ms_state (`stCode`, `stName`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('SA', 'LOREM', 'rafles', '2015-08-21 04:45:08', 'administrator', '2015-08-27 00:00:00');


#
# TABLE STRUCTURE FOR: ms_charges
#

DROP TABLE IF EXISTS ms_charges;

CREATE TABLE `ms_charges` (
  `idCharges` int(10) NOT NULL,
  `ChargeCode` varchar(20) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `isCost` tinyint(1) NOT NULL,
  `isSales` tinyint(1) NOT NULL,
  `svCode` varchar(10) NOT NULL,
  `AccDebet` varchar(50) NOT NULL,
  `AccCredit` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ChargeCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ms_charges (`idCharges`, `ChargeCode`, `Description`, `isCost`, `isSales`, `svCode`, `AccDebet`, `AccCredit`, `isActive`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (1, '02', 'dolor sit amet', 1, 0, '6', '555555', '555555', 1, 'Administrator', '2015-10-17 06:52:10', 'Administrator', '2015-10-20 03:30:10');
INSERT INTO ms_charges (`idCharges`, `ChargeCode`, `Description`, `isCost`, `isSales`, `svCode`, `AccDebet`, `AccCredit`, `isActive`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (2, '11', 'lorem ipsum dolor sit amet', 0, 1, '8', 'lorem ipsum', 'lorem ipsum', 1, 'Administrator', '2015-10-17 06:44:10', 'Administrator', '2015-10-19 07:11:10');
INSERT INTO ms_charges (`idCharges`, `ChargeCode`, `Description`, `isCost`, `isSales`, `svCode`, `AccDebet`, `AccCredit`, `isActive`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (3, '12', 'lorem kipsum', 0, 1, '8', 'lorem ipsum', 'lorem ipsum', 1, 'Administrator', '2015-10-19 03:35:10', 'Administrator', '2015-10-19 03:36:10');
INSERT INTO ms_charges (`idCharges`, `ChargeCode`, `Description`, `isCost`, `isSales`, `svCode`, `AccDebet`, `AccCredit`, `isActive`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (4, '14HF', 'Handling Fee', 0, 1, '6', '123', '123', 1, 'Administrator', '2015-10-20 08:01:10', '', '0000-00-00 00:00:00');
INSERT INTO ms_charges (`idCharges`, `ChargeCode`, `Description`, `isCost`, `isSales`, `svCode`, `AccDebet`, `AccCredit`, `isActive`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (5, 'CC', 'lorem kipsum', 1, 1, '', 'lorem kipsum', 'lorem kipsum', 1, 'Administrator', '2015-10-19 03:17:10', '', '0000-00-00 00:00:00');
INSERT INTO ms_charges (`idCharges`, `ChargeCode`, `Description`, `isCost`, `isSales`, `svCode`, `AccDebet`, `AccCredit`, `isActive`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (6, 'THHBD', 'dghbdhbdf', 0, 0, '', 'tbhdb', 'bhfgbf', 1, 'Administrator', '2015-10-19 03:33:10', '', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: ms_city
#

DROP TABLE IF EXISTS ms_city;

CREATE TABLE `ms_city` (
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

INSERT INTO ms_city (`cyCode`, `cyName`, `couCode`, `stCode`, `isAirport`, `isSeaport`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('JKT', 'JAKARTA', 'ID', 'LO', 1, 1, 'rafles', '2015-08-21 05:59:08', 'Rafles Nainggolan', '2015-10-16 08:10:41');
INSERT INTO ms_city (`cyCode`, `cyName`, `couCode`, `stCode`, `isAirport`, `isSeaport`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('JOG', 'JOGJAKARTA', 'ID', 'LO', 1, 0, '0', '2015-10-13 06:11:10', '', '0000-00-00 00:00:00');
INSERT INTO ms_city (`cyCode`, `cyName`, `couCode`, `stCode`, `isAirport`, `isSeaport`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('MDN', 'MEDAN', 'ID', 'SA', 1, 0, 'rafles', '2015-08-21 05:42:08', '', '0000-00-00 00:00:00');
INSERT INTO ms_city (`cyCode`, `cyName`, `couCode`, `stCode`, `isAirport`, `isSeaport`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('SBY', 'SURABAYA', 'ID', 'LO', 0, 1, 'rafles', '2015-08-21 05:38:08', 'administrator', '2015-09-25 03:09:37');
INSERT INTO ms_city (`cyCode`, `cyName`, `couCode`, `stCode`, `isAirport`, `isSeaport`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('SKG', 'SINGKARAK', 'MY', 'SA', 1, 1, 'rafles', '2015-08-21 05:47:08', '', '0000-00-00 00:00:00');
INSERT INTO ms_city (`cyCode`, `cyName`, `couCode`, `stCode`, `isAirport`, `isSeaport`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('SWE', 'WEW', 'ID', 'LO', 0, 1, 'Rafles Nainggolan', '2015-10-16 08:16:10', '', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: ms_commodity
#

DROP TABLE IF EXISTS ms_commodity;

CREATE TABLE `ms_commodity` (
  `commCode` varchar(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Section` varchar(10) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`commCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ms_commodity (`commCode`, `Name`, `Section`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('AB', 'three', 'Lorem Ipsu', 'lorem ipsum dolor sit amet', 'Rafles Nainggolan', '2015-10-16 09:05:10', 'Administrator', '2015-10-16 09:18:10');
INSERT INTO ms_commodity (`commCode`, `Name`, `Section`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('AC', 'one', 'lorem', 'lorem ipsum dolor sit amet', 'Administrator', '2015-10-16 09:50:10', 'Rafles Nainggolan', '2015-10-16 09:46:10');
INSERT INTO ms_commodity (`commCode`, `Name`, `Section`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('AD', 'lorem kipsum', 'lorem kips', 'lorem kipsumlorem kipsumlorem kipsumlorem kipsumlorem ', 'Administrator', '2015-10-19 03:46:10', 'Administrator', '2015-10-19 03:55:10');


#
# TABLE STRUCTURE FOR: ms_country
#

DROP TABLE IF EXISTS ms_country;

CREATE TABLE `ms_country` (
  `couCode` varchar(2) NOT NULL,
  `couName` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`couCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO ms_country (`couCode`, `couName`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('ID', 'INDONESIA', 'admin', '2015-08-20 10:16:08', 'rafles', '2015-08-21 05:08:04');
INSERT INTO ms_country (`couCode`, `couName`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('MY', 'MALAYSIA', 'administrator', '2015-08-20 10:13:08', 'rafles', '2015-08-21 05:08:02');
INSERT INTO ms_country (`couCode`, `couName`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES ('SG', 'SINGAPURA', 'administrator', '2015-08-20 10:01:08', 'rafles', '2015-08-21 05:08:51');


#
# TABLE STRUCTURE FOR: ms_customer
#

DROP TABLE IF EXISTS ms_customer;

CREATE TABLE `ms_customer` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO ms_customer (`custCode`, `custInitial`, `custName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isShipper`, `isCnee`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (10, 'Dini', 'Dini Arini', 'Cengkareng Barat', 'JOG', 891234627, '56575', '5645', 1, 1, 0, 'dini@yahoo.com', '7676', '8667', 67676, '67676', '8000', 'lorem ipsum', '90909090', 3, 0, '7838456', 'jakarta barat', 'lotek ipsum dolor sit amet', 'aldi', '2015-10-15 14:14:30', 'Administrator', '2015-10-15 09:14:30');
INSERT INTO ms_customer (`custCode`, `custInitial`, `custName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isShipper`, `isCnee`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (11, 'Rani', 'Rani Rahma', 'jakarta', 'JKT', 87787, '56575', '5645', 0, 0, 1, 'dini@yahoo.com', '7676', '8667', 67676, '67676', '8000', 'lorem ipsum', '90909090', 3, 0, '7838456', 'jakarta barat', 'lotek ipsum dolor sit amet', 'aldi', '2015-10-15 14:14:41', 'Administrator', '2015-10-15 09:14:41');
INSERT INTO ms_customer (`custCode`, `custInitial`, `custName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isShipper`, `isCnee`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (12, 'Budi', 'Budi waseso', 'Grogol petamburan', 'JKT', 214732463, '56575', '5645', 1, 1, 1, 'dini@yahoo.com', '7676', '8667', 67676, '67676', '8000', 'lorem ipsum', '90909090', 3, 0, '7838456', 'jakarta barat', 'lotek ipsum dolor sit amet', 'aldi', '2015-10-15 14:14:58', 'Administrator', '2015-10-15 09:14:58');
INSERT INTO ms_customer (`custCode`, `custInitial`, `custName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isShipper`, `isCnee`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (13, 'raf', 'rafles', 'kapuk raya', 'JOG', 47374, '748738', '8323', 1, 1, 0, 'raflesn@yahoo.com', '34', '5654', 34, '23', '387437', 'atm', '43754837', 3, 0, '743476', 'jakarta barat', 'lorem iosum dolor sit amet', 'Administrator', '2015-10-15 09:51:21', '', '0000-00-00 00:00:00');
INSERT INTO ms_customer (`custCode`, `custInitial`, `custName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isShipper`, `isCnee`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `Deposit`, `empCode`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (14, 'wahyu', 'wahyu sanjaya', 'surabaya', 'SBY', 56765, '565', '5765', 0, 1, 1, 'wahyu@gmail.com', '56565', '5656', 5656, '5656', '6565', '6565', '565', 3, 0, '56565', '5656yu6yuh6t5uh', '6ujt6y5u', 'Administrator', '2015-10-15 09:52:57', '', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: ms_disc
#

DROP TABLE IF EXISTS ms_disc;

CREATE TABLE `ms_disc` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO ms_disc (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (6, '5', '4', 'MDN', 'JAKARTA', 'SURABAYA', '2', '7', '1250000', 1, 'vvPt.Maju TerusPt.Maju TerusPt.Maju TerusPt.Maju Terus', 'administrator', '2015-09-09 11:47:09', 'administrator', '2015-09-28 09:30:09');
INSERT INTO ms_disc (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (7, '6', '3', 'SKG', 'JAKARTA', 'SURABAYA', '1', '8', '90000', 1, 'asaslalsalsklakslklaskla', 'administrator', '2015-09-09 10:13:09', 'administrator', '2015-09-28 12:27:09');
INSERT INTO ms_disc (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (8, '5', '4', '0', 'SURABAYA', 'SINGKARAK', '2', '9', '80000', 1, 'LOREM IPSUMDOLOR SITAMET', 'administrator', '2015-09-09 11:06:09', '', '0000-00-00 00:00:00');
INSERT INTO ms_disc (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (9, '6', '3', '0', 'JAKARTA', 'MEDAN', '2', '5', '6', 0, 'LOREM IPSUMDOLOR SITAMET', 'administrator', '2015-09-09 11:26:09', 'administrator', '2015-09-28 12:14:09');
INSERT INTO ms_disc (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (10, '11', '3', '0', 'JAKARTA', 'MEDAN', '2', '900', '8000000', 0, 'lorem ipsum dopoe sit a,.etr', 'aldi', '2015-10-07 05:50:10', 'aldi', '2015-10-09 09:28:10');
INSERT INTO ms_disc (`discCode`, `custCode`, `svCode`, `cyCode`, `ori`, `dest`, `venCode`, `DiscPersen`, `DiscRupiah`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (11, '12', '3', '0', 'MEDAN', 'SURABAYA', '1', '9', '800000', 0, 'dolor sit amet ', 'aldi', '2015-10-07 05:13:10', '', '0000-00-00 00:00:00');


#
# TABLE STRUCTURE FOR: ms_service
#

DROP TABLE IF EXISTS ms_service;

CREATE TABLE `ms_service` (
  `svCode` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `CreateBy` varchar(30) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` varchar(30) NOT NULL,
  `ModifiedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`svCode`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO ms_service (`svCode`, `Name`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (6, 'PORT TO PORT', 'Port to Port', 'Administrator', '2015-10-13 06:39:10', 'Administrator', '2015-10-13 00:00:00');
INSERT INTO ms_service (`svCode`, `Name`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (7, 'PORT TO DOOR', 'Port to door', 'Administrator', '2015-10-13 06:42:10', 'Administrator', '2015-10-13 00:00:00');
INSERT INTO ms_service (`svCode`, `Name`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (8, 'DOOR TO DOOR', 'door to door', 'Administrator', '2015-10-13 06:02:10', 'Administrator', '2015-10-13 00:00:00');
INSERT INTO ms_service (`svCode`, `Name`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (9, 'DOOR TO PORT', 'door to port', 'Administrator', '2015-10-13 06:41:10', 'Administrator', '2015-10-13 00:00:00');


#
# TABLE STRUCTURE FOR: ms_staff
#

DROP TABLE IF EXISTS ms_staff;

CREATE TABLE `ms_staff` (
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (3, 'DEDE', 'Dede', 'Serang bantene', '0878091655', 1, 'lorem ipsum dolor sit amet', 'administrator', '2015-09-09 10:49:09', 'administrator', '2015-09-28 09:23:09', 'sales');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (4, 'RIA', 'Ria', 'lorem ipsum', 'jakarta', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:23:09', 'administrator', '2015-09-28 09:09:09', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (5, 'SANDI', 'Sandi', 'lorem ipsum', 'vlorem ipsum`', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:41:09', 'administrator', '2015-09-19 03:53:09', 'sales');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (6, 'IRMA', 'Irma', 'jakartabarat', '08888787878', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:01:09', '', '0000-00-00 00:00:00', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (7, 'SAHRUL', 'sahrul', 'lorem ipsum', '9898989', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:44:09', 'administrator', '2015-09-19 03:04:09', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (8, 'MMININ', 'mimin', 'jaktarta', '02213u339', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:31:09', '', '0000-00-00 00:00:00', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (9, 'BUDI', 'Budi', 'lorem ipsum', '09809898', 1, '9lorem ipsum', 'administrator', '2015-09-09 11:57:09', 'administrator', '2015-09-19 03:24:09', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (10, 'LOREM IPSU', 'Suryadi', 'lorem ipsum', '898989', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:23:09', 'administrator', '2015-09-25 03:04:09', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (11, 'MARNI', 'Marni', 'lorem ipsum', '98989898', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:39:09', 'administrator', '2015-09-25 03:08:09', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (12, 'LOREM IPSU', 'Rani', 'lorem ipsum', '989898989', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:00:09', 'administrator', '2015-09-25 03:39:09', '');
INSERT INTO ms_staff (`empCode`, `empInitial`, `empName`, `Address`, `Phone`, `isActive`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `devisi`) VALUES (13, 'HENDRA', 'Hendra', 'lorem ipsum', '9789789798', 1, 'lorem ipsum', 'administrator', '2015-09-09 11:11:09', 'administrator', '2015-09-25 03:06:09', 'sales');


#
# TABLE STRUCTURE FOR: ms_user
#

DROP TABLE IF EXISTS ms_user;

CREATE TABLE `ms_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `FullName` varchar(220) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Level` enum('Admin','User') NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO ms_user (`id_user`, `UserName`, `Password`, `FullName`, `Email`, `Level`, `CreateDate`, `ModifiedDate`) VALUES (1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'adminattgroup@gmail.com', 'Admin', '0000-00-00 00:00:00', '2015-10-16 05:10:35');
INSERT INTO ms_user (`id_user`, `UserName`, `Password`, `FullName`, `Email`, `Level`, `CreateDate`, `ModifiedDate`) VALUES (2, 'rafles', '827ccb0eea8a706c4c34a16891f84e7b', 'Rafles Nainggolan', 'raflesngln@gmail.com', 'User', '0000-00-00 00:00:00', '2015-10-13 05:10:21');


#
# TABLE STRUCTURE FOR: ms_vendor
#

DROP TABLE IF EXISTS ms_vendor;

CREATE TABLE `ms_vendor` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO ms_vendor (`venCode`, `venInitial`, `venName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isAirlines`, `isShippingLines`, `isTrucking`, `isWarehouse`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (1, 'SUMBERREJE', 'Sumberrejeki', 'Sumberrejeki', 'JKT', 8868, '6868686', '868', 1, 1, 1, 0, 0, '', '676', '7676', 767, '6767', '0', '7676', 1, 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'administrator', '2015-10-13 10:49:52', '0', '2015-10-13 05:52:10');
INSERT INTO ms_vendor (`venCode`, `venInitial`, `venName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isAirlines`, `isShippingLines`, `isTrucking`, `isWarehouse`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (2, 'PT.MAJU TE', 'Maju Terus', 'jakta abarat', 'SBY', 907987878, 'u878767', '7729', 1, 1, 0, 0, 1, 'raflesn@yahoo.com', '88999898', '898989', 898, '989', '0', '900000', 1, '909090909', 'serang', 'vvPt.Maju TerusPt.Maju TerusPt.Maju TerusPt.Maju Terus', 'administrator', '2015-10-13 15:06:15', 'Administrator', '2015-10-13 10:15:10');
INSERT INTO ms_vendor (`venCode`, `venInitial`, `venName`, `Address`, `cyCode`, `Phone`, `Fax`, `PostalCode`, `isAgent`, `isAirlines`, `isShippingLines`, `isTrucking`, `isWarehouse`, `Email`, `PIC01`, `PIC02`, `HPPIC01`, `HPPIC02`, `CreditLimit`, `TermsPayment`, `isActive`, `NPWP`, `NPWPAddress`, `Remarks`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES (10, 'ABC', 'ABC', 'solo', 'JOG', 545, '5455', '54', 1, 0, 0, 1, 1, 'ra@yahoo.com', '545', '545', 4545, '45', '0', '5YHJTYJ', 0, 'JYTJ', 'JTYJ', 'JTRYJR', 'rafles nainggolan', '2015-10-16 13:08:06', 'Rafles Nainggolan', '2015-10-16 08:06:10');


