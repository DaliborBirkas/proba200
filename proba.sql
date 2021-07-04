-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 10:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proba`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `uidKorisnik` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `emailKorisnik` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `pwdKorisnik` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `uidKorisnik`, `emailKorisnik`, `pwdKorisnik`) VALUES
(1, 'test', 'dbirkas3@gmail.com', '$2y$10$VGV4cTMZ5qqcj1o0TG9oVuZtaOI9ez5T0u9U9ivGT9YQZmsbTTNxK'),
(2, 'aleksa', 'aleksa@gmail.com', '$2y$10$xcvjraFsJlzbhPDZTC0NLemEaGXFAhMuKKgwiuEwpNV8erclDg9m.'),
(3, 'test15', 'birkaslol24@gmail.com', '$2y$10$u.Xz3Z3/PUFcWwBusuk8lOyaLecWrqvuWki3uUgfvmUZ3SNCFNq5u'),
(5, 'perica', 'perica@gmail.com', '$2y$10$GAQ8bRf8FueRiFWIejBRB.RjoBsYhA8HQLWbfScyETkDPBM9mC2Ta');

-- --------------------------------------------------------

--
-- Table structure for table `websiteusers`
--

CREATE TABLE `websiteusers` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `lastname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `number` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `pwd` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `websiteusers`
--

INSERT INTO `websiteusers` (`id`, `name`, `lastname`, `email`, `number`, `pwd`) VALUES
(3, 'aa', 'aa', 'aa@gmail.com', '2313', '$2y$10$0bL3jrPDH60C1kBhjJjXye4uDP4226.1/fTwsHuf74qj1UdjqjtvC'),
(4, 'dap', 'dapilovic', 'dap@gmail.com', '123456789', '$2y$10$CFVxt4PI58oPC/3MigfJK.JYl4LK9NSxRO2tLE/OVlu97Bf/cKUu2'),
(5, 'Pera', 'Djuric', 'djuric@gmail.com', '132312', '$2y$10$Srhr7HgeOLVDncJ19pmLc.veujRVfm7S0EqpmxsLtN5UGJpTXwYwa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `websiteusers`
--
ALTER TABLE `websiteusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `websiteusers`
--
ALTER TABLE `websiteusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
