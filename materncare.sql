-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2026 at 04:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `materncare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` varchar(10) NOT NULL,
  `Name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_ID`, `Name`) VALUES
('A001', 'SITI BALQIS'),
('A002', 'JULIA'),
('A003', 'KASIM');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_REF` int(10) NOT NULL,
  `Name` varchar(60) DEFAULT NULL,
  `Time` time NOT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `IC_Number` varchar(12) DEFAULT NULL,
  `Doctor_ID` varchar(10) DEFAULT NULL,
  `Admin_ID` varchar(10) DEFAULT NULL,
  `age` int(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_REF`, `Name`, `Time`, `Status`, `IC_Number`, `Doctor_ID`, `Admin_ID`, `age`, `mobile`, `appointment_date`) VALUES
(32, 'Sarah', '13:15:00', 'Approved', '020302121282', NULL, NULL, 24, '0123452345', '2026-06-11'),
(34, 'NUR SALSABILA', '09:00:00', 'Approved', '010123049102', NULL, NULL, 25, '0132459034', '2026-06-30'),
(35, 'SOFIA ALYSHA', '09:30:00', 'Approved', '920319141234', NULL, NULL, 34, '0142399045', '2026-07-29'),
(36, 'NURIN', '10:30:00', 'Approved', '981103145678', NULL, NULL, 28, '01110011978', '2026-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doctor_ID` varchar(10) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Specialization` varchar(100) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doctor_ID`, `Name`, `Specialization`, `Email`) VALUES
('D001', 'FARAH NABILA', 'OBSTETRICIAN & GYNECOLOGIST', 'farahnabila2@gmail.c'),
('D002', 'ANDY', 'PEDIATRICIAN', 'adyandy@gmail.com'),
('D003', 'ALEXANDER', 'DIETITION', 'aaalex@gmail.com'),
('D004', 'TASHA', 'Obstetrician & Gynecologist (OB-GYN)', 'Natasha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Hospital_ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `Admin_ID` varchar(20) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Hospital_ID`, `Name`, `Address`, `Link`, `Admin_ID`, `Photo`) VALUES
(1, 'KPJ HealthCare', '570, Jalan Perda Utama, Bandar Baru Perda, 14000 Bukit Mertajam, Pulau Pinang, Malaysi', 'https://www.kpjhealth.com.my/our-hospitals', NULL, 'KPJHospital.jfif'),
(2, 'Women & CHildren Hospital', '19, Jalan Utama Suria Tropika 1,Taman Suria Tropika,43300 Seri Kembangan,Selangor, Malaysia.', 'https://www.andorracare.com', NULL, 'AndorraHospital.jfif'),
(3, 'Pantai Hospital Melaka', 'No. 2418-1, KM 8,Lebuh Ayer Keroh,75450 Melaka, Malaysia.', 'https://www.pantai.com.my/melaka', NULL, 'HospitalPantai.jpg'),
(4, 'Pusrawi Hospital', 'Lot 149, JIn Tun Razak, Titiwangsa,\r\n50400 Kuala Lumpur, Wilayah\r\nPersekutuan Kuala Lumpur.', 'https://pusrawi.com.my', NULL, 'pusrawi.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `Record_REF` int(10) NOT NULL,
  `CheckupDate` date DEFAULT NULL,
  `CheckupTime` time DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `Booking_REF` int(10) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Doctor_ID` varchar(10) DEFAULT NULL,
  `IC_Number` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`Record_REF`, `CheckupDate`, `CheckupTime`, `Notes`, `Booking_REF`, `Name`, `Doctor_ID`, `IC_Number`) VALUES
(9, '2026-06-25', '10:30:00', 'Pregnancy confirmed, early scan normal, advised folic acid', 36, 'NURIN', NULL, '981103145678'),
(10, '2026-06-11', '13:15:00', '8 weeks scan, fetal heartbeat detected, mother healthy', 32, 'Sarah', NULL, '020302121282'),
(11, '2026-06-30', '09:00:00', '16 weeks check-up, baby developing well, no complications', 34, 'NUR SALSABILA', NULL, '010123049102'),
(12, '2026-07-29', '09:30:00', 'Blood pressure slightly high, monitoring needed', 35, 'SOFIA ALYSHA', NULL, '920319141234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IC_Number` varchar(12) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IC_Number`, `Name`, `Email`) VALUES
('010101100012', 'Zahirah', 'Zahirah@gmail.com'),
('010123049102', 'NUR SALSABILA', 'salsabila@gmail.com'),
('020302121282', 'Sarah', 'Sarah@gmail.com'),
('920319141234', 'SOFIA ALYSHA', 'sofea.alysha@gmail.com'),
('981103145678', 'NURIN', 'nurin@gmail.com'),
('A001', 'JULIA', 'Julia@gmail.com'),
('D001', 'DR. FARAH NABILA', 'farahnabila2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_REF`),
  ADD KEY `IC_Number` (`IC_Number`),
  ADD KEY `Doctor_ID` (`Doctor_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doctor_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Hospital_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`Record_REF`),
  ADD KEY `IC_Number` (`IC_Number`),
  ADD KEY `Doctor_ID` (`Doctor_ID`),
  ADD KEY `Booking_REF` (`Booking_REF`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IC_Number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_REF` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `Hospital_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `Record_REF` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`IC_Number`) REFERENCES `users` (`IC_Number`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Doctor_ID`) REFERENCES `doctors` (`Doctor_ID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`Admin_ID`) REFERENCES `admins` (`Admin_ID`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admins` (`Admin_ID`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`IC_Number`) REFERENCES `users` (`IC_Number`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`Doctor_ID`) REFERENCES `doctors` (`Doctor_ID`),
  ADD CONSTRAINT `record_ibfk_3` FOREIGN KEY (`Booking_REF`) REFERENCES `booking` (`Booking_REF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
