-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 03:26 PM
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
-- Database: `lib_byshra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `intro` varchar(500) NOT NULL,
  `email` varchar(250) NOT NULL,
  `profile` varchar(150) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`id`, `name`, `intro`, `email`, `profile`, `pass`) VALUES
(1, 'Admin', 'Admin', 'admin@mail.com', '', 'admin'),
(2, 'Admin2', 'Admin2', 'admin2@mail.com', 'IMG_95562.jpeg', '123'),
(3, 'Admin3', 'Admin3', 'admin3@mail.com', 'IMG_29585.jpeg', '123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `author` varchar(250) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` int(100) NOT NULL DEFAULT 1,
  `quantity` int(250) NOT NULL,
  `department` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `name`, `author`, `edition`, `status`, `quantity`, `department`) VALUES
(1, 'Book1', 'Author1', 'First Edition', 1, 1, 'Science'),
(3, 'Book of Maths', 'Auth 2', 'Second', 1, 1, 'Mathematics'),
(5, 'Book2', 'Auth 2', 'First Edition', 1, 2, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `sr_no` int(150) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(3, 'Test', 'Test1@test.com', 'Test', 'Test', '2023-01-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stud_cred`
--

CREATE TABLE `stud_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `intro` varchar(600) NOT NULL,
  `pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_cred`
--

INSERT INTO `stud_cred` (`id`, `name`, `email`, `phonenum`, `profile`, `intro`, `pass`) VALUES
(1, 'Test1', 'Test1@test.com', '9879879879', 'IMG_86749.jpeg', 'Test1', 'test'),
(2, 'Test2', 'Test2@test.com', '9632587412', 'IMG_37618.jpeg', 'TEST2', 'test'),
(3, 'Shra', 'Test@test.com', '8989898989', 'IMG_60812.jpeg', '123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `stud_cred`
--
ALTER TABLE `stud_cred`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `sr_no` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stud_cred`
--
ALTER TABLE `stud_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
