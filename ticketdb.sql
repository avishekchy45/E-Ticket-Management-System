-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 09:17 PM
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
-- Database: `ticketdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookedseat`
--

CREATE TABLE `bookedseat` (
  `TICKET_ID` varchar(255) NOT NULL,
  `SEAT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookedseat`
--

INSERT INTO `bookedseat` (`TICKET_ID`, `SEAT`) VALUES
('1487859617', 'A3'),
('1487859617', 'A4'),
('789038234', 'D3'),
('789038234', 'D4'),
('91849007', 'C3'),
('91849007', 'C4'),
('91849007', 'D3'),
('91849007', 'D4'),
('980208505', 'C2'),
('980208505', 'C3');

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
('2021-05-21 14:19:50', 'challenger_ctg_counter_1', 'challenger_101', 'BRTC,Ctg', '+1111111111111'),
('2021-05-21 14:22:27', 'challenger_ctg_counter_2', 'challenger_101', 'Dampara,Ctg', '+1111111111111'),
('2021-05-26 17:33:43', 'challenger_ctg_counter_3', 'challenger_101', 'Cinema Palace, Ctg', '+1111111111111'),
('2021-05-21 14:23:25', 'challenger_dha_counter_1', 'challenger_101', 'Sayedabad,Dhaka', '+1111111111111'),
('2021-05-21 14:23:59', 'challenger_dha_counter_2', 'challenger_101', 'Badda,Dhaka', '+1111111111111'),
('2021-05-26 18:59:42', 'max_ctg_1', 'max_101', 'BRTC,CTG', '+1111111111111'),
('2021-05-26 19:01:27', 'max_ctg_2', 'max_101', 'AK Khan Main Road', '+1111111111111'),
('2021-05-26 19:09:38', 'max_dha_1', 'max_101', 'Gabtai,Dhaka', '+1111111111111'),
('2021-05-26 19:03:56', 'max_syl_1', 'max_101', 'Mazargate,Sylhet', '+1111111111111');

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
  `SEAT_TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buslist`
--

INSERT INTO `buslist` (`REG`, `BUS_ID`, `OWNER`, `COACH_NO`, `CLASS`, `SEAT_TYPE`) VALUES
('2021-05-21 14:24:57', 'challenger_101-201', 'challenger_101', '201', 'Economy', '4seater'),
('2021-05-21 14:25:08', 'challenger_101-202', 'challenger_101', '202', 'Business', '3seater'),
('2021-05-26 19:05:14', 'max_101-503', 'max_101', '503', 'Double Decker', '3seater'),
('2021-05-26 19:05:28', 'max_101-504', 'max_101', '504', 'Economy', '4seater');

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
  `MAX_COUNTER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busowner`
--

INSERT INTO `busowner` (`REG`, `OWNER_ID`, `NAME`, `COMPANY`, `CONTACT`, `MAX_COUNTER`) VALUES
('2021-05-21 14:18:16', 'challenger_101', 'Md. Sakib', 'Challenger Paribahan', '+8801816486550', 5),
('2021-05-26 18:56:30', 'max_101', 'Bill Gates', 'MAX PARIBAHAN', '+1111111111111', 5);

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
  `DEST_COUNTER` varchar(255) NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busschedule`
--

INSERT INTO `busschedule` (`REG`, `BUS_ID`, `SCHEDULE_ID`, `DEPART`, `DEST`, `DEST_COUNTER`, `PRICE`) VALUES
('2021-05-26 19:10:47', 'max_101-504', '0877c3e7c801c41c286280fdaf985f11', 'Chattogram', 'Dhaka', 'max_dha_1', 480),
('2021-05-26 19:07:47', 'max_101-503', '1a401b3503d572e29ce271e480feb95f', 'Sylhet', 'Chattogram', 'max_ctg_1', 700),
('2021-05-26 19:06:53', 'max_101-503', '470aec70a6584075f6c8980e39a4c4d0', 'Chattogram', 'Sylhet', 'max_syl_1', 700),
('2021-05-26 17:30:12', 'challenger_101-202', '55e554d8a076fff5f31c9ed18d681107', 'Chattogram', 'Dhaka', 'challenger_dha_counter_2', 800),
('2021-05-26 17:24:06', 'challenger_101-201', 'd281b1823a162eb633c1d15e7465b527', 'Chattogram', 'Dhaka', 'challenger_dha_counter_1', 480),
('2021-05-26 17:28:04', 'challenger_101-201', 'de1ddbea7770a3db0f6a6c239bb3149e', 'Dhaka', 'Chattogram', 'challenger_ctg_counter_1', 480);

-- --------------------------------------------------------

--
-- Table structure for table `busseatlist`
--

CREATE TABLE `busseatlist` (
  `SEAT_TYPE` varchar(255) NOT NULL,
  `SEAT` varchar(255) NOT NULL,
  `SEAT_ROW` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busseatlist`
--

INSERT INTO `busseatlist` (`SEAT_TYPE`, `SEAT`, `SEAT_ROW`) VALUES
('3seater', 'A1,A2,A3,B1,B2,B3,C1,C2,C3,D1,D2,D3,E1,E2,E3,F1,F2,F3,G1,G2,G3,H1,H2,H3', 3),
('4seater', 'A1,A2,A3,A4,B1,B2,B3,B4,C1,C2,C3,C4,D1,D2,D3,D4,E1,E2,E3,E4,F1,F2,F3,F4,G1,G2,G3,G4,H1,H2,H3,H4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departlist`
--

CREATE TABLE `departlist` (
  `SCHEDULE_ID` varchar(255) NOT NULL,
  `DEPART_COUNTER` varchar(255) NOT NULL,
  `DEPART_TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departlist`
--

INSERT INTO `departlist` (`SCHEDULE_ID`, `DEPART_COUNTER`, `DEPART_TIME`) VALUES
('0877c3e7c801c41c286280fdaf985f11', 'max_ctg_1', '2025-06-05 05:10:00'),
('0877c3e7c801c41c286280fdaf985f11', 'max_ctg_2', '2025-05-27 05:30:00'),
('1a401b3503d572e29ce271e480feb95f', 'max_syl_1', '2025-06-05 05:00:00'),
('470aec70a6584075f6c8980e39a4c4d0', 'max_ctg_1', '2025-06-04 02:00:00'),
('470aec70a6584075f6c8980e39a4c4d0', 'max_ctg_2', '2025-06-04 02:30:00'),
('55e554d8a076fff5f31c9ed18d681107', 'challenger_ctg_counter_1', '2025-06-04 17:30:00'),
('55e554d8a076fff5f31c9ed18d681107', 'challenger_ctg_counter_2', '2025-06-04 17:50:00'),
('d281b1823a162eb633c1d15e7465b527', 'challenger_ctg_counter_1', '2025-06-04 09:45:00'),
('d281b1823a162eb633c1d15e7465b527', 'challenger_ctg_counter_2', '2025-06-04 10:00:00'),
('de1ddbea7770a3db0f6a6c239bb3149e', 'challenger_dha_counter_1', '2025-06-05 04:45:00'),
('de1ddbea7770a3db0f6a6c239bb3149e', 'challenger_dha_counter_2', '2025-06-05 05:00:00');

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
('2021-05-21 14:35:18', 'avishekchy1578', 'Avishek Chowdhury', 'avishekchy1578@gmail.com', '+8801816486550'),
('2021-05-18 16:44:27', 'avishekchy54', 'Avishek Chowdhury', 'avishekchy54@gmail.com', '+8801816486550');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `TICKET_ID` varchar(255) NOT NULL,
  `AMOUNT` float(10,2) NOT NULL,
  `AMOUNT_CURR` varchar(10) NOT NULL,
  `TXN_ID` varchar(255) NOT NULL,
  `CHECKOUT_SESSION_ID` varchar(255) NOT NULL,
  `PAYMENT_STATUS` varchar(10) NOT NULL,
  `CREATED` datetime NOT NULL,
  `MODIFIED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`TICKET_ID`, `AMOUNT`, `AMOUNT_CURR`, `TXN_ID`, `CHECKOUT_SESSION_ID`, `PAYMENT_STATUS`, `CREATED`, `MODIFIED`) VALUES
('789038234', 12.00, 'usd', 'pi_1IvSCAA5CMRaeCa6xA3O6mKa', 'cs_test_a1jtQhq7mdGdIFYuWeAKyW7l7YK9S6P8OXAX6qBiAdIzPRDAQdfLNY6ol8', 'succeeded', '2021-05-27 01:15:26', '2021-05-27 01:15:26'),
('980208505', 20.00, 'usd', 'pi_1IvREfA5CMRaeCa6Wfetgq8M', 'cs_test_a1hY0r8z6VjszS2TeF38QLPdVKjIFiusATFNJtwRirVhUceuGlkm8eGKo8', 'succeeded', '2021-05-27 00:14:01', '2021-05-27 00:14:01');

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
  `BOOKED_BY` varchar(255) NOT NULL,
  `PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`REG`, `TICKET_ID`, `SCHEDULE_ID`, `SEAT`, `NAME`, `CONTACT`, `BOOKED_BY`, `PRICE`) VALUES
('2021-05-26 19:14:32', '1487859617', '0877c3e7c801c41c286280fdaf985f11', 'A3, A4', 'Avishek Chowdhury', '+8801816486550', 'max_ctg_1', 960),
('2021-05-26 19:15:26', '789038234', '0877c3e7c801c41c286280fdaf985f11', 'D3, D4', 'Avishek Chowdhury', '+8801816486550', 'max_ctg_1', 960),
('2021-05-26 18:19:48', '91849007', 'd281b1823a162eb633c1d15e7465b527', 'C3, C4, D3, D4', 'Avishek Chowdhury', '+8801816486550', 'challenger_ctg_counter_1', 1920),
('2021-05-26 18:14:00', '980208505', '55e554d8a076fff5f31c9ed18d681107', 'C2, C3', 'Avishek Chowdhury', '+8801816486550', 'avishekchy54', 1600);

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
('user', 'avishekchy1578', 'e10adc3949ba59abbe56e057f20f883e'),
('admin', 'avishekchy45', 'e10adc3949ba59abbe56e057f20f883e'),
('user', 'avishekchy54', 'e10adc3949ba59abbe56e057f20f883e'),
('owner', 'challenger_101', 'e10adc3949ba59abbe56e057f20f883e'),
('counter', 'challenger_ctg_counter_1', 'e10adc3949ba59abbe56e057f20f883e'),
('counter', 'challenger_ctg_counter_2', 'e10adc3949ba59abbe56e057f20f883e'),
('counter', 'challenger_ctg_counter_3', 'e10adc3949ba59abbe56e057f20f883e'),
('counter', 'challenger_dha_counter_1', 'e10adc3949ba59abbe56e057f20f883e'),
('counter', 'challenger_dha_counter_2', 'e10adc3949ba59abbe56e057f20f883e'),
('admin', 'IfthekherM', 'e10adc3949ba59abbe56e057f20f883e'),
('owner', 'max_101', 'e10adc3949ba59abbe56e057f20f883e'),
('counter', 'max_ctg_1', 'e267cfcd18461ce938067eca67c59f41'),
('counter', 'max_ctg_2', 'e267cfcd18461ce938067eca67c59f41'),
('counter', 'max_dha_1', 'e267cfcd18461ce938067eca67c59f41'),
('counter', 'max_syl_1', 'e267cfcd18461ce938067eca67c59f41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookedseat`
--
ALTER TABLE `bookedseat`
  ADD PRIMARY KEY (`TICKET_ID`,`SEAT`);

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
  ADD KEY `OWNER` (`OWNER`),
  ADD KEY `buslist_ibfk_2` (`SEAT_TYPE`);

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
  ADD KEY `schedule_ibfk_3` (`DEST_COUNTER`);

--
-- Indexes for table `busseatlist`
--
ALTER TABLE `busseatlist`
  ADD PRIMARY KEY (`SEAT_TYPE`,`SEAT`) USING BTREE;

--
-- Indexes for table `departlist`
--
ALTER TABLE `departlist`
  ADD PRIMARY KEY (`SCHEDULE_ID`,`DEPART_COUNTER`),
  ADD KEY `DEPART_COUNTER` (`DEPART_COUNTER`);

--
-- Indexes for table `guser`
--
ALTER TABLE `guser`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`TICKET_ID`,`PAYMENT_STATUS`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TICKET_ID`) USING BTREE,
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
-- Constraints for table `bookedseat`
--
ALTER TABLE `bookedseat`
  ADD CONSTRAINT `bookedseat_ibfk_1` FOREIGN KEY (`TICKET_ID`) REFERENCES `ticket` (`TICKET_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `buslist_ibfk_1` FOREIGN KEY (`OWNER`) REFERENCES `busowner` (`OWNER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buslist_ibfk_2` FOREIGN KEY (`SEAT_TYPE`) REFERENCES `busseatlist` (`SEAT_TYPE`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `busschedule_ibfk_3` FOREIGN KEY (`DEST_COUNTER`) REFERENCES `buscounter` (`COUNTER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departlist`
--
ALTER TABLE `departlist`
  ADD CONSTRAINT `departlist_ibfk_1` FOREIGN KEY (`SCHEDULE_ID`) REFERENCES `busschedule` (`SCHEDULE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departlist_ibfk_2` FOREIGN KEY (`DEPART_COUNTER`) REFERENCES `buscounter` (`COUNTER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guser`
--
ALTER TABLE `guser`
  ADD CONSTRAINT `guser_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `ulogin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`TICKET_ID`) REFERENCES `ticket` (`TICKET_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`SCHEDULE_ID`) REFERENCES `busschedule` (`SCHEDULE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
