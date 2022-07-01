-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 12:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username Admin` int(50) NOT NULL,
  `Profile` int(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `profilePro Admin_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `r_name` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `r_name`, `username`, `password`) VALUES
(1, '', '', '$2y$10$zE9xxjS4/tLlAUPQyOctn.41IrBgDB9QHtS0M8SvNOPuSoOzu4B1q'),
(2, 'Admin', 'Satun01', '$2y$10$lkvmHrusLDPalCYHPATQ3uHmBjCOpi61nWQfbC3YjBlO1eXQJCGFy'),
(3, 'Member', 'tes20545', '$2y$10$Ce4AART2Fci7E9yi2PMtU.2dB7yrlIHzu9fkcpKs5L6EE4dLn6t6m'),
(4, 'Member', 'suwijak srikhao', '1234'),
(5, 'Member', 'suwijak srikhao', '$2y$10$HSaJGq./S5S0d3OenldijeyrFLZa8heZWd2hQuaxcaPjywcQqHRxS'),
(6, 'Member', 'suwijak srikhao', '$2y$10$aTktde19HzXqIf03TzqybOK.vf3jSRZJVzC0nvZ5mTA5V8mCxDsla');

-- --------------------------------------------------------

--
-- Table structure for table `no`
--

CREATE TABLE `no` (
  `NO_ID` int(10) NOT NULL,
  `Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `perfix`
--

CREATE TABLE `perfix` (
  `Per_ID` int(10) NOT NULL,
  `Per_Tname` varchar(10) NOT NULL,
  `Per_Ename` varchar(10) NOT NULL,
  `Per_Sname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` int(10) NOT NULL,
  `pos_Tname` varchar(100) NOT NULL,
  `pos_Ename` varchar(100) NOT NULL,
  `pos_note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(10) NOT NULL,
  `price_name` varchar(100) NOT NULL,
  `price_unit` int(10) NOT NULL,
  `price_unitunit_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price_unit`
--

CREATE TABLE `price_unit` (
  `unit_id` int(10) NOT NULL,
  `unit_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Pro Admin_ID` int(10) NOT NULL,
  `Pro Admin_Name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_ID` int(10) NOT NULL,
  `rent_wantdate` date NOT NULL,
  `rent_returnroom` date NOT NULL,
  `rent_req` int(10) NOT NULL,
  `rent_staff` int(10) NOT NULL,
  `rent_user` varchar(100) NOT NULL,
  `rent_confirm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_ID`, `rent_wantdate`, `rent_returnroom`, `rent_req`, `rent_staff`, `rent_user`, `rent_confirm`) VALUES
(9, '2021-06-01', '2021-07-15', 19, 0, '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_ID` int(10) NOT NULL,
  `req_usernote` varchar(100) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `req_wantdate` date NOT NULL,
  `staffID` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `req_status` int(10) NOT NULL,
  `req_NO` int(10) NOT NULL,
  `req_room` int(10) NOT NULL,
  `req_staffnote` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_note` varchar(100) NOT NULL,
  `room_status` int(1) NOT NULL,
  `room_cetegory` int(10) NOT NULL,
  `room_price` int(10) NOT NULL,
  `room_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_note`, `room_status`, `room_cetegory`, `room_price`, `room_images`) VALUES
(19, 'standard2', 'd', 0, 1, 55, ''),
(20, 'Standard 2', 'Testqqqq', 0, 1, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `roomcetegory`
--

CREATE TABLE `roomcetegory` (
  `roomcetegory_id` int(10) NOT NULL,
  `cetegory_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roomcetegory`
--

INSERT INTO `roomcetegory` (`roomcetegory_id`, `cetegory_name`) VALUES
(1, 'Standard'),
(2, 'Superior'),
(3, 'Deluxe'),
(4, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `roomstatus_id` int(1) NOT NULL,
  `roomstatus_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`roomstatus_id`, `roomstatus_name`) VALUES
(0, 'ว่าง'),
(1, 'ไม่ว่าง');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ST_TFullname` varchar(10) NOT NULL,
  `ST_TLastname` varchar(10) NOT NULL,
  `ST_EFullname` varchar(10) NOT NULL,
  `ST_ELastname` varchar(10) NOT NULL,
  `ST_Tel` varchar(10) NOT NULL,
  `ST_Email` varchar(100) NOT NULL,
  `ST_Address` varchar(100) NOT NULL,
  `ST_Username` varchar(50) NOT NULL,
  `ST_perfix` int(10) NOT NULL,
  `ST_position` int(10) NOT NULL,
  `ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status_req`
--

CREATE TABLE `status_req` (
  `status_reqID` int(10) NOT NULL,
  `statusreq_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(10) NOT NULL,
  `user_Tfullname` varchar(10) NOT NULL,
  `user_Tlastname` varchar(10) NOT NULL,
  `user_tel` varchar(10) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_perfix` int(10) NOT NULL,
  `PerfixPer_ID` int(10) NOT NULL,
  `useruser_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_Tfullname`, `user_Tlastname`, `user_tel`, `user_address`, `user_email`, `user_perfix`, `PerfixPer_ID`, `useruser_ID`) VALUES
(10, 'suwijak sr', 'srikhao', '5555', 'Thailand', 'tes.20545@gmail.com', 0, 0, 3),
(11, 'suwijak', 'ศรีขาว', '5555', 'Thailand', 'tes.20545@gmail.com', 0, 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username Admin`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`r_name`);

--
-- Indexes for table `no`
--
ALTER TABLE `no`
  ADD PRIMARY KEY (`NO_ID`);

--
-- Indexes for table `perfix`
--
ALTER TABLE `perfix`
  ADD PRIMARY KEY (`Per_ID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `price_unit`
--
ALTER TABLE `price_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Pro Admin_ID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_ID`),
  ADD KEY `rent_user` (`rent_user`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_cetegory` (`room_cetegory`),
  ADD KEY `room_status` (`room_status`);

--
-- Indexes for table `roomcetegory`
--
ALTER TABLE `roomcetegory`
  ADD PRIMARY KEY (`roomcetegory_id`);

--
-- Indexes for table `roomstatus`
--
ALTER TABLE `roomstatus`
  ADD PRIMARY KEY (`roomstatus_id`),
  ADD KEY `roomstatus_id` (`roomstatus_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `status_req`
--
ALTER TABLE `status_req`
  ADD PRIMARY KEY (`status_reqID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `rent` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_cetegory` FOREIGN KEY (`room_cetegory`) REFERENCES `roomcetegory` (`roomcetegory_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `room_status` FOREIGN KEY (`room_status`) REFERENCES `roomstatus` (`roomstatus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
