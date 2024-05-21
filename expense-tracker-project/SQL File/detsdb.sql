SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `tblexpense` (
  `ID` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` timestamp NOT NULL CURRENT_TIMESTAMP,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NOt NULL CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `tbluser` (
  `ID` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
