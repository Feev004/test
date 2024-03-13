-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2024 at 02:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandName` varchar(30) NOT NULL,
  `brandID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandName`, `brandID`) VALUES
('Toyota', 1),
('Suzuki', 2),
('Honda', 3),
('Ford', 4),
('Mitsubishi', 5),
('MG', 6),
('BYD', 7),
('Mazda', 8),
('Nissan', 9),
('Tesla', 12);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carName` varchar(50) NOT NULL,
  `brandID` varchar(4) NOT NULL,
  `typeCarID` varchar(4) NOT NULL,
  `produceYear` int(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `distance` int(30) NOT NULL,
  `price` int(10) NOT NULL,
  `tankID` varchar(20) NOT NULL,
  `engineID` varchar(20) NOT NULL,
  `moreInfo` varchar(100) NOT NULL,
  `picture` text NOT NULL,
  `vehicleID` varchar(20) NOT NULL,
  `statusID` varchar(4) NOT NULL,
  `carID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carName`, `brandID`, `typeCarID`, `produceYear`, `color`, `distance`, `price`, `tankID`, `engineID`, `moreInfo`, `picture`, `vehicleID`, `statusID`, `carID`) VALUES
('Toyota Yaris Ativ 1.2', '1', '1', 1999, 'ดำ', 200, 900002, '1234', 'turbo', 'เบาะ, แผงประตู, ฝาครอบ, คอนโซล, ช่องเก็บของ, ผ้าบุหลังคา และพรมปูพื้น,\r\nระบบกันขโมยและวิทยุ', 'Corolla-Cross-GR-Sport-Attitude-Black-Mica.jpg', 'กจ111', '2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentName` varchar(30) NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentName`, `paymentID`) VALUES
('เงินสด', 1),
('ผ่อนชำระ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `usersID` varchar(9) NOT NULL,
  `carID` varchar(4) NOT NULL,
  `paymentID` int(4) NOT NULL,
  `salesDay` date NOT NULL,
  `payDay` date NOT NULL,
  `month` int(2) NOT NULL,
  `periodPrice` int(6) NOT NULL,
  `salesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`usersID`, `carID`, `paymentID`, `salesDay`, `payDay`, `month`, `periodPrice`, `salesID`) VALUES
('2', '1', 2, '2024-03-09', '2024-03-19', 48, 16832, 1),
('2', '1', 1, '2024-03-13', '2024-03-13', 1, 849000, 2),
('2', '1', 1, '2024-03-13', '2024-03-13', 1, 849000, 3),
('2', '1', 1, '2024-03-13', '2024-03-13', 1, 849000, 4),
('2', '1', 1, '2024-03-13', '2024-03-13', 1, 849000, 5),
('2', '1', 2, '2024-03-13', '2024-03-13', 12, 56315, 6);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusName` varchar(30) NOT NULL,
  `statusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusName`, `statusID`) VALUES
('ขายแล้ว', 1),
('รอขาย', 2);

-- --------------------------------------------------------

--
-- Table structure for table `typecar`
--

CREATE TABLE `typecar` (
  `typeCarName` varchar(50) NOT NULL,
  `typeCarID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typecar`
--

INSERT INTO `typecar` (`typeCarName`, `typeCarID`) VALUES
('minibus', 1),
('minibus', 2),
('minibus', 3),
('minibus', 4),
('minibus', 5),
('minibus', 6),
('minibus', 7),
('minibus', 8),
('minibus', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersName` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `credit` varchar(13) NOT NULL,
  `adress` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `usersID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersName`, `email`, `tel`, `credit`, `adress`, `password`, `status`, `usersID`) VALUES
('จิรภิญญา', 'admin@gmail.com', '0877171868', '1234567891234', '132/30 หมู่ 1 หมู่บ้านนาวีเฮาส์ 32 ต.พลูตาหลวง อ.สัตหีบ จ.ชลบุรี 20180', '1', 1, 1),
('    tanongsakintean    ', ' tanongsakintean.5333@gmail.com ', '  22222222', '1111', '62/1 ตำบล หนองปลาไหล อำเภอ หนองปรือ จังหวัดกาญจนบุรี\r\n47/45 ตำบลรั้วใหญ่ อำเภอ เมือง จังหวัดสุพรรณบุรี', '1', 1, 2),
('tanongsakintean', 'tanongsakint1ean.5333@gmail.com', '1111111111', '1111', 'ที่60/1เดกาอใเมืองจ.สุพรรณบุรี', '1', 2, 3),
('tanongsakintean', 'bee7r.555@gmail.com', '1111111111', '1111', '62/1 ตำบล หนองปลาไหล อำเภอ หนองปรือ จังหวัดกาญจนบุรี\r\n47/45 ตำบลรั้วใหญ่ อำเภอ เมือง จังหวัดสุพรรณบุรี', '1', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`salesID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `typecar`
--
ALTER TABLE `typecar`
  ADD PRIMARY KEY (`typeCarID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `salesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typecar`
--
ALTER TABLE `typecar`
  MODIFY `typeCarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
