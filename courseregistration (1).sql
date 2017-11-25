SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `college` (
  `CName` varchar(20) NOT NULL,
  `COffice` varchar(20) NOT NULL,
  `DeanId` varchar(20) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `college` (`CName`, `COffice`, `DeanId`, `Deleted`) VALUES
('ATEC', '25', '1002', 'N'),
('ECS', '21', '1003', 'N'),
('FO', 'F1.101', '1002', 'Y'),
('JSOM', '22', '1002', 'N'),
('MATH', 'M19.11', '1001', 'N'),
('PHY', '24', '1004', 'N');

CREATE TABLE IF NOT EXISTS `collegephone` (
  `CName` varchar(20) NOT NULL DEFAULT '',
  `CPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `collegephone` (`CName`, `CPhone`, `Deleted`) VALUES
('ATEC', '2234561875', 'N'),
('ATEC', '4656498741', 'N'),
('ECS', '221', 'N'),
('JSOM', '222', 'N');

CREATE TABLE IF NOT EXISTS `course` (
  `CoCode` int(5) NOT NULL DEFAULT '0',
  `CoName` varchar(20) DEFAULT NULL,
  `Credits` int(2) NOT NULL,
  `Level` varchar(20) NOT NULL,
  `CoDescription` varchar(30) NOT NULL,
  `CoDCode` int(5) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `course` (`CoCode`, `CoName`, `Credits`, `Level`, `CoDescription`, `CoDCode`, `Deleted`) VALUES
(1, 'AI', 3, '6389', 'ARTIFICIAL INTELLIGENCE ', 12, 'N'),
(2, 'DB', 3, '6360', 'DATABASE DESIGN', 10, 'N'),
(3, 'DM', 3, '6000', 'DATA MINING', 11, 'N'),
(4, 'BI', 3, '6000', 'BUSINESS INTELLIGENCE', 11, 'N'),
(5, 'HM', 3, '6000', 'HUMANITIES', 12, 'N');

CREATE TABLE IF NOT EXISTS `department` (
  `DCode` int(5) NOT NULL DEFAULT '0',
  `DName` varchar(20) DEFAULT NULL,
  `DOffice` varchar(20) NOT NULL,
  `DeptChairID` varchar(20) DEFAULT NULL,
  `CName` varchar(20) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `department` (`DCode`, `DName`, `DOffice`, `DeptChairID`, `CName`, `Deleted`) VALUES
(10, 'COMPUTER SCIENCE', '110', '1001', 'ECS', 'N'),
(11, 'ITM', '111', '1002', 'JSOM', 'N'),
(12, 'ARTS', '112', '1003', 'ATEC', 'N');

CREATE TABLE IF NOT EXISTS `deptphone` (
  `DCode` int(5) NOT NULL DEFAULT '0',
  `DeptPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `deptphone` (`DCode`, `DeptPhone`, `Deleted`) VALUES
(10, '11111111111', 'N'),
(11, '2222222222', 'N'),
(12, '3333333333', 'N'),
(12, '4444444444', 'N');

CREATE TABLE IF NOT EXISTS `instrphone` (
  `ID` varchar(20) NOT NULL DEFAULT '',
  `IPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `instrphone` (`ID`, `IPhone`, `Deleted`) VALUES
('1002', '6666666666', 'N'),
('1003', '7777777777', 'N'),
('1004', '5555555555', 'N'),
('1004', '8888888888', 'N'),
('1005', '4444444444', 'N');

CREATE TABLE IF NOT EXISTS `instructor` (
  `ID` varchar(20) NOT NULL DEFAULT '',
  `Rank` varchar(20) NOT NULL,
  `IName` varchar(20) DEFAULT NULL,
  `IOffice` varchar(20) NOT NULL,
  `DCode` int(5) DEFAULT NULL,
  `Deleted` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `instructor` (`ID`, `Rank`, `IName`, `IOffice`, `DCode`, `Deleted`) VALUES
('1001', '0001', 'NURCUN YURUK', '200', 10, 'N'),
('1002', '0002', 'ANURAG NAGAR', '201', 10, 'N'),
('1003', '0003', 'NEERAJ GUPTA', '202', 11, 'N'),
('1004', '0004', 'CATYLYN JOSEPH', '203', 11, 'N'),
('1005', '0005', 'JONAH', '204', 12, 'N');

CREATE TABLE IF NOT EXISTS `logindetail` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `SID` varchar(20) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `logindetail` (`id`, `username`, `email`, `user_type`, `password`, `SID`, `Deleted`) VALUES
(1, 'arth', 'axs175430@utdallas.edu', 'user', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'N'),
(3, 'admin', 'arthshah46@gmail.com', 'admin', 'c93ccd78b2076528346216b3b2f701e6', NULL, 'N'),
(7, 'abc', 'absb@gmail.com', 'user', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'N'),
(8, 'adasdsad', 'aadsa@gmail.com', 'user', 'e807f1fcf82d132f9bb018ca6738a19f', NULL, 'N');

CREATE TABLE IF NOT EXISTS `section` (
  `SecId` varchar(20) NOT NULL DEFAULT '',
  `SecNo` varchar(3) DEFAULT NULL,
  `Sem` int(2) NOT NULL,
  `OpenClosed` char(1) DEFAULT 'N',
  `Year` year(4) NOT NULL,
  `RoomNo` varchar(10) NOT NULL,
  `Building` varchar(20) NOT NULL,
  `DaysTime` varchar(20) NOT NULL,
  `InstructorID` varchar(20) DEFAULT NULL,
  `CoCode` int(5) DEFAULT NULL,
  `SectionLimit` int(3) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `section` (`SecId`, `SecNo`, `Sem`, `OpenClosed`, `Year`, `RoomNo`, `Building`, `DaysTime`, `InstructorID`, `CoCode`, `SectionLimit`, `Deleted`) VALUES
('2000', '850', 1, 'N', 2017, '400', 'ECSS', '1:00-2:15', '1001', 1, 50, 'N'),
('2001', '851', 1, 'N', 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100, 'N'),
('2002', '852', 2, 'N', 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22, 'N'),
('2003', '853', 2, 'N', 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100, 'N'),
('2004', '854', 2, 'N', 2018, '404', 'ATEC', '10:00-11:15', '1005', 5, 60, 'N');

CREATE TABLE IF NOT EXISTS `student` (
  `SID` varchar(20) NOT NULL DEFAULT '',
  `DOB` date NOT NULL,
  `SFname` varchar(20) DEFAULT NULL,
  `SMname` varchar(20) NOT NULL,
  `SLname` varchar(20) DEFAULT NULL,
  `Address` varchar(30) NOT NULL,
  `Major` varchar(20) DEFAULT NULL,
  `DCode` int(5) DEFAULT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student` (`SID`, `DOB`, `SFname`, `SMname`, `SLname`, `Address`, `Major`, `DCode`, `Deleted`) VALUES
('0', '0000-00-00', 'admin', '', 'admin', '', '', 10, 'N'),
('1', '2017-10-01', 'WAYNE ', 'CHETAN', 'ROONEY', 'NEW ENGLAND', 'COMPUTER SCIENCE', 10, 'N'),
('2', '2017-10-02', 'ALVARO', 'SANJAY', 'MORATA', '7575 FRANKFORD', 'COMPUTER SCIENCE', 10, 'N'),
('3', '2017-10-03', 'LIONEL', 'RAKESH', 'MESSI', '7676 FRANKFORD', 'MIS', 11, 'N'),
('4', '2017-10-04', 'EDEN', 'BHAVESH', 'HAZARD', '1011 COIT ROAD', 'MIS', 11, 'N'),
('5', '2017-10-05', 'JAMIE', 'KUMAR', 'VARDY', '1011 PRESTON ROAD', 'ARTS', 12, 'N');

CREATE TABLE IF NOT EXISTS `studentphone` (
  `SID` varchar(20) NOT NULL DEFAULT '',
  `SPhone` varchar(20) NOT NULL DEFAULT '',
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `studentphone` (`SID`, `SPhone`, `Deleted`) VALUES
('2', '1111222222', 'N'),
('2', '2222333333', 'N'),
('3', '3333444444', 'N'),
('4', '4444555555', 'N'),
('5', '5555666666', 'N');

CREATE TABLE IF NOT EXISTS `takes` (
  `SID` varchar(20) NOT NULL DEFAULT '',
  `SecID` varchar(20) NOT NULL DEFAULT '',
  `Grade` varchar(2) NOT NULL,
  `Deleted` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `takes` (`SID`, `SecID`, `Grade`, `Deleted`) VALUES
('1', '2001', 'B', 'N'),
('1', '2002', 'A+', 'N'),
('2', '2000', 'A', 'Y'),
('3', '2003', 'B+', 'N'),
('4', '2003', 'C', 'N');


ALTER TABLE `college`
  ADD PRIMARY KEY (`CName`),
  ADD KEY `DeanId` (`DeanId`);

ALTER TABLE `collegephone`
  ADD PRIMARY KEY (`CName`,`CPhone`);

ALTER TABLE `course`
  ADD PRIMARY KEY (`CoCode`),
  ADD KEY `CoDCode` (`CoDCode`);

ALTER TABLE `department`
  ADD PRIMARY KEY (`DCode`),
  ADD UNIQUE KEY `DName` (`DName`),
  ADD KEY `DeptChairID` (`DeptChairID`,`CName`),
  ADD KEY `FK_CName` (`CName`);

ALTER TABLE `deptphone`
  ADD PRIMARY KEY (`DCode`,`DeptPhone`);

ALTER TABLE `instrphone`
  ADD PRIMARY KEY (`ID`,`IPhone`);

ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DCode` (`DCode`);

ALTER TABLE `logindetail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_SID_login` (`SID`);

ALTER TABLE `section`
  ADD PRIMARY KEY (`SecId`),
  ADD KEY `InstructorID` (`InstructorID`,`CoCode`),
  ADD KEY `FK_CoCode` (`CoCode`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `DCode` (`DCode`);

ALTER TABLE `studentphone`
  ADD PRIMARY KEY (`SID`,`SPhone`);

ALTER TABLE `takes`
  ADD PRIMARY KEY (`SID`,`SecID`),
  ADD KEY `FK_SecID` (`SecID`);


ALTER TABLE `college`
  ADD CONSTRAINT `FK_DeanID` FOREIGN KEY (`DeanId`) REFERENCES `instructor` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `collegephone`
  ADD CONSTRAINT `FK_CollegePhone` FOREIGN KEY (`CName`) REFERENCES `college` (`CName`) ON UPDATE CASCADE;

ALTER TABLE `course`
  ADD CONSTRAINT `FK_CoDeptCode` FOREIGN KEY (`CoDCode`) REFERENCES `department` (`DCode`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `department`
  ADD CONSTRAINT `FK_CName` FOREIGN KEY (`CName`) REFERENCES `college` (`CName`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DeptChairID` FOREIGN KEY (`DeptChairID`) REFERENCES `instructor` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `deptphone`
  ADD CONSTRAINT `FK_DeptPhone` FOREIGN KEY (`DCode`) REFERENCES `department` (`DCode`) ON UPDATE CASCADE;

ALTER TABLE `instrphone`
  ADD CONSTRAINT `FK_InstrPhone` FOREIGN KEY (`ID`) REFERENCES `instructor` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `instructor`
  ADD CONSTRAINT `FK_IDCode` FOREIGN KEY (`DCode`) REFERENCES `department` (`DCode`) ON UPDATE CASCADE;

ALTER TABLE `logindetail`
  ADD CONSTRAINT `FK_SID_login` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON UPDATE CASCADE;

ALTER TABLE `section`
  ADD CONSTRAINT `FK_CoCode` FOREIGN KEY (`CoCode`) REFERENCES `course` (`CoCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_InstrID` FOREIGN KEY (`InstructorID`) REFERENCES `instructor` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `student`
  ADD CONSTRAINT `FK_DeptCode` FOREIGN KEY (`DCode`) REFERENCES `department` (`DCode`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `studentphone`
  ADD CONSTRAINT `FK_StudentPhone` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON UPDATE CASCADE;

ALTER TABLE `takes`
  ADD CONSTRAINT `FK_SID` FOREIGN KEY (`SID`) REFERENCES `student` (`SID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SecID` FOREIGN KEY (`SecID`) REFERENCES `section` (`SecId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
