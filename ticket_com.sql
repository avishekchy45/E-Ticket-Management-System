-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 08:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `buscounter`
--

CREATE TABLE `buscounter` (
  `REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `COUNTER_ID` varchar(255) NOT NULL,
  `OWNER` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `CONTACT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buscounter`
--

INSERT INTO `buscounter` (`REG`, `COUNTER_ID`, `OWNER`, `ADDRESS`, `CONTACT`) VALUES
('2021-04-30 16:14:59', 'greenline-benapole_counter_1', 'greenline_101', 'Bazar Counter\r\nOpposite of BGB Camp', '+88-01730060035,\r\n+88-04228-75776'),
('2021-04-30 16:14:20', 'greenline-ctg_counter_1', 'greenline_101', 'A.K. Khan\r\n149/A/208 AK Khan Main Road', '+88-01730060021,\r\n+88-01970060021,\r\n+880-31-751161'),
('2021-04-30 16:14:20', 'greenline-ctg_counter_2', 'greenline_101', 'Dampara – (New)\r\n34 Zakir Hossain Road, Dampara', '+88-01970060085'),
('2021-04-30 16:31:25', 'greenline-dhaka_counter_1', 'greenline_101', 'Banani, Dhaka', '+8801111111111'),
('2021-04-30 16:08:42', 'hanif_ctg_counter_1', 'hanif_101', 'BRTC', ''),
('2021-04-30 16:09:20', 'hanif_dha_counter_1', 'hanif_101', 'Banani,Dhaka', '');

-- --------------------------------------------------------

--
-- Table structure for table `buslist`
--

CREATE TABLE `buslist` (
  `REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `BUS_ID` varchar(255) NOT NULL,
  `OWNER` varchar(255) NOT NULL,
  `COACH_NO` varchar(255) NOT NULL,
  `CLASS` varchar(255) NOT NULL,
  `SEAT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buslist`
--

INSERT INTO `buslist` (`REG`, `BUS_ID`, `OWNER`, `COACH_NO`, `CLASS`, `SEAT`) VALUES
('2021-04-30 16:25:47', 'greenline_101-201', 'greenline_101', '201', 'Business', 'A1,A2,A3,A4,B1,B2,B3,B4,C1,C2,C3,C4,D1,D2,D3,D4,E1,E2,E3,E4,F1,F2,F3,F4,G1,G2,G3,G4,H1,H2,H3,H4'),
('2021-04-30 16:25:47', 'greenline_101-202', 'greenline_101', '202', 'Double Decker', 'A1,A2,A3,B1,B2,B3,C1,C2,C3,D1,D2,D3,E1,E2,E3,F1,F2,F3,G1,G2,G3,H1,H2,H3'),
('2021-04-30 16:27:50', 'hanif_101-201', 'hanif_101', '201', 'Business', 'A1,A2,A3,A4,B1,B2,B3,B4,C1,C2,C3,C4,D1,D2,D3,D4,E1,E2,E3,E4,F1,F2,F3,F4,G1,G2,G3,G4,H1,H2,H3,H4'),
('2021-04-30 16:27:50', 'hanif_101-202', 'hanif_101', '202', 'Economy', 'A1,A2,A3,A4,B1,B2,B3,B4,C1,C2,C3,C4,D1,D2,D3,D4,E1,E2,E3,E4,F1,F2,F3,F4,G1,G2,G3,G4,H1,H2,H3,H4');

-- --------------------------------------------------------

--
-- Table structure for table `busowner`
--

CREATE TABLE `busowner` (
  `REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `OWNER_ID` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `COMPANY` varchar(255) NOT NULL,
  `CONTACT` varchar(255) NOT NULL,
  `REG_COUNTER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busowner`
--

INSERT INTO `busowner` (`REG`, `OWNER_ID`, `NAME`, `COMPANY`, `CONTACT`, `REG_COUNTER`) VALUES
('2021-04-30 16:07:18', 'greenline_101', 'Md. Sakib', 'GREENLINE PARIBAHAN ', '+8801111111111', 10),
('2021-04-30 16:07:18', 'hanif_101', 'Hanif Sonket', 'HANIF PARIBAHAN', '+8801111111111', 5);

-- --------------------------------------------------------

--
-- Table structure for table `busschedule`
--

CREATE TABLE `busschedule` (
  `REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `BUS_ID` varchar(255) NOT NULL,
  `SCHEDULE_ID` varchar(255) NOT NULL,
  `DEPART` varchar(255) NOT NULL,
  `DEST` varchar(255) NOT NULL,
  `DEPART_COUNTER` varchar(255) NOT NULL,
  `DEST_COUNTER` varchar(255) NOT NULL,
  `DEPART_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busschedule`
--

INSERT INTO `busschedule` (`REG`, `BUS_ID`, `SCHEDULE_ID`, `DEPART`, `DEST`, `DEPART_COUNTER`, `DEST_COUNTER`, `DEPART_TIME`, `PRICE`) VALUES
('2021-04-30 17:03:52', 'hanif_101-202', '187a15670d7141ae66ed9033ea6c79fd', 'Dhaka', 'Chattogram', 'hanif_dha_counter_1', 'hanif_ctg_counter_1', '2021-05-12 09:00:00', 480),
('2021-04-30 16:59:31', 'greenline_101-201', '6865075db9a6d0710aedfee9c69c0498', 'Chattogram', 'Dhaka', 'greenline-ctg_counter_1', 'greenline-dhaka_counter_1', '2021-05-11 09:00:00', 480),
('2021-04-30 17:03:52', 'hanif_101-201', '83be5f95aebdc97a73d2893849a36398', 'Dhaka', 'Chattogram', 'hanif_dha_counter_1', 'hanif_ctg_counter_1', '2021-05-11 09:00:00', 480),
('2021-04-30 16:59:31', 'greenline_101-202', '88f22779627771c93c60b5f5285dcdd3', 'Chattogram', 'Dhaka', 'greenline-ctg_counter_1', 'greenline-dhaka_counter_1', '2021-05-10 09:00:00', 800),
('2021-04-30 17:03:52', 'hanif_101-201', '89d076348f84b1d00bf2450cd4107e22', 'Chattogram', 'Dhaka', 'hanif_ctg_counter_1', 'hanif_dha_counter_1', '2021-05-10 09:00:00', 480),
('2021-04-30 16:59:31', 'greenline_101-202', '8a67a48959335ccf30bab88e89884558', 'Chattogram', 'Benapole', 'greenline-ctg_counter_1', 'greenline-benapole_counter_1', '2021-05-10 09:00:00', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `departlist`
--

CREATE TABLE `departlist` (
  `SCHEDULE_ID` varchar(255) NOT NULL,
  `DEPART` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departlist`
--

INSERT INTO `departlist` (`SCHEDULE_ID`, `DEPART`) VALUES
('187a15670d7141ae66ed9033ea6c79fd', 'hanif_dha_counter_1'),
('6865075db9a6d0710aedfee9c69c0498', 'greenline-ctg_counter_1'),
('83be5f95aebdc97a73d2893849a36398', 'hanif_dha_counter_1'),
('88f22779627771c93c60b5f5285dcdd3', 'greenline-ctg_counter_1'),
('88f22779627771c93c60b5f5285dcdd3', 'greenline-ctg_counter_2'),
('89d076348f84b1d00bf2450cd4107e22', 'hanif_ctg_counter_1'),
('8a67a48959335ccf30bab88e89884558', 'greenline-ctg_counter_1'),
('8a67a48959335ccf30bab88e89884558', 'greenline-ctg_counter_2');

-- --------------------------------------------------------

--
-- Table structure for table `guser`
--

CREATE TABLE `guser` (
  `REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `USER_ID` varchar(255) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PHONE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guser`
--

INSERT INTO `guser` (`REG`, `USER_ID`, `NAME`, `EMAIL`, `PHONE`) VALUES
('2021-04-30 16:17:54', 'avishekchy45', 'Avishek Chowdhury', 'avishekchy45@gmail.com', '01816486550');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `REG` timestamp NOT NULL DEFAULT current_timestamp(),
  `TICKET_ID` varchar(255) NOT NULL,
  `SCHEDULE_ID` varchar(255) NOT NULL,
  `SEAT` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `CONTACT` varchar(255) NOT NULL,
  `BOOKED_BY` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ulogin`
--

CREATE TABLE `ulogin` (
  `UTYPE` varchar(10) DEFAULT NULL,
  `ID` varchar(255) NOT NULL,
  `PASS` varchar(255) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulogin`
--

INSERT INTO `ulogin` (`UTYPE`, `ID`, `PASS`) VALUES
('admin', 'avishek', '123456'),
('user', 'avishekchy45', '123456'),
('counter', 'greenline-benapole_counter_1', '123456'),
('counter', 'greenline-ctg_counter_1', '123456'),
('counter', 'greenline-ctg_counter_2', '123456'),
('counter', 'greenline-dhaka_counter_1', '123456'),
('owner', 'greenline_101', '123456'),
('owner', 'hanif_101', '123456'),
('counter', 'hanif_ctg_counter_1', '123456'),
('counter', 'hanif_dha_counter_1', '123456'),
('admin', 'IfthekherM', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buscounter`
--
ALTER TABLE `buscounter`
  ADD PRIMARY KEY (`COUNTER_ID`,`OWNER`) USING BTREE,
  ADD KEY `OWNER` (`OWNER`);

--
-- Indexes for table `buslist`
--
ALTER TABLE `buslist`
  ADD PRIMARY KEY (`BUS_ID`,`OWNER`),
  ADD KEY `OWNER` (`OWNER`);

--
-- Indexes for table `busowner`
--
ALTER TABLE `busowner`
  ADD PRIMARY KEY (`OWNER_ID`);

--
-- Indexes for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD PRIMARY KEY (`SCHEDULE_ID`,`BUS_ID`),
  ADD KEY `BUS_ID` (`BUS_ID`),
  ADD KEY `schedule_ibfk_2` (`DEPART_COUNTER`),
  ADD KEY `schedule_ibfk_3` (`DEST_COUNTER`);

--
-- Indexes for table `departlist`
--
ALTER TABLE `departlist`
  ADD PRIMARY KEY (`SCHEDULE_ID`,`DEPART`),
  ADD KEY `DEPART` (`DEPART`);

--
-- Indexes for table `guser`
--
ALTER TABLE `guser`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TICKET_ID`,`SCHEDULE_ID`) USING BTREE,
  ADD KEY `ticket_ibfk_1` (`SCHEDULE_ID`);

--
-- Indexes for table `ulogin`
--
ALTER TABLE `ulogin`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buscounter`
--
ALTER TABLE `buscounter`
  ADD CONSTRAINT `buscounter_ibfk_1` FOREIGN KEY (`COUNTER_ID`) REFERENCES `ulogin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buscounter_ibfk_2` FOREIGN KEY (`OWNER`) REFERENCES `busowner` (`OWNER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buslist`
--
ALTER TABLE `buslist`
  ADD CONSTRAINT `buslist_ibfk_1` FOREIGN KEY (`OWNER`) REFERENCES `busowner` (`OWNER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `busowner`
--
ALTER TABLE `busowner`
  ADD CONSTRAINT `busowner_ibfk_1` FOREIGN KEY (`OWNER_ID`) REFERENCES `ulogin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD CONSTRAINT `busschedule_ibfk_1` FOREIGN KEY (`BUS_ID`) REFERENCES `buslist` (`BUS_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `busschedule_ibfk_2` FOREIGN KEY (`DEPART_COUNTER`) REFERENCES `buscounter` (`COUNTER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `busschedule_ibfk_3` FOREIGN KEY (`DEST_COUNTER`) REFERENCES `buscounter` (`COUNTER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departlist`
--
ALTER TABLE `departlist`
  ADD CONSTRAINT `departlist_ibfk_1` FOREIGN KEY (`SCHEDULE_ID`) REFERENCES `busschedule` (`SCHEDULE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departlist_ibfk_2` FOREIGN KEY (`DEPART`) REFERENCES `buscounter` (`COUNTER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guser`
--
ALTER TABLE `guser`
  ADD CONSTRAINT `guser_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `ulogin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`SCHEDULE_ID`) REFERENCES `busschedule` (`SCHEDULE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
