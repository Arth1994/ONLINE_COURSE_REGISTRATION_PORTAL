CREATE DATABASE courseregistration;
CREATE TABLE `courseregistration`.`College` ( `CName` VARCHAR(20) NOT NULL , `COffice` VARCHAR(20) NOT NULL , `DeanId` VARCHAR(20) NULL , PRIMARY KEY (`CName`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`Department` ( `DName` VARCHAR(20) NULL , `DCode` INT(5) NULL , `DOffice` VARCHAR(20) NOT NULL , `DeptChairID` VARCHAR(20) NULL , `CName` VARCHAR(20) NULL , PRIMARY KEY (`DCode`), UNIQUE (`DName`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`Course` ( `CoCode` INT(5) NULL , `CoName` VARCHAR(20) NULL , `Credits` INT(2) NOT NULL , `Level` VARCHAR(20) NOT NULL , `CoDescription` VARCHAR(30) NOT NULL , `CoDCode` INT(5) NULL , PRIMARY KEY (`CoCode`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`Section` ( `SecId` VARCHAR(20) NULL , `SecNo` VARCHAR(3) NULL , `Sem` INT(2) NOT NULL , `Year` YEAR(4) NOT NULL , `RoomNo` VARCHAR(10) NOT NULL , `Building` VARCHAR(20) NOT NULL , `DaysTime` VARCHAR(20) NOT NULL , `InstructorID` VARCHAR(20) NULL , `CoCode` INT(5) NULL , `SectionLimit` INT(3) NULL , PRIMARY KEY (`SecId`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`Instructor` ( `ID` VARCHAR(20) NULL , `Rank` VARCHAR(20) NOT NULL , `IName` VARCHAR(20) NULL , `IOffice` VARCHAR(20) NOT NULL , `DCode` INT(5) NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`Student` ( `SID` VARCHAR(20) NULL , `DOB` DATE NOT NULL , `SFname` VARCHAR(20) NULL , `SMname` VARCHAR(20) NOT NULL , `SLname` VARCHAR(20) NULL , `Address` VARCHAR(30) NOT NULL , `Major` VARCHAR(20) NULL , `DCode` INT(5) NULL , PRIMARY KEY (`SID`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`Takes` ( `SID` VARCHAR(20) NULL , `SecID` VARCHAR(20) NULL , `Grade` VARCHAR(2) NOT NULL , PRIMARY KEY (`SID`, `SecID`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`CollegePhone` ( `CName` VARCHAR(20) NULL , `CPhone` VARCHAR(20) NULL , PRIMARY KEY (`CName`, `CPhone`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`DeptPhone` ( `DCode` INT(5) NULL , `DeptPhone` VARCHAR(20) NULL , PRIMARY KEY (`DCode`, `DeptPhone`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`InstrPhone` ( `ID` VARCHAR(20) NULL , `IPhone` VARCHAR(20) NULL , PRIMARY KEY (`ID`, `IPhone`)) ENGINE = InnoDB;
CREATE TABLE `courseregistration`.`StudentPhone` ( `SID` VARCHAR(20) NULL , `SPhone` VARCHAR(20) NULL , PRIMARY KEY (`SID`, `SPhone`)) ENGINE = InnoDB;
ALTER TABLE `college` ADD INDEX( `DeanId`);
ALTER TABLE `college` ADD CONSTRAINT `FK_DeanID` FOREIGN KEY (`DeanId`) REFERENCES `courseregistration`.`instructor`(`ID`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `department` ADD INDEX( `DeptChairID`, `CName`);
ALTER TABLE `department` ADD CONSTRAINT `FK_DeptChairID` FOREIGN KEY (`DeptChairID`) REFERENCES `courseregistration`.`instructor`(`ID`) ON DELETE RESTRICT ON UPDATE CASCADE; ALTER TABLE `department` ADD CONSTRAINT `FK_CName` FOREIGN KEY (`CName`) REFERENCES `courseregistration`.`college`(`CName`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `course` ADD INDEX( `CoDCode`);
ALTER TABLE `course` ADD CONSTRAINT `FK_CoDeptCode` FOREIGN KEY (`CoDCode`) REFERENCES `courseregistration`.`course`(`CoCode`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `section` ADD INDEX( `InstructorID`, `CoCode`);
ALTER TABLE `section` ADD CONSTRAINT `FK_InstrID` FOREIGN KEY (`InstructorID`) REFERENCES `courseregistration`.`instructor`(`ID`) ON DELETE SET NULL ON UPDATE CASCADE; ALTER TABLE `section` ADD CONSTRAINT `FK_CoCode` FOREIGN KEY (`CoCode`) REFERENCES `courseregistration`.`course`(`CoCode`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `student` ADD INDEX( `DCode`);
ALTER TABLE `student` ADD CONSTRAINT `FK_DeptCode` FOREIGN KEY (`DCode`) REFERENCES `courseregistration`.`department`(`DCode`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `takes` ADD CONSTRAINT `FK_SID` FOREIGN KEY (`SID`) REFERENCES `courseregistration`.`student`(`SID`) ON DELETE RESTRICT ON UPDATE CASCADE; ALTER TABLE `takes` ADD CONSTRAINT `FK_SecID` FOREIGN KEY (`SecID`) REFERENCES `courseregistration`.`section`(`SecId`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `collegephone` ADD CONSTRAINT `FK_CollegePhone` FOREIGN KEY (`CName`) REFERENCES `courseregistration`.`college`(`CName`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `deptphone` ADD CONSTRAINT `FK_DeptPhone` FOREIGN KEY (`DCode`) REFERENCES `courseregistration`.`department`(`DCode`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `instrphone` ADD CONSTRAINT `FK_InstrPhone` FOREIGN KEY (`ID`) REFERENCES `courseregistration`.`instructor`(`ID`) ON DELETE RESTRICT ON UPDATE CASCADE;
ALTER TABLE `studentphone` ADD CONSTRAINT `FK_StudentPhone` FOREIGN KEY (`SID`) REFERENCES `courseregistration`.`student`(`SID`) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE `college` ADD `DeleteCollege` CHAR(1) NOT NULL DEFAULT 'N' AFTER `DeanId`;
ALTER TABLE `collegephone` ADD `DeleteCollegePhone` CHAR(1) NOT NULL DEFAULT 'N' AFTER `CPhone`;
ALTER TABLE `course` ADD `DeleteCourse` CHAR(1) NOT NULL DEFAULT 'N' AFTER `CoDCode`;
ALTER TABLE `department` ADD `DeleteDepartment` CHAR(1) NOT NULL DEFAULT 'N' AFTER `CName`;
ALTER TABLE `deptphone` ADD `DeleteDeptPhone` CHAR(1) NOT NULL DEFAULT 'N' AFTER `DeptPhone`;
ALTER TABLE `instrphone` ADD `DeleteInstrPhone` CHAR(1) NOT NULL DEFAULT 'N' AFTER `IPhone`;
ALTER TABLE `instructor` ADD `DeleteInstructor` CHAR(1) NULL DEFAULT 'N' AFTER `DCode`;
ALTER TABLE `section` ADD `DeleteSection` CHAR(1) NOT NULL DEFAULT 'N' AFTER `SectionLimit`;
ALTER TABLE `student` ADD `DeleteStudent` CHAR(1) NOT NULL DEFAULT 'N' AFTER `DCode`;
ALTER TABLE `studentphone` ADD `DeleteStudentPhone` CHAR(1) NOT NULL DEFAULT 'N' AFTER `SPhone`;
ALTER TABLE `takes` ADD `DeleteTakes` CHAR(1) NOT NULL DEFAULT 'N' AFTER `Grade`;
ALTER TABLE `course` DROP FOREIGN KEY `FK_CoDeptCode`; 
ALTER TABLE `course` ADD CONSTRAINT `FK_CoDeptCode` FOREIGN KEY (`CoDCode`) REFERENCES `courseregistration`.`department`(`DCode`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `instructor` ADD INDEX( `DCode`);
ALTER TABLE `instructor` ADD CONSTRAINT `FK_IDCode` FOREIGN KEY (`DCode`) REFERENCES `courseregistration`.`department`(`DCode`) ON DELETE RESTRICT ON UPDATE CASCADE;


INSERT INTO `instructor` (`ID`, `Rank`, `IName`, `IOffice`, `DCode`) VALUES
('1001', '0001', 'NURCUN YURUK', '200', 10),
('1002', '0002', 'ANURAG NAGAR', '201', 10),
('1003', '0003', 'NEERAJ', '202', 11),
('1004', '0004', 'CATYLYN', '203', 11),
('1005', '0005', 'JONAH', '204', 12);

INSERT INTO `college` (`CName`, `COffice`, `DeanId`) VALUES
('ATECH', '24', '1003'),
('ECS', '23', '1001'),
('JSOM', '22', '1002');

INSERT INTO `collegephone` (`CName`, `CPhone`) VALUES
('ATECH', '223'),
('ECS', '221'),
('JSOM', '222')

INSERT INTO `department` (`DName`, `DCode`, `DOffice`, `DeptChairID`, `CName`) VALUES
('GOPAL GUPTA', 10, '110', '1001', 'ECS'),
('NAVEEN JINDAL', 11, '111', '1002', 'JSOM'),
('ANNE BALSAMO', 12, '112', '1003', 'ATECH');

INSERT INTO `deptphone` (`DCode`, `DeptPhone`) VALUES
(10, '1111111111'),
(11, '2222222222'),
(12, '3333333333');


INSERT INTO `course` (`CoCode`, `CoName`, `Credits`, `Level`, `CoDescription`, `CoDCode`) VALUES
(1, 'AI', 3, '6000', 'ARTIFICIAL INTELLIGENCE ', 10),
(2, 'DB', 3, '6000', 'DATABASE DESIGN', 10),
(3, 'DM', 3, '6000', 'DATA MINING', 11),
(4, 'BI', 3, '6000', 'BUSINESS INTELLIGENCE', 11),
(5, 'HM', 3, '6000', 'HUMANITIES', 12);

INSERT INTO `instrphone` (`ID`, `IPhone`) VALUES
('1005', '4444444444'),
('1001', '5555555555'),
('1002', '6666666666'),
('1003', '7777777777'),
('1004', '8888888888');

INSERT INTO `section` (`SecId`, `SecNo`, `Sem`, `Year`, `RoomNo`, `Building`, `DaysTime`, `InstructorID`, `CoCode`, `SectionLimit`) VALUES
('2000', '850', 1, 2017, '400', 'ECSS', '1:00-2:15', '1001', 2, 50),
('2001', '851', 1, 2017, '401', 'ECSN', '11:00-12:15', '1002', 1, 100),
('2002', '852', 2, 2018, '402', 'JSOM1', '1:00-2:15', '1003', 3, 22),
('2003', '853', 2, 2017, '403', 'JSOM2', '11:00-12:15', '1004', 4, 100),
('2004', '854', 2, 2018, '404', 'ATECHS', '10:00-11:15', '1005', 5, 60);

INSERT INTO `student` (`SID`, `DOB`, `SFname`, `SMname`, `SLname`, `Address`, `Major`, `DCode`) VALUES
('1', '2017-10-01', 'WAYNE ', 'CHETAN', 'ROONEY', 'NEW ENGLAND', 'COMPUTER SCIENCE', 10),
('2', '2017-10-02', 'ALVARO', 'SANJAY', 'MORATA', '7575 FRANKFORD', 'COMPUTER SCIENCE', 10),
('3', '2017-10-03', 'LIONEL', 'RAKESH', 'MESSI', '7676 FRANKFORD', 'MIS', 11),
('4', '2017-10-04', 'EDEN', 'BHAVESH', 'HAZARD', '1011 COIT ROAD', 'MIS', 11),
('5', '2017-10-05', 'JAMIE', 'KUMAR', 'VARDY', '1011 PRESTON ROAD', 'ARTS', 12);

INSERT INTO `takes` (`SID`, `SecID`, `Grade`) VALUES
('1', '2000', 'A'),
('2', '2001', 'B'),
('3', '2002', 'B-'),
('3', '2003', 'B+'),
('4', '2004', 'C');

CREATE TABLE `courseregistration`.`logindetail` ( `SID` VARCHAR(20) NOT NULL , `username` VARCHAR(30) NOT NULL , `password` VARCHAR(30) NOT NULL , PRIMARY KEY (`username`)) ENGINE = InnoDB;

ALTER TABLE `logindetail` ADD INDEX( `SID`);
ALTER TABLE `logindetail` ADD CONSTRAINT `FK_SID_login` FOREIGN KEY (`SID`) REFERENCES `courseregistration`.`student`(`SID`) ON DELETE RESTRICT ON UPDATE CASCADE;

INSERT INTO `courseregistration`.`student` (`SID`, `DOB`, `SFname`, `SMname`, `SLname`, `Address`, `Major`, `DCode`, `DeleteStudent`) VALUES ('0', '', 'admin', '', 'admin', '', '', NULL, 'N');
INSERT INTO `courseregistration`.`logindetail` (`SID`, `username`, `password`) VALUES ('0', 'admin', 'admin')

