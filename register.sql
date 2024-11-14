-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 02:02 PM
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
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_contents`
--

CREATE TABLE `about_contents` (
  `id` int(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descrp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_contents`
--

INSERT INTO `about_contents` (`id`, `sub_title`, `title`, `descrp`) VALUES
(1, 'Molestias non eiusmo', 'Dolorum nisi minus a', 'Quam aut aliquip qua'),
(2, 'Voluptate dolores ex', 'Aliqua Obcaecati no', 'Sed in in maiores te'),
(3, 'Ea beatae quis facil', 'Et consequat Illum', 'Qui sit consequatur'),
(4, 'Aut dolorum quod sit', 'Ea impedit eius bla', 'Voluptatem corporis'),
(5, 'Aut dolorum quod sit', 'Ea impedit eius bla', 'Voluptatem corporis'),
(6, 'Iste omnis omnis min', 'Sed dignissimos magn', 'Id soluta illum es'),
(7, 'Dolores non cupidita', 'Ratione cillum ab as', 'Dicta quis sed cumqu');

-- --------------------------------------------------------

--
-- Table structure for table `banner_contents`
--

CREATE TABLE `banner_contents` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descrp` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner_contents`
--

INSERT INTO `banner_contents` (`id`, `sub_title`, `title`, `descrp`, `status`) VALUES
(1, 'A sunt quis do digni', 'A incidunt aut ipsu', 'Enim laborum in cons', 0),
(7, 'Omnis ducimus incid', 'Cumque excepteur nob', 'Minima reprehenderit', 0),
(8, 'Dolores est quaerat ', 'Necessitatibus irure', 'Maxime unde qui reru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_image`
--

CREATE TABLE `banner_image` (
  `id` int(100) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner_image`
--

INSERT INTO `banner_image` (`id`, `banner_image`, `status`) VALUES
(4, '4.PNG', 0),
(5, '5.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_picture`, `status`, `role`) VALUES
(1, 'aziz', 'aziz@gmail.com', '$2y$10$WYxvwVVoIloWi2/RQxr47.u0k0ACl8ZTv1sh4G2NYfrSWrn2r7zB6', '1.jpg', 0, 1),
(2, 'kafi', 'kafi@gmail.com', '$2y$10$cl0oF5zgZuB63tfoN1uRaulo3YpL2IJXaqv83ck7eJPime3eSm22S', '2.PNG', 0, 2),
(5, 'aziz1', 'aziz1@gmail.com', '$2y$10$87/b1bgI9ZVuwN142E4zMuy6.W2OMGVxwZ6SoiDdSaU5199p3llh.', '5.jpg', 0, 3),
(6, 'azizz', 'azizz@gmail.com', '$2y$10$bGRqhVhnFULpLUnlqQyDhuCUdfyaFtl3/ROk7yCQARG9D2DDQMANm', '6.jpg', 0, 4),
(8, 'gibo@mailinator.com', 'refybynu@mailinator.com', '$2y$10$l5ZvOxbbGqJus3wtWdmmZOpbfFEnuNxqqg.cY7O1dK7ZmREuw7FVW', '8.PNG', 0, NULL),
(9, 'wopehat@mailinator.com', 'bicohegyge@mailinator.com', '$2y$10$SGfb3aFXu3waiF9aAm2js.auWommFPKuQNDUCi6qd20ob/CMGcmEi', '9.PNG', 0, NULL),
(10, 'caka@mailinator.com', 'sutilubud@mailinator.com', '$2y$10$mfxPcU/DE9OAccg63JfPAeMYuvZX68f6Mg.Brc1JBkyla3eD3G4te', '10.PNG', 0, NULL),
(11, 'jyqoweri@mailinator.com', 'rarovikic@mailinator.com', '$2y$10$71MZjU/qlKELaXJKhTYV0OLOzbSCAd2W1S70k7de9zmbfkghviZ5u', '11.PNG', 0, NULL),
(14, 'lituhen@mailinator.com', 'wesolegaz@mailinator.com', '$2y$10$.VVDuBkQ4Yz12HCeL2f50e5FePICypKNwEOWei.mGYT0y6i8.6LTy', '14.PNG', 0, NULL),
(15, 'tarik1', 'tarik1@gmail.com', '$2y$10$0fcqYIegIRS2S7UW1eFKU.wK.7HjD8FqmXF7w5tBFg.GmFpLIWcnO', '15.PNG', 0, 2),
(16, 'kafi1', 'kafi1@gmail.com', '$2y$10$6k9uySd3VmfrYO/1MaSKje.1f5QGy1WAQoFNTA6S0KRZ8SKUJ0v6q', '16.png', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_contents`
--
ALTER TABLE `about_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_contents`
--
ALTER TABLE `banner_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_image`
--
ALTER TABLE `banner_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_contents`
--
ALTER TABLE `about_contents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banner_contents`
--
ALTER TABLE `banner_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banner_image`
--
ALTER TABLE `banner_image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
