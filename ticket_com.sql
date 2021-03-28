-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 08:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `OWNER` varchar(255) NOT NULL,
  `BUS_ID` varchar(255) NOT NULL,
  `DEPARTURE` varchar(255) NOT NULL,
  `DESTINATION` varchar(255) NOT NULL,
  `COACH_NO` varchar(255) NOT NULL,
  `CLASS` varchar(255) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `SEAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`REGISTRATION`, `OWNER`, `BUS_ID`, `DEPARTURE`, `DESTINATION`, `COACH_NO`, `CLASS`, `PRICE`, `SEAT`) VALUES
('2021-03-21 16:14:54', 'greenline_101', 'Ctg-Dha-345', 'Chattogram', 'Dhaka', '345', 'DOUBLE DECKER', 1200, 0),
('2021-03-21 16:14:54', 'greenline_101', 'Ctg-Syl-105', 'Chattogram', 'Sylhet', '105', 'ECONOMY', 1000, 0),
('2021-03-21 16:14:54', 's.alam_101', 'Dha-Ctg-103', 'Dhaka', 'Chattogram', '103', 'Business', 480, 0),
('2021-03-21 16:14:54', 'greenline_101', 'Dha-Ctg-345', 'Dhaka', 'Chattogram', '345', 'DOUBLE DECKER', 1200, 0),
('2021-03-26 21:02:12', 'hanif_101', 'Dhaka-Chattogram-201', 'Dhaka', 'Chattogram', '201', 'Business', 480, 32);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `USERNAME` varchar(255) NOT NULL,
  `OWNER` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `PHONE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`REGISTRATION`, `USERNAME`, `OWNER`, `ADDRESS`, `PHONE`) VALUES
('2021-03-21 16:07:06', 'greenline-ctg_counter_1', 'greenline_101', 'A.K. Khan\r\n149/A/208 AK Khan Main Road', '+88-01730060021,\r\n+88-01970060021,\r\n+880-31-751161'),
('2021-03-21 16:11:57', 'greenline-ctg_counter_2', 'greenline_101', 'Dampara – (New)\r\n34 Zakir Hossain Road,\r\nDampara', '+88-01970060085'),
('2021-03-26 21:34:33', 'greenline-dhaka_counter_1', 'greenline_101', 'Rajarbagh 9/2 Outer Circular Road, Momenbagh, Rajarbagh.', '+880-2-8315380, +880-2-9339623, +880-2-8331302'),
('2021-03-21 16:11:57', 'grenline-benapole_counter_1', 'greenline_101', 'Bazar Counter\r\nOpposite of BGB Camp', '+88-01730060035,\r\n+88-04228-75776'),
('2021-03-26 20:09:53', 'hanif_ctg_counter_1', 'hanif_101', 'BRTC', ''),
('2021-03-26 20:11:44', 'hanif_ctg_counter_2', 'hanif_101', 'Cinema Place', ''),
('2021-03-21 16:13:51', 's.alam-ctg_counter_1', 's.alam_101', 'Alonkar More', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `TYPE` varchar(255) NOT NULL,
  `ID` varchar(255) NOT NULL,
  `PASS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`TYPE`, `ID`, `PASS`) VALUES
('admin', 'avishekchy45', '123456'),
('counter', 'greenline-benapole_counter_1', '123456'),
('counter', 'greenline-ctg_counter_1', '123456'),
('counter', 'greenline-ctg_counter_2', '123456'),
('counter', 'greenline-dhaka_counter_1', '123456'),
('owner', 'greenline_101', '123456'),
('owner', 'hanif_101', '1234567'),
('counter', 'hanif_ctg_counter_1', '123456'),
('counter', 'hanif_ctg_counter_2', '123456'),
('counter', 's.alam-ctg_counter_1', '123456'),
('owner', 's.alam_101', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `USERNAME` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `COMPANY_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`REGISTRATION`, `USERNAME`, `NAME`, `COMPANY_NAME`) VALUES
('2021-03-21 09:27:01', 'greenline_101', 'Md. Sakib', 'GREEN LINE PARIBAHAN'),
('2021-03-26 20:06:58', 'hanif_101', 'Hanif Sonket', 'Hanif Paribahan'),
('2021-03-21 09:27:31', 's.alam_101', 'Shaharia Alam', 'S.Alam Bus Service');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `OWNER` varchar(255) NOT NULL,
  `BUS_ID` varchar(255) NOT NULL,
  `DEPART_COUNTER` varchar(255) NOT NULL,
  `DEST_COUNTER` varchar(255) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `SCHEDULE_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`OWNER`, `BUS_ID`, `DEPART_COUNTER`, `DEST_COUNTER`, `TIME`, `SCHEDULE_ID`) VALUES
('greenline_101', 'Ctg-Dha-345', 'greenline-ctg_counter_1', 'greenline-dhaka_counter_1', '2021-03-27 08:39:25', 'Ctg-Dha-345_2021-04-01 12:30:00'),
('greenline_101', 'Ctg-Dha-345', 'greenline-ctg_counter_1', 'grenline-dhaka_counter_1', '2021-04-03 07:30:00', 'Ctg-Dha-345_2021-04-03T13:30'),
('', 'Ctg-Syl-105', '', '', '2021-04-01 06:30:00', 'Ctg-Syl-105_2021-04-01 12:30:00'),
('', 'Dha-Ctg-103', '', '', '2021-03-31 16:30:00', 'Dha-Ctg-103_2021-03-31 22:30:00'),
('greenline_101', 'Dha-Ctg-345', 'grenline-dhaka_counter_1', 'greenline-ctg_counter_1', '2021-03-27 08:38:43', 'Dha-Ctg-345_2021-03-30 22:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `BOOK_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `TICKET_ID` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `SCHEDULE_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`BOOK_TIME`, `TICKET_ID`, `USERNAME`, `SCHEDULE_ID`) VALUES
('2021-03-26 18:00:00', 'c432febe58543967f5367a6cf2f63897', 'Avishek Chowdhury', '2021-04-03 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `REGISTRATION` timestamp NOT NULL DEFAULT current_timestamp(),
  `USERNMAE` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`REGISTRATION`, `USERNMAE`, `NAME`, `EMAIL`, `PHONE`) VALUES
('2021-03-21 15:59:17', 'avishekchy', 'Avishek Chowdhury', 'avishekchy45@gmail.com', '01816486550');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`BUS_ID`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`USERNAME`,`OWNER`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`SCHEDULE_ID`,`BUS_ID`) USING BTREE;

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`USERNAME`,`TICKET_ID`,`SCHEDULE_ID`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNMAE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
