-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 12:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `covid_info`
--

CREATE TABLE `covid_info` (
  `id` int(11) NOT NULL,
  `detect_date` date NOT NULL,
  `recovery` varchar(3) NOT NULL,
  `death` varchar(3) NOT NULL,
  `vaccinated` varchar(3) NOT NULL,
  `vaccine_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covid_info`
--

INSERT INTO `covid_info` (`id`, `detect_date`, `recovery`, `death`, `vaccinated`, `vaccine_name`) VALUES
(1, '2022-08-27', 'Yes', 'No', 'Yes', 'Sinopharm'),
(2, '2022-01-11', 'Yes', 'No', 'Yes', 'Sinopharm'),
(5, '2020-06-25', 'Yes', 'No', 'Yes', 'Mordana'),
(6, '2020-06-26', 'Yes', 'No', 'Yes', 'Mordana'),
(7, '2022-03-09', 'Yes', 'No', 'Yes', 'Astrageneca'),
(8, '2022-05-10', 'No', 'Yes', 'Yes', 'Phyzer'),
(9, '2022-03-24', 'Yes', 'No', 'Yes', 'Mordana'),
(10, '2022-01-25', 'Yes', 'No', 'Yes', 'Sinopharm'),
(11, '2022-07-15', 'No', 'Yes', 'Yes', 'Astrageneca'),
(12, '2022-05-31', 'No', 'Yes', 'No', ''),
(13, '2022-06-22', 'Yes', 'No', 'Yes', 'Sinopharm'),
(14, '2022-01-03', 'Yes', 'No', 'Yes', 'Astrageneca'),
(15, '2022-04-19', 'No', 'Yes', 'No', ''),
(16, '2022-05-16', 'Yes', 'No', 'No', ''),
(17, '2022-08-01', 'No', 'Yes', 'Yes', 'Sinopharm'),
(18, '2020-10-06', 'Yes', 'No', 'Yes', 'Phyzer'),
(19, '2021-02-06', 'No', 'Yes', 'No', ''),
(20, '2020-12-27', 'Yes', 'No', 'Yes', 'Phyzer'),
(21, '2022-02-06', 'Yes', 'No', 'Yes', 'Astrageneca'),
(22, '2021-12-06', 'No', 'Yes', 'No', ''),
(23, '2022-04-06', 'Yes', 'No', 'Yes', 'Sinopharm'),
(24, '2021-10-06', 'No', 'Yes', 'Yes', 'Astrageneca'),
(25, '2020-07-09', 'No', 'Yes', 'Yes', ''),
(26, '2020-07-14', 'No', 'Yes', 'Yes', ''),
(27, '2021-07-23', 'No', 'Yes', 'Yes', ''),
(28, '2021-11-06', 'No', 'Yes', 'Yes', 'Sinopharm'),
(29, '2021-07-06', 'No', 'Yes', 'No', ''),
(30, '2021-08-06', 'No', 'Yes', 'Yes', 'Astrageneca'),
(31, '2021-05-13', 'Yes', 'No', 'Yes', 'Mordana'),
(32, '2021-07-28', 'Yes', 'No', 'Yes', 'Sinopharm'),
(33, '2021-04-29', 'Yes', 'No', 'Yes', 'Mordana'),
(34, '2020-08-19', 'No', 'Yes', 'Yes', 'Astrageneca'),
(35, '2020-12-10', 'No', 'Yes', 'Yes', 'Sinopharm'),
(36, '2022-02-28', 'Yes', 'No', 'Yes', 'Sinopharm'),
(37, '2022-05-19', 'Yes', 'No', 'Yes', 'Phyzer'),
(38, '2020-10-13', 'Yes', 'No', 'Yes', 'Astrageneca'),
(39, '2021-04-07', 'Yes', 'No', 'Yes', 'Sinopharm'),
(40, '2020-11-27', 'Yes', 'No', 'Yes', 'Phyzer');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `age` int(200) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `area` varchar(100) NOT NULL,
  `detect_date` date NOT NULL,
  `recovery` varchar(3) NOT NULL,
  `death` varchar(3) NOT NULL,
  `vaccinated` varchar(3) NOT NULL,
  `vaccine_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `patient_name`, `age`, `gender`, `area`, `detect_date`, `recovery`, `death`, `vaccinated`, `vaccine_name`) VALUES
(1, 'Rakibur  Rahman', 22, 'Male', 'Jamalpur', '2022-08-27', 'Yes', 'No', 'Yes', 'Sinopharm'),
(2, 'Nadim Hosen', 20, 'Male', 'Cumilla', '2022-01-11', 'Yes', 'No', 'Yes', 'Sinopharm'),
(5, 'Marufa', 9, 'Female', 'Rangpur', '2020-06-25', 'Yes', 'No', 'Yes', 'Mordana'),
(6, 'Nadim', 34, 'Male', 'Cumilla', '2020-06-26', 'Yes', 'No', 'Yes', 'Mordana'),
(7, 'Abdulla Al Numan', 22, 'Male', 'Bogura', '2022-03-09', 'Yes', 'No', 'Yes', 'Astrageneca'),
(8, 'Rafin Al Mahmud', 21, 'Male', 'Shariatpur', '2022-05-10', 'No', 'Yes', 'Yes', 'Phyzer'),
(9, 'Hasan Robin', 23, 'Male', 'Netrokona', '2022-03-24', 'Yes', 'No', 'Yes', 'Mordana'),
(10, 'Rayhan Sharif Rakib', 25, 'Male', 'Madaripur', '2022-01-25', 'Yes', 'No', 'Yes', 'Sinopharm'),
(11, 'Tamjid Hasan', 24, 'Male', 'Gopalganj', '2022-07-15', 'No', 'Yes', 'Yes', 'Astrageneca'),
(12, 'Surma Khatun', 26, 'Female', 'Rajbari', '2022-05-31', 'No', 'Yes', 'No', ''),
(13, 'Jannati Akter', 34, 'Female', 'Netrokona', '2022-06-22', 'Yes', 'No', 'Yes', 'Sinopharm'),
(14, 'Hasan Boktiur', 32, 'Male', 'Bogura', '2022-01-03', 'Yes', 'No', 'Yes', 'Astrageneca'),
(15, 'Jannatul Ferdous', 26, 'Female', 'Sherpur', '2022-04-19', 'No', 'Yes', 'No', ''),
(16, 'Hossain Mahmud', 20, 'Male', 'Shariatpur', '2022-05-16', 'Yes', 'No', 'No', ''),
(17, 'Hafizur Rahman', 22, 'Male', 'Sherpur', '2022-08-01', 'No', 'Yes', 'Yes', 'Sinopharm'),
(18, 'Sagor Hosen', 21, 'Male', 'Barguna', '2020-10-06', 'Yes', 'No', 'Yes', 'Phyzer'),
(19, 'Byzid Ahmed Joy', 24, 'Male', 'Barishal', '2021-02-06', 'No', 'Yes', 'No', ''),
(20, 'Liza Akter', 20, 'Female', 'Narayanganj', '2020-12-27', 'Yes', 'No', 'Yes', 'Phyzer'),
(21, 'Miru Akter', 22, 'Female', 'Tangail', '2022-02-06', 'Yes', 'No', 'Yes', 'Astrageneca'),
(22, 'Somrat Hosen', 21, 'Male', 'Kishoreganj', '2021-12-06', 'No', 'Yes', 'No', ''),
(23, 'Ashik Hosen', 25, 'Male', 'Kishoreganj', '2022-04-06', 'Yes', 'No', 'Yes', 'Sinopharm'),
(24, 'Muhammad Mustakim', 23, 'Male', 'Dhaka', '2021-10-06', 'No', 'Yes', 'Yes', 'Astrageneca'),
(25, 'Mamunur Rashid ', 56, 'Male', 'Narsingdi', '2020-07-09', 'No', 'Yes', 'Yes', ''),
(26, 'Rebeka Khatun', 43, 'Female', 'Feni', '2020-07-14', 'No', 'Yes', 'Yes', ''),
(27, 'Deloyar Hossen', 45, 'Male', 'Narail', '2021-07-23', 'No', 'Yes', 'Yes', ''),
(28, 'Gihad Hossen', 22, 'Male', 'Netrokona', '2021-11-06', 'No', 'Yes', 'Yes', 'Sinopharm'),
(29, 'Sohan Hossen', 22, 'Male', 'Rangpur', '2021-07-06', 'No', 'Yes', 'No', ''),
(30, 'Asraf Ali Vola ', 57, 'Male', 'Bogura', '2021-08-06', 'No', 'Yes', 'Yes', 'Astrageneca'),
(31, 'Juyel Alam', 38, 'Male', 'Bagerhat', '2021-05-13', 'Yes', 'No', 'Yes', 'Mordana'),
(32, 'Joynal Abedin ', 25, 'Male', 'Pirojpur', '2021-07-28', 'Yes', 'No', 'Yes', 'Sinopharm'),
(33, 'M.A.Munnaf', 27, 'Male', 'Bhola', '2021-04-29', 'Yes', 'No', 'Yes', 'Mordana'),
(34, 'Asikur Rahman', 30, 'Male', 'Sunamganj', '2020-08-19', 'No', 'Yes', 'Yes', 'Astrageneca'),
(35, 'Nazmul Haque', 32, 'Male', 'Thakurgaon', '2020-12-10', 'No', 'Yes', 'Yes', 'Sinopharm'),
(36, 'Md.Korim mia', 33, 'Male', 'Tangail', '2022-02-28', 'Yes', 'No', 'Yes', 'Sinopharm'),
(37, 'Nafis', 15, 'Male', 'Netrokona', '2022-05-19', 'Yes', 'No', 'Yes', 'Phyzer'),
(38, 'Nafisa Jebin Lobaba', 23, 'Female', 'Panchagarh', '2020-10-13', 'Yes', 'No', 'Yes', 'Astrageneca'),
(39, 'Jannati Akter', 22, 'Female', 'Rajbari', '2021-04-07', 'Yes', 'No', 'Yes', 'Sinopharm'),
(40, 'Roksana Begum', 56, 'Female', 'Magura', '2020-11-27', 'Yes', 'No', 'Yes', 'Phyzer');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `patient_name`, `age`, `gender`, `area`) VALUES
(1, 'Rakibur  Rahman', 22, 'Male', 'Jamalpur'),
(2, 'Nadim Hosen', 20, 'Male', 'Cumilla'),
(5, 'Marufa', 9, 'Female', 'Rangpur'),
(6, 'Nadim', 34, 'Male', 'Cumilla'),
(7, 'Abdulla Al Numan', 22, 'Male', 'Bogura'),
(8, 'Rafin Al Mahmud', 21, 'Male', 'Shariatpur'),
(9, 'Hasan Robin', 23, 'Male', 'Netrokona'),
(10, 'Rayhan Sharif Rakib', 25, 'Male', 'Madaripur'),
(11, 'Tamjid Hasan', 24, 'Male', 'Gopalganj'),
(12, 'Surma Khatun', 26, 'Female', 'Rajbari'),
(13, 'Jannati Akter', 34, 'Female', 'Netrokona'),
(14, 'Hasan Boktiur', 32, 'Male', 'Bogura'),
(15, 'Jannatul Ferdous', 26, 'Female', 'Sherpur'),
(16, 'Hossain Mahmud', 20, 'Male', 'Shariatpur'),
(17, 'Hafizur Rahman', 22, 'Male', 'Sherpur'),
(18, 'Sagor Hosen', 21, 'Male', 'Barguna'),
(19, 'Byzid Ahmed Joy', 24, 'Male', 'Barishal'),
(20, 'Liza Akter', 20, 'Female', 'Narayanganj'),
(21, 'Miru Akter', 22, 'Female', 'Tangail'),
(22, 'Somrat Hosen', 21, 'Male', 'Kishoreganj'),
(23, 'Ashik Hosen', 25, 'Male', 'Kishoreganj'),
(24, 'Muhammad Mustakim', 23, 'Male', 'Dhaka'),
(25, 'Mamunur Rashid ', 56, 'Male', 'Narsingdi'),
(26, 'Rebeka Khatun', 43, 'Female', 'Feni'),
(27, 'Deloyar Hossen', 45, 'Male', 'Narail'),
(28, 'Gihad Hossen', 22, 'Male', 'Netrokona'),
(29, 'Sohan Hossen', 22, 'Male', 'Rangpur'),
(30, 'Asraf Ali Vola ', 57, 'Male', 'Bogura'),
(31, 'Juyel Alam', 38, 'Male', 'Bagerhat'),
(32, 'Joynal Abedin ', 25, 'Male', 'Pirojpur'),
(33, 'M.A.Munnaf', 27, 'Male', 'Bhola'),
(34, 'Asikur Rahman', 30, 'Male', 'Sunamganj'),
(35, 'Nazmul Haque', 32, 'Male', 'Thakurgaon'),
(36, 'Md.Korim mia', 33, 'Male', 'Tangail'),
(37, 'Nafis', 15, 'Male', 'Netrokona'),
(38, 'Nafisa Jebin Lobaba', 23, 'Female', 'Panchagarh'),
(39, 'Jannati Akter', 22, 'Female', 'Rajbari'),
(40, 'Roksana Begum', 56, 'Female', 'Magura');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_info`
--
ALTER TABLE `covid_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_info`
--
ALTER TABLE `covid_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
