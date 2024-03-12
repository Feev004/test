-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 11:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `brandID` varchar(4) NOT NULL,
  `brandName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`) VALUES
('B01', 'Toyota'),
('B02', 'Suzuki'),
('B03', 'Honda'),
('B04', 'Ford'),
('B05', 'Mitsubishi'),
('B06', 'MG'),
('B07', 'BYD'),
('B08', 'Mazda'),
('B09', 'Nissan'),
('B10', 'Neta');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` varchar(4) NOT NULL,
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
  `picture` varchar(30) NOT NULL,
  `vehicleID` varchar(20) NOT NULL,
  `statusID` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `carName`, `brandID`, `typeCarID`, `produceYear`, `color`, `distance`, `price`, `tankID`, `engineID`, `moreInfo`, `picture`, `vehicleID`, `statusID`) VALUES
('001', 'Honda Civic Hatchback', 'B03', 'T02', 2567, 'black', 25, 849000, 'TR01234112345678912', '78912', 'ช่วงล่าง ด้านหน้า MacPherson\r\nด้านหลัง Torsion\r\nระบบเบรค คู่หน้า ดิสก์เบรค\r\nคู่หลัง ดรัมเบรค', '1.jpg', 'กข1223', 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(2) NOT NULL,
  `paymentName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `paymentName`) VALUES
(1, 'เงินสด'),
(2, 'ผ่อนชำระ');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesID` int(4) NOT NULL,
  `usersID` varchar(9) NOT NULL,
  `carID` varchar(4) NOT NULL,
  `paymentID` int(4) NOT NULL,
  `salesDay` date NOT NULL,
  `payDay` date NOT NULL,
  `month` int(2) NOT NULL,
  `periodPrice` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`salesID`, `usersID`, `carID`, `paymentID`, `salesDay`, `payDay`, `month`, `periodPrice`) VALUES
(1, 'mem0001', '001', 2, '2024-03-09', '2024-03-19', 48, 16832);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` varchar(4) NOT NULL,
  `statusName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `statusName`) VALUES
('S1', 'ขายแล้ว'),
('S2', 'รอขาย');

-- --------------------------------------------------------

--
-- Table structure for table `typecar`
--

CREATE TABLE `typecar` (
  `typeCarID` varchar(4) NOT NULL,
  `typeCarName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `typecar`
--

INSERT INTO `typecar` (`typeCarID`, `typeCarName`) VALUES
('T01', 'Seden'),
('T02', 'Hatchback'),
('T03', 'Station Wagon'),
('T04', 'Coupe'),
('T05', 'Crossover'),
('T06', 'SUV'),
('T07', 'PPV'),
('T08', 'Mint MPV'),
('T09', 'Cabrio'),
('T10', 'Sport Car'),
('T11', 'Pickup'),
('T12', 'Van');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersID` varchar(9) NOT NULL,
  `usersName` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `credit` varchar(13) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersID`, `usersName`, `email`, `tel`, `credit`, `adress`, `password`) VALUES
('mem0001', 'จิรภิญญา', 'jjj3336800@gmail.com', '0877171868', '1234567891234', '132/30 หมู่ 1 หมู่บ้านนาวีเฮาส์ 32 ต.พลูตาหลวง อ.สัตหีบ จ.ชลบุรี 20180', '9800');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
