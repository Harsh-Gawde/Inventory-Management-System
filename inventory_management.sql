-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 09:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartridge_model`
--

CREATE TABLE `cartridge_model` (
  `pid` int(50) NOT NULL,
  `procurement_no` int(255) NOT NULL,
  `cartridge_model` varchar(255) NOT NULL,
  `cartridge_quantity` int(255) NOT NULL,
  `unit_price` int(255) NOT NULL,
  `current_stock` int(255) NOT NULL,
  `current_timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `received_qty` int(255) NOT NULL DEFAULT 0,
  `remained_qty` int(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `display_contract`
--

CREATE TABLE `display_contract` (
  `Procurement_No` int(255) NOT NULL,
  `Comp_Name` varchar(255) NOT NULL,
  `Procurement_Date` date NOT NULL,
  `Contract_End_Date` date NOT NULL,
  `item_qty` int(255) NOT NULL,
  `Workorder` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `Current_timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `display_contract`
--

INSERT INTO `display_contract` (`Procurement_No`, `Comp_Name`, `Procurement_Date`, `Contract_End_Date`, `item_qty`, `Workorder`, `added_by`, `Current_timestamp`, `status`) VALUES
(1, 'HP', '2024-02-21', '2025-02-20', 4, 'I_s.k.gupta.pdf', 'Harsh', '2024-02-27 14:49:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `procurement_no` int(255) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `invoice_date` date NOT NULL,
  `model` varchar(255) NOT NULL,
  `unit_price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `t_amount` int(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `printer_db`
--

CREATE TABLE `printer_db` (
  `username` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `printer_db`
--

INSERT INTO `printer_db` (`username`, `department`) VALUES
('Emily Johnson', 'Human Resources (HR)'),
('Benjamin Martinez', 'Finance'),
('Sophia Lee', 'Information Technology (IT)'),
('Alexander Nguyen', 'Marketing'),
('Olivia Garcia', 'Sales'),
('Ethan Taylor', 'Customer Service'),
('Isabella Rodriguez', 'Operations'),
('Mason Hernandez', 'Administration'),
('Ava Smith', 'Legal'),
('William Brown', 'Procurement'),
('Mia Lopez', 'Quality Assurance (QA)'),
('James Perez', 'Project Management'),
('Charlotte Jones', 'Training and Development'),
('Michael Adams', 'Facilities Management'),
('Amelia Rivera', 'Public Relations (PR)'),
('Jacob Thomas', 'Logistics'),
('Harper Lewis', 'Compliance'),
('Daniel Scott', 'Risk Management'),
('Evelyn White', 'Accounting'),
('Elijah Hall', 'Business Development'),
('Abigail Clark', 'Human Resources (HR)'),
('Logan Green', 'Finance'),
('Elizabeth Baker', 'Information Technology (IT)'),
('Alexander King', 'Marketing'),
('Ella Carter', 'Sales'),
('Matthew Hill', 'Customer Service'),
('Sofia Mitchell', 'Operations'),
('Carter Walker', 'Administration'),
('Victoria Young', 'Legal'),
('Nathan Allen', 'Procurement'),
('Grace Wright', 'Quality Assurance (QA)'),
('Lucas Turner', 'Project Management'),
('Zoey Nelson', 'Training and Development'),
('Jackson Hall', 'Facilities Management'),
('Aria Martin', 'Public Relations (PR)'),
('Samuel Nelson', 'Logistics'),
('Scarlett Cook', 'Compliance'),
('David Evans', 'Risk Management'),
('Layla Thompson', 'Accounting'),
('Gabriel Morris', 'Business Development'),
('Madison Campbell', 'Human Resources (HR)'),
('Oliver Stewart', 'Finance'),
('Chloe Bailey', 'Information Technology (IT)'),
('John Ward', 'Marketing'),
('Penelope Murphy', 'Sales'),
('Christopher Cox', 'Customer Service'),
('Riley Ross', 'Operations'),
('Joseph Powell', 'Administration'),
('Lily Morgan', 'Legal'),
('Joshua Hayes', 'Procurement'),
('Avery Flores', 'Quality Assurance (QA)'),
('Andrew Rivera', 'Project Management'),
('Ellie Ramirez', 'Training and Development'),
('Luke Perry', 'Facilities Management'),
('Addison Foster', 'Public Relations (PR)'),
('Dylan Simmons', 'Logistics'),
('Aaliyah Butler', 'Compliance'),
('Isaac Barnes', 'Risk Management'),
('Paisley Price', 'Accounting'),
('Ryan Collins', 'Business Development'),
('Aubrey Washington', 'Human Resources (HR)'),
('Caleb Long', 'Finance'),
('Hannah Hughes', 'Information Technology (IT)'),
('Owen Richardson', 'Marketing'),
('Zoey Gray', 'Sales'),
('Levi Reed', 'Customer Service'),
('Brooklyn Coleman', 'Operations'),
('Julian Patterson', 'Administration'),
('Anna Perry', 'Legal'),
('Wyatt Murphy', 'Procurement'),
('Maya Sanders', 'Quality Assurance (QA)'),
('Christian Peterson', 'Project Management'),
('Stella Kelly', 'Training and Development'),
('Lincoln Watson', 'Facilities Management'),
('Natalie Brooks', 'Public Relations (PR)'),
('Mateo Gonzales', 'Logistics'),
('Lillian Cooper', 'Compliance'),
('Jordan Diaz', 'Risk Management'),
('Caroline Ward', 'Accounting'),
('Evan Gomez', 'Business Development'),
('Kylie Howard', 'Human Resources (HR)'),
('Aaron Simmons', 'Finance'),
('Naomi Sullivan', 'Information Technology (IT)'),
('Jeremiah Price', 'Marketing'),
('Lucy Rivera', 'Sales'),
('Grayson Martinez', 'Customer Service'),
('Taylor James', 'Operations'),
('Reagan Hughes', 'Administration'),
('Nicholas Stewart', 'Legal'),
('Savannah Foster', 'Procurement'),
('Brandon Cook', 'Quality Assurance (QA)'),
('Eliana Murphy', 'Project Management'),
('Sebastian Fisher', 'Training and Development'),
('Audrey Nelson', 'Facilities Management'),
('Jonathan Henderson', 'Public Relations (PR)'),
('Clara Mitchell', 'Logistics'),
('Dominic Butler', 'Compliance'),
('Aurora Gray', 'Risk Management'),
('Robert Coleman', 'Accounting'),
('Kaitlyn Foster', 'Business Development');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `password`, `cpassword`) VALUES
('Harsh', 'harsh@gmail.com', 'harsh', 'harsh');

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE `requisition` (
  `procurement_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `cartridge_model` varchar(255) NOT NULL,
  `printer_model` varchar(255) NOT NULL,
  `printer_serial` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `requisition_form` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartridge_model`
--
ALTER TABLE `cartridge_model`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `cartridge_model` (`cartridge_model`);

--
-- Indexes for table `display_contract`
--
ALTER TABLE `display_contract`
  ADD PRIMARY KEY (`Procurement_No`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartridge_model`
--
ALTER TABLE `cartridge_model`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
