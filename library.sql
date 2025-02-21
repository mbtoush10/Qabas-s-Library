-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 12:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `nameBook` varchar(255) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL,
  `numberBooks` int(11) NOT NULL,
  `year` varchar(4) DEFAULT NULL,
  `autherName` varchar(255) NOT NULL,
  `priceSell` float NOT NULL,
  `priceRent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `nameBook`, `isAvailable`, `numberBooks`, `year`, `autherName`, `priceSell`, `priceRent`) VALUES
(17, 'Clean Code', 1, 18, '2008', 'Robert C. Martin', 300, 90),
(18, 'The Pragmatic Programmer', 1, 15, '1999', 'Andrew Hunt, David Thomas', 350, 100),
(19, 'Design Patterns: Elements of Reusable Object-Oriented Software', 1, 14, '1994', 'Erich Gamma, Richard Helm, Ralph Johnson, John Vlissides', 400, 120),
(20, 'Introduction to Algorithms', 1, 29, '2009', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Clifford Stein', 500, 150),
(21, 'Code Complete', 1, 34, '2004', 'Steve McConnell', 450, 140),
(22, 'The Art of Computer Programming', 1, 8, '1968', 'Donald E. Knuth', 800, 250),
(23, 'You Don\'t Know JS', 1, 54, '2014', 'Kyle Simpson', 250, 75),
(24, 'JavaScript: The Good Parts', 1, 44, '2008', 'Douglas Crockford', 200, 60),
(25, 'The Mythical Man-Month', 1, 19, '1975', 'Frederick P. Brooks Jr.', 350, 110),
(26, 'Refactoring: Improving the Design of Existing Code', 1, 26, '1999', 'Martin Fowler', 320, 95),
(27, 'Eloquent JavaScript', 1, 39, '2018', 'Marijn Haverbeke', 280, 85),
(28, 'Python Crash Course', 1, 34, '2015', 'Eric Matthes', 270, 80),
(29, 'Learning Python', 1, 44, '2013', 'Mark Lutz', 390, 120),
(30, 'The Clean Coder', 1, 24, '2011', 'Robert C. Martin', 350, 100),
(31, 'Effective Java', 1, 32, '2001', 'Joshua Bloch', 380, 110),
(32, 'Head First Java', 1, 54, '2005', 'Kathy Sierra, Bert Bates', 300, 90),
(33, 'Java in a Nutshell', 1, 29, '2018', 'Benjamin J Evans, David Flanagan', 400, 120),
(34, 'Programming Pearls', 1, 14, '1988', 'Jon Bentley', 450, 135),
(35, 'Cracking the Coding Interview', 1, 59, '2008', 'Gayle Laakmann McDowell', 350, 100),
(36, 'The Complete Software Developer\'s Career Guide', 1, 44, '2019', 'John Sonmez', 320, 95),
(37, 'Head First Design Patterns', 1, 34, '2004', 'Eric Freeman, Elisabeth Robson', 350, 105),
(38, 'The C Programming Language', 1, 64, '1978', 'Brian W. Kernighan, Dennis M. Ritchie', 270, 80),
(39, 'Learning React', 1, 29, '2016', 'Alex Banks, Eve Porcello', 300, 90),
(40, 'Practical Object-Oriented Design in Ruby', 1, 19, '2012', 'Sandi Metz', 320, 95),
(41, 'Pro Git', 1, 54, '2014', 'Scott Chacon, Ben Straub', 200, 60),
(42, 'C++ Primer', 1, 44, '2012', 'Stanley B. Lippman, Josée Lajoie, Barbara E. Moo', 380, 110),
(43, 'The Complete Guide to Artificial Intelligence', 1, 34, '2020', 'John Doe', 500, 150),
(44, 'Practical Deep Learning for Coders', 1, 29, '2018', 'Jeremy Howard, Sylvain Gugger', 350, 105),
(45, 'The Algorithm Design Manual', 1, 44, '2009', 'Steven S. Skiena', 420, 130),
(46, 'Rust Programming By Example', 1, 24, '2019', 'Guillaume P. Girard', 280, 85),
(47, 'Python Data Science Handbook', 1, 49, '2016', 'Jake VanderPlas', 400, 120),
(48, 'Learning JavaScript Design Patterns', 1, 30, '2012', 'Addy Osmani', 320, 95),
(49, 'Clean Architecture', 1, 54, '2017', 'Robert C. Martin', 400, 120),
(50, 'Modern C++ Programming with Test-Driven Development', 1, 26, '2014', 'Marius Bancila', 350, 105),
(51, 'The Little Book of Rust Programming', 1, 22, '2017', 'P. J. H. Brett', 220, 70),
(52, 'Java 8 in Action', 1, 32, '2014', 'Raoul-Gabriel Urma, Mario Fusco, Alan Mycroft', 380, 115);

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reset_code` varchar(10) NOT NULL,
  `expiration_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passreset`
--

INSERT INTO `passreset` (`id`, `email`, `reset_code`, `expiration_time`, `created_at`) VALUES
(30, 'moustafabtoush079@gmail.com', '4170', '2025-01-07 00:19:07', '2025-01-06 21:14:07'),
(31, 'moustafabtoush079@gmail.com', '6598', '2025-01-07 00:27:41', '2025-01-06 21:22:41'),
(32, 'marahhaidarbtoush@gmail.com', '7260', '2025-01-07 00:37:09', '2025-01-06 21:32:09'),
(33, 'moustafabtoush079@gmail.com', '2599', '2025-01-07 14:45:45', '2025-01-07 11:40:45'),
(34, 'moustafabtoush079@gmail.com', '2755', '2025-01-07 15:19:00', '2025-01-07 12:14:00'),
(35, 'moustafabtoush079@gmail.com', '2963', '2025-01-07 15:21:37', '2025-01-07 12:16:37'),
(36, 'moustafabtoush079@gmail.com', '9851', '2025-01-07 15:25:38', '2025-01-07 12:20:38'),
(37, 'moustafabtoush079@gmail.com', '1547', '2025-01-07 15:26:36', '2025-01-07 12:21:36'),
(38, 'marahhaidarbtoush@gmail.com', '5793', '2025-01-07 15:27:18', '2025-01-07 12:22:18'),
(39, 'marahhaidarbtoush@gmail.com', '5353', '2025-01-07 15:38:46', '2025-01-07 12:33:46'),
(40, 'qsymhmd996@gmail.cpm', '1786', '2025-01-07 20:46:15', '2025-01-07 17:41:15'),
(41, 'qsymhmd996@gmail.com', '2020', '2025-01-07 20:48:22', '2025-01-07 17:43:22'),
(42, 'qsymhmd996@gmail.com', '1574', '2025-01-07 20:50:02', '2025-01-07 17:45:02'),
(43, 'ramymu127@gmail.com', '9673', '2025-01-07 23:22:14', '2025-01-07 20:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `rentedbook`
--

CREATE TABLE `rentedbook` (
  `idRental` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime DEFAULT NULL,
  `rentalStatus` enum('active','completed','canceled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentedbook`
--

INSERT INTO `rentedbook` (`idRental`, `bookID`, `id`, `startTime`, `endTime`, `rentalStatus`) VALUES
(16, 17, 22, '2025-01-05 20:01:44', '2026-11-15 00:00:00', 'active'),
(17, 17, 22, '2025-01-05 20:32:55', '2065-10-01 00:00:00', ''),
(18, 22, 22, '2025-01-05 20:35:21', '2100-10-04 00:00:00', ''),
(19, 18, 22, '2025-01-05 20:36:19', '2065-10-01 00:00:00', ''),
(20, 18, 22, '2025-01-05 20:37:15', '2065-10-01 00:00:00', ''),
(21, 18, 22, '2025-01-05 20:39:26', '2065-10-01 00:00:00', ''),
(22, 18, 22, '2025-01-05 20:42:08', '2026-11-15 00:00:00', ''),
(23, 63, 23, '2025-01-06 11:37:11', '2026-11-15 00:00:00', ''),
(24, 77, 26, '2025-01-07 20:39:47', '2025-03-15 00:00:00', ''),
(25, 78, 28, '2025-01-07 23:13:14', '2025-03-15 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pass_md5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `name`, `email`, `password`, `birthDate`, `gender`, `reg_date`, `pass_md5`) VALUES
(22, 'mbtoush10', 'Mustafa Btoush ', 'moustafabtoush079@gmail.com', '147852369', '2002-10-26', 'male', '2025-01-09 11:37:04', '25d55ad283aa400af464c76d713c07ad'),
(23, 'zak', 'rami ali', 'ztarawneh@mutah.edu.jo', 'zak123456', '2000-07-11', 'male', '2025-01-06 08:49:18', '16ecf469e0ca79f01a8e68aa1272d359'),
(24, 'ali10', 'ali omar', 'aliomar_xd@gmail.com', '12345678', '2010-07-05', 'female', '2025-01-06 11:04:09', '25d55ad283aa400af464c76d713c07ad'),
(26, 'qus10', 'قصي صرايره', 'qsymhmd996@gmail.com', '147852369', '2002-08-25', 'male', '2025-01-07 17:44:17', '98dae0e08c01f9e64dc3f9650eb5a714'),
(28, 'rendercast', 'shaker sar', 'ramymu127@gmail.com', '8192126Ha@$+', '1998-02-21', 'male', '2025-01-07 20:04:43', '16a990e9ad1be563589be60819f05e41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentedbook`
--
ALTER TABLE `rentedbook`
  ADD PRIMARY KEY (`idRental`),
  ADD KEY `fk_book` (`bookID`),
  ADD KEY `fk_user` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rentedbook`
--
ALTER TABLE `rentedbook`
  MODIFY `idRental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentedbook`
--
ALTER TABLE `rentedbook`
  ADD CONSTRAINT `fk_book` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
